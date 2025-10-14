<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    /**
     * Convert YouTube URL to Embed URL
     */
    private function convertYouTubeUrl($url)
    {
        // Pattern untuk YouTube URLs
        $patterns = [
            '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/',  // youtube.com/watch?v=xxx
            '/youtu\.be\/([a-zA-Z0-9_-]+)/',              // youtu.be/xxx
            '/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/'     // youtube.com/embed/xxx (already embed)
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return 'https://www.youtube.com/embed/' . $matches[1];
            }
        }
        
        // Jika bukan YouTube, return URL asli
        return $url;
    }

    public function updateMedia(Request $request)
    {
        try {
            $home = Home::firstOrCreate([]);
            
            if ($request->media_type === 'video') {
                // Validasi Video URL
                $request->validate([
                    'video_url' => 'required|url',
                ]);

                // Hapus images lama jika switch dari images ke video
                if ($home->media_type === 'images' && $home->images) {
                    foreach ($home->images as $image) {
                        if (Storage::disk('public')->exists($image)) {
                            Storage::disk('public')->delete($image);
                        }
                    }
                }

                // Convert YouTube URL jika perlu
                $videoUrl = $this->convertYouTubeUrl($request->video_url);

                $home->update([
                    'media_type' => 'video',
                    'video_url' => $videoUrl,
                    'images' => null,
                ]);

                Log::info('Video updated', ['home_id' => $home->id, 'video_url' => $videoUrl]);
                return redirect()->back()->with('success', '✅ Video berhasil diupdate!');
            } 
            else {
                // === UPLOAD IMAGES ===
                
                // Cek apakah ada file yang diupload
                if (!$request->hasFile('images')) {
                    // Jika tidak ada file baru dan sudah ada gambar sebelumnya, skip
                    if ($home->images && count($home->images) >= 1) {
                        $home->update(['media_type' => 'images']);
                        return redirect()->back()->with('success', 'Media type berhasil diubah ke slideshow!');
                    }
                    
                    return redirect()->back()->with('error', 'Minimal 1 gambar harus diupload!');
                }

                // Pastikan folder exists
                $folderPath = 'home_images';
                if (!Storage::disk('public')->exists($folderPath)) {
                    Storage::disk('public')->makeDirectory($folderPath);
                    Log::info('Created home_images directory');
                }

                // Cek writable
                $storagePath = storage_path('app/public');
                if (!is_writable($storagePath)) {
                    Log::error('Storage not writable', ['path' => $storagePath]);
                    return redirect()->back()->with('error', 'Folder storage tidak dapat ditulis. Periksa permission!');
                }

                // Validasi manual untuk setiap file sebelum upload
                $files = $request->file('images');
                $validFiles = [];
                $errors = [];

                foreach ($files as $index => $file) {
                    // Cek apakah file valid
                    if (!$file->isValid()) {
                        $errors[] = "File #{$index}: " . $file->getErrorMessage();
                        continue;
                    }

                    // Cek size (5MB = 5120 KB)
                    if ($file->getSize() > 5120 * 1024) {
                        $sizeMB = round($file->getSize() / 1024 / 1024, 2);
                        $errors[] = "File '{$file->getClientOriginalName()}' terlalu besar ({$sizeMB}MB). Max 5MB";
                        continue;
                    }

                    // Cek mime type
                    $allowedMimes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                    if (!in_array($file->getMimeType(), $allowedMimes)) {
                        $errors[] = "File '{$file->getClientOriginalName()}' format tidak valid. Gunakan JPG, PNG, atau WEBP";
                        continue;
                    }

                    $validFiles[] = $file;
                }

                // Jika ada error, tampilkan
                if (!empty($errors)) {
                    return redirect()->back()->with('error', implode('<br>', $errors));
                }

                // Cek minimal 1 file valid
                if (count($validFiles) < 1) {
                    return redirect()->back()->with('error', "Minimal 1 gambar valid diperlukan. Tidak ada gambar valid yang diupload.");
                }

                // Validasi Laravel (double check) - UBAH MIN JADI 1
                $request->validate([
                    'images' => 'required|array|min:1|max:10',
                    'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
                ], [
                    'images.required' => 'Minimal 1 gambar harus diupload',
                    'images.min' => 'Minimal 1 gambar diperlukan',
                    'images.max' => 'Maksimal 10 gambar',
                    'images.*.image' => 'File harus berupa gambar',
                    'images.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
                    'images.*.max' => 'Ukuran gambar maksimal 5MB',
                ]);

                // Hapus video URL jika switch dari video
                if ($home->media_type === 'video') {
                    $home->video_url = null;
                }

                // Hapus gambar lama
                if ($home->images) {
                    foreach ($home->images as $oldImage) {
                        if (Storage::disk('public')->exists($oldImage)) {
                            Storage::disk('public')->delete($oldImage);
                        }
                    }
                }

                // Upload gambar baru
                $imagePaths = [];
                $uploadSuccess = 0;
                $uploadFailed = 0;

                foreach ($validFiles as $index => $image) {
                    try {
                        // Generate unique filename
                        $filename = time() . '_' . uniqid() . '_' . $index . '.' . $image->getClientOriginalExtension();
                        
                        // Method 1: Gunakan storeAs
                        $path = $image->storeAs($folderPath, $filename, 'public');
                        
                        if ($path) {
                            $imagePaths[] = $path;
                            $uploadSuccess++;
                            
                            Log::info("Image uploaded", [
                                'index' => $index,
                                'filename' => $filename,
                                'path' => $path,
                                'size' => $image->getSize(),
                                'full_path' => Storage::disk('public')->path($path)
                            ]);
                        } else {
                            $uploadFailed++;
                            Log::error("Failed to store image", [
                                'index' => $index,
                                'filename' => $filename
                            ]);
                        }
                        
                    } catch (\Exception $e) {
                        $uploadFailed++;
                        Log::error("Error uploading image", [
                            'index' => $index,
                            'error' => $e->getMessage(),
                            'trace' => $e->getTraceAsString()
                        ]);
                    }
                }

                // Cek hasil upload - UBAH MIN JADI 1
                if ($uploadSuccess < 1) {
                    return redirect()->back()->with('error', 
                        "Upload gagal! Tidak ada gambar yang berhasil diupload. " .
                        "Periksa permission folder storage/app/public"
                    );
                }

                // Update database
                $home->update([
                    'media_type' => 'images',
                    'images' => $imagePaths,
                    'video_url' => null,
                ]);

                $message = "✅ {$uploadSuccess} gambar berhasil diupload!";
                if ($uploadFailed > 0) {
                    $message .= " ({$uploadFailed} gagal)";
                }

                Log::info('Images uploaded successfully', [
                    'home_id' => $home->id,
                    'success' => $uploadSuccess,
                    'failed' => $uploadFailed
                ]);

                return redirect()->back()->with('success', $message);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation exception', [
                'errors' => $e->errors(),
            ]);
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal: ' . implode(', ', $e->validator->errors()->all()));
        } catch (\Exception $e) {
            Log::error('General exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deleteImage(Request $request)
    {
        try {
            $home = Home::first();
            
            if (!$home || !$home->images) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada gambar yang ditemukan'
                ]);
            }

            $images = $home->images;
            $index = $request->index;

            if (!isset($images[$index])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Index gambar tidak valid'
                ]);
            }

            // UBAH: Minimal 1 gambar (bukan 3)
            if (count($images) <= 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimal harus ada 1 gambar. Tidak bisa dihapus!'
                ]);
            }

            // Delete file dari storage
            if (Storage::disk('public')->exists($images[$index])) {
                Storage::disk('public')->delete($images[$index]);
            }

            // Remove dari array
            array_splice($images, $index, 1);
            $images = array_values($images);

            // Update database
            $home->update(['images' => $images]);

            Log::info('Image deleted', [
                'home_id' => $home->id,
                'index' => $index,
                'remaining' => count($images)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Gambar berhasil dihapus',
                'remaining_count' => count($images)
            ]);

        } catch (\Exception $e) {
            Log::error('Error deleting image', [
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show()
{
    $home = Home::where('is_active', true)->first();
    
    if (!$home) {
        $home = Home::first();
    }

    return view('home', compact('home'));
}

    public function updateSubtitle(Request $request)
    {
        $request->validate(['subtitle' => 'required|string|max:255']);
        $home = Home::firstOrCreate([]);
        $home->update(['subtitle' => $request->subtitle]);
        return redirect()->back()->with('success', 'Subtitle berhasil diupdate!');
    }

    public function updateTitle(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $home = Home::firstOrCreate([]);
        $home->update(['title' => $request->title]);
        return redirect()->back()->with('success', 'Title berhasil diupdate!');
    }

    public function updateDescription(Request $request)
    {
        $request->validate(['description' => 'required|string']);
        $home = Home::firstOrCreate([]);
        $home->update(['description' => $request->description]);
        return redirect()->back()->with('success', 'Deskripsi berhasil diupdate!');
    }

    public function updateButton(Request $request)
    {
        $request->validate([
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
        ]);
        $home = Home::firstOrCreate([]);
        $home->update([
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
        ]);
        return redirect()->back()->with('success', 'Button berhasil diupdate!');
    }
}