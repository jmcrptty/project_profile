<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\FotoGaleri;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $photos = FotoGaleri::whereNotNull('foto_file')->orderBy('id', 'asc')->get();
        $contact = Contact::firstOrFail();

        // About data
        $background = About::background()->first();
        $goals = About::goal()->first();
        $dosens = About::dosen()->ordered()->get();
        $mahasiswas = About::mahasiswa()->ordered()->get();
        $mitra = About::mitra()->first();

        return view('main', compact('photos', 'contact', 'background', 'goals', 'dosens', 'mahasiswas', 'mitra'));
    }
}
