<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // Tampilkan halaman dashboard home
    public function index()
    {
        return view('dashboard.home');
    }

    // Update Media (Video atau Images)
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

                $home->update([
                    'media_type' => 'video',
                    'video_url' => $request->video_url,
                    'images' => null,
                ]);

                return redirect()->back()->with('success', 'Video berhasil diupdate!');
            } 
            else {
                // === UPLOAD IMAGES ===
                
                // Cek apakah ada file yang diupload
                if (!$request->hasFile('images')) {
                    // Jika tidak ada file baru dan sudah ada gambar sebelumnya, skip
                    if ($home->images && count($home->images) >= 3) {
                        $home->update(['media_type' => 'images']);
                        return redirect()->back()->with('success', 'Media type berhasil diubah ke slideshow!');
                    }
                    
                    return redirect()->back()->with('error', 'Minimal 3 gambar harus diupload!');
                }

                // Validasi file upload
                $request->validate([
                    'images' => 'required|array|min:3|max:10',
                    'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // max 5MB
                ], [
                    'images.required' => 'Minimal 3 gambar harus diupload',
                    'images.min' => 'Minimal 3 gambar diperlukan',
                    'images.max' => 'Maksimal 10 gambar',
                    'images.*.image' => 'File harus berupa gambar',
                    'images.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
                    'images.*.max' => 'Ukuran gambar maksimal 5MB',
                ]);

                // Hapus video URL jika switch dari video ke images
                if ($home->media_type === 'video') {
                    $home->video_url = null;
                }

                // Hapus gambar lama jika ada
                if ($home->images) {
                    foreach ($home->images as $oldImage) {
                        if (Storage::disk('public')->exists($oldImage)) {
                            Storage::disk('public')->delete($oldImage);
                        }
                    }
                }

                // Upload gambar baru
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    // Generate unique filename
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    
                    // Store di public/storage/home_images
                    $path = $image->storeAs('home_images', $filename, 'public');
                    
                    $imagePaths[] = $path;
                }

                // Update database
                $home->update([
                    'media_type' => 'images',
                    'images' => $imagePaths,
                    'video_url' => null,
                ]);

                return redirect()->back()->with('success', count($imagePaths) . ' gambar berhasil diupload!');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal: ' . implode(', ', $e->validator->errors()->all()));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Delete single image
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

            // Cek minimal 3 gambar
            if (count($images) <= 3) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimal harus ada 3 gambar. Tidak bisa dihapus!'
                ]);
            }

            // Delete file dari storage
            if (Storage::disk('public')->exists($images[$index])) {
                Storage::disk('public')->delete($images[$index]);
            }

            // Remove dari array
            array_splice($images, $index, 1);
            
            // Re-index array
            $images = array_values($images);

            // Update database
            $home->update(['images' => $images]);

            return response()->json([
                'success' => true,
                'message' => 'Gambar berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Update Subtitle
    public function updateSubtitle(Request $request)
    {
        $request->validate(['subtitle' => 'required|string|max:255']);
        
        $home = Home::firstOrCreate([]);
        $home->update(['subtitle' => $request->subtitle]);

        return redirect()->back()->with('success', 'Subtitle berhasil diupdate!');
    }

    // Update Title
    public function updateTitle(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        
        $home = Home::firstOrCreate([]);
        $home->update(['title' => $request->title]);

        return redirect()->back()->with('success', 'Title berhasil diupdate!');
    }

    // Update Description
    public function updateDescription(Request $request)
    {
        $request->validate(['description' => 'required|string']);
        
        $home = Home::firstOrCreate([]);
        $home->update(['description' => $request->description]);

        return redirect()->back()->with('success', 'Deskripsi berhasil diupdate!');
    }

    // Update Button
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