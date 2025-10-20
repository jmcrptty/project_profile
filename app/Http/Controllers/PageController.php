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
        $allPhotos = FotoGaleri::whereNotNull('foto_file')->orderBy('id', 'asc')->get();

        // Bagi foto menjadi 2 baris untuk tampilan gallery
        $photosRow1 = $allPhotos->take(4); // Baris 1: foto 1-4
        $photosRow2 = $allPhotos->slice(4, 4); // Baris 2: foto 5-8

        $photos = $allPhotos; // Untuk keperluan lain (jika ada)
        $contact = Contact::firstOrFail();
        $video = VideoGaleri::first();

        // About data
        $background = About::background()->first();
        $goals = About::goal()->first();
        $dosens = About::dosen()->ordered()->get();
        $mahasiswas = About::mahasiswa()->ordered()->get();
        $mitra = About::mitra()->first();

        return view('main', compact('photos', 'photosRow1', 'photosRow2', 'video', 'contact', 'background', 'goals', 'dosens', 'mahasiswas', 'mitra'));
    }
}
