<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\FotoGaleri;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $photos = FotoGaleri::whereNotNull('foto_file')->orderBy('id', 'asc')->get(); // foto not null
        $contact = Contact::firstOrFail(); 

        return view('main', compact('photos', 'contact'));
    }
}
