<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\FotoGaleri;
use App\Models\VideoGaleri;

class PageController extends Controller
{
    public function index()
    {
        // Ambil semua foto yang sudah terupload (foto_file tidak null)
        $allPhotos = FotoGaleri::whereNotNull('foto_file')->latest()->get();

        // Bagi foto menjadi 2 baris (semua foto, tidak dibatasi)
        $photosRow1 = $allPhotos->filter(function($photo, $index) {
            return $index % 2 == 0; // Index genap (0, 2, 4, 6...)
        })->values();

        $photosRow2 = $allPhotos->filter(function($photo, $index) {
            return $index % 2 != 0; // Index ganjil (1, 3, 5, 7...)
        })->values();

        $photos = $allPhotos; // Semua foto untuk keperluan lain
        $contact = Contact::firstOrFail();

        // Ambil semua video
        $videos = VideoGaleri::latest()->get();
        $video = $videos->first(); // Untuk backward compatibility

        // About data
        $background = About::background()->first();
        $goals = About::goal()->first();
        $dosens = About::dosen()->ordered()->get();
        $mahasiswas = About::mahasiswa()->ordered()->get();
        $mitra = About::mitra()->first();

        return view('main', compact('photos', 'photosRow1', 'photosRow2', 'videos', 'video', 'contact', 'background', 'goals', 'dosens', 'mahasiswas', 'mitra'));
    }
}
