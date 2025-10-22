<?php

namespace App\Http\Controllers;

use App\Models\FotoGaleri;
use App\Models\VideoGaleri;

class GaleriController extends Controller
{
    public function index()
    {
        // Ambil semua foto, dibagi menjadi 2 baris untuk tampilan frontend
        $allPhotos = FotoGaleri::latest()->get();

        // Bagi foto menjadi 2 baris: baris pertama (4 foto pertama) dan baris kedua (4 foto terakhir)
        $photosRow1 = $allPhotos->take(4); // Baris 1: foto 1-4
        $photosRow2 = $allPhotos->slice(4, 4); // Baris 2: foto 5-8

        $photos = $allPhotos; // Untuk keperluan dashboard (tetap kirim semua)
        $videos = VideoGaleri::latest()->get(); // Ambil semua video
        $video = $videos->first(); // Untuk backward compatibility

        return view('dashboard.gallery', compact('photos', 'photosRow1', 'photosRow2', 'videos', 'video'));
    }
}
