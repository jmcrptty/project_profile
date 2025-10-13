<?php

namespace App\Http\Controllers;

use App\Models\FotoGaleri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $photos = FotoGaleri::latest()->get(); 
        
        return view('dashboard.gallery', compact('photos'));
    }
}
