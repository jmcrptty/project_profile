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
            // 1. Ambil data
            $imageData = $request->input('cropped_image_data');

            // 2. Pisahkan format pada nama file
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {

                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, gif
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

            $fileName = 'galeriFoto/' . Str::random(40) . '.' . $type;

            Storage::disk('public')->put($fileName, $imageData);

            // 5. Simpan informasi ke database
            FotoGaleri::create([
                'foto_file' => $fileName,
                'deskripsi' => $request->caption,
            ]);

            return back()->with('success-foto', 'Foto berhasil di-upload!');
            // return redirect()->route('komuni-pertama')->with('success', 'Anda berhasil mendaftar! Tunggu informasi lebih lanjut pada pengumuman');

        } catch (\Exception $e) {
            return back()->withErrors(['upload_error' => 'Gagal meng-upload foto: ' . $e->getMessage()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFotoGaleriRequest $request, FotoGaleri $fotoGaleri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FotoGaleri $fotoGaleri)
    {
        //
    }
}
