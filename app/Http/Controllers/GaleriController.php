<?php

namespace App\Http\Controllers;

use App\Models\FotoGaleri;
use App\Models\VideoGaleri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $photos = FotoGaleri::latest()->get(); 
        $video = VideoGaleri::first();
        
        return view('dashboard.gallery', compact('photos', 'video'));
    }
}
