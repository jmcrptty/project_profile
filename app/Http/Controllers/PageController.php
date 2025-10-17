<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\FotoGaleri;
use App\Models\VideoGaleri;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $photos = FotoGaleri::whereNotNull('foto_file')->orderBy('id', 'asc')->get();
        $contact = Contact::firstOrFail();
        $video = VideoGaleri::first();

        // About data
        $background = About::background()->first();
        $goals = About::goal()->first();
        $dosens = About::dosen()->ordered()->get();
        $mahasiswas = About::mahasiswa()->ordered()->get();
        $mitra = About::mitra()->first();

        return view('main', compact('photos', 'video', 'contact', 'background', 'goals', 'dosens', 'mahasiswas', 'mitra'));
    }
}
