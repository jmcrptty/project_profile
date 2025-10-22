<?php

namespace App\Http\Controllers;

use App\Models\VideoGaleri;
use App\Http\Requests\StoreVideoGaleriRequest;
use App\Http\Requests\UpdateVideoGaleriRequest;

class VideoGaleriController extends Controller
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
    public function store(StoreVideoGaleriRequest $request)
    {
        $request->validate([
            'youtube_url' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        VideoGaleri::create([
            'youtube_url' => $request->youtube_url,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Video berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoGaleri $videogaleri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoGaleri $videogaleri)
    {
        return redirect()->route('gallery.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoGaleriRequest $request, VideoGaleri $videogaleri)
    {
        $request->validate([
            'youtube_url' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $videogaleri->update([
            'youtube_url' => $request->youtube_url,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Video updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoGaleri $videogaleri)
    {
        $videogaleri->delete();
        return redirect()->back()->with('success', 'Video berhasil dihapus!');
    }
}
