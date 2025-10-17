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
        // larangan hard-coded
        return redirect()->back()->withErrors(['upload_error' => 'Penambahan foto baru tidak diizinkan.']);
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
     */
    public function update(UpdateFotoGaleriRequest $request, FotoGaleri $fotoGaleri)
    {
        try {
            if ($request->filled('cropped_image_data')) {
                
                $imageData = $request->input('cropped_image_data');
                
                if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                    $imageData = substr($imageData, strpos($imageData, ',') + 1);
                    $type = strtolower($type[1]);

                    if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                        throw new \Exception('Tipe gambar tidak valid.');
                    }
                    $imageData = base64_decode($imageData);
                    if ($imageData === false) {
                        throw new \Exception('Gagal mendekode data base64.');
                    }
                } else {
                    throw new \Exception('Data URI tidak sesuai format.');
                }
                
                // hapus foto lama
                if ($fotoGaleri->foto_file && Storage::disk('public')->exists($fotoGaleri->foto_file)) {
                    Storage::disk('public')->delete($fotoGaleri->foto_file);
                }

                $newFileName = 'galeriFoto/' . Str::random(40) . '.' . $type;

                Storage::disk('public')->put($newFileName, $imageData);

                $fotoGaleri->foto_file = $newFileName;
            }

            // update caption
            $fotoGaleri->deskripsi = $request->caption;

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
