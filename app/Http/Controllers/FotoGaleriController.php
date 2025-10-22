<?php

namespace App\Http\Controllers;

use App\Models\FotoGaleri;
use Illuminate\Http\Request; // REPLACE LATER
use App\Http\Requests\StoreFotoGaleriRequest;
use App\Http\Requests\UpdateFotoGaleriRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FotoGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFotoGaleriRequest $request)
    {
        try {
            // Validasi bahwa cropped_image_data ada
            if (!$request->filled('cropped_image_data')) {
                throw new \Exception('Data gambar tidak ditemukan.');
            }

            $imageData = $request->input('cropped_image_data');

            // Validasi format data URI base64
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $type = strtolower($type[1]);

                // Validasi tipe gambar yang diizinkan
                if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                    throw new \Exception('Tipe gambar tidak valid. Hanya jpg, jpeg, gif, dan png yang diizinkan.');
                }

                // Decode base64
                $imageData = base64_decode($imageData);
                if ($imageData === false) {
                    throw new \Exception('Gagal mendekode data base64.');
                }
            } else {
                throw new \Exception('Data URI tidak sesuai format yang diharapkan.');
            }

            // Generate nama file unik dan simpan
            // Format: galeriFoto/[random40chars].jpg
            $newFileName = 'galeriFoto/' . Str::random(40) . '.' . $type;

            // Simpan ke storage/app/public/galeriFoto/
            Storage::disk('public')->put($newFileName, $imageData);

            // Simpan ke database
            FotoGaleri::create([
                'foto_file' => $newFileName,
                'deskripsi' => $request->caption ?? 'Foto Gallery'
            ]);

            return back()->with('success-foto', 'Foto berhasil ditambahkan!');

        } catch (\Exception $e) {
            return back()->withErrors(['upload_error' => 'Gagal menambahkan foto: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FotoGaleri $fotoGaleri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FotoGaleri $fotoGaleri)
    {
        // larangan hard-coded
        return redirect()->back()->withErrors(['upload_error' => 'Penambahan foto baru tidak diizinkan.']);
    }

    /**
     * Update the specified resource in storage.
     * Ukuran foto yang dihasilkan: 1280x853px (aspect ratio 1280/853) sesuai dengan tampilan frontend
     */
    public function update(UpdateFotoGaleriRequest $request, FotoGaleri $fotoGaleri)
    {
        try {
            // Proses update foto jika ada cropped image data
            if ($request->filled('cropped_image_data')) {

                $imageData = $request->input('cropped_image_data');

                // Validasi format data URI base64
                if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                    $imageData = substr($imageData, strpos($imageData, ',') + 1);
                    $type = strtolower($type[1]);

                    // Validasi tipe gambar yang diizinkan
                    if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                        throw new \Exception('Tipe gambar tidak valid. Hanya jpg, jpeg, gif, dan png yang diizinkan.');
                    }

                    // Decode base64
                    $imageData = base64_decode($imageData);
                    if ($imageData === false) {
                        throw new \Exception('Gagal mendekode data base64.');
                    }
                } else {
                    throw new \Exception('Data URI tidak sesuai format yang diharapkan.');
                }

                // Hapus foto lama jika ada
                if ($fotoGaleri->foto_file && Storage::disk('public')->exists($fotoGaleri->foto_file)) {
                    Storage::disk('public')->delete($fotoGaleri->foto_file);
                }

                // Generate nama file unik dan simpan
                // Format: galeriFoto/[random40chars].jpg
                $newFileName = 'galeriFoto/' . Str::random(40) . '.' . $type;

                // Simpan ke storage/app/public/galeriFoto/
                Storage::disk('public')->put($newFileName, $imageData);

                // Update path file di database
                $fotoGaleri->foto_file = $newFileName;
            }

            // Update caption/deskripsi foto
            $fotoGaleri->deskripsi = $request->caption;

            // Simpan perubahan ke database
            $fotoGaleri->save();

            return back()->with('success-foto', 'Foto berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->withErrors(['upload_error' => 'Gagal memperbarui foto: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FotoGaleri $fotoGaleri)
    {
        // larangan hard-coded
        return redirect()->back()->withErrors(['delete_error' => 'Penghapusan foto tidak diizinkan.']);
    }
}
