<?php

namespace Database\Seeders;

use App\Models\VideoGaleri;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoGaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultYoutubeUrl = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=RDdQw4w9WgXcQ&start_radio=1';
        $embedUrl = 'https://www.youtube.com/embed/dQw4w9WgXcQ';

        if (VideoGaleri::count() == 0) {
            VideoGaleri::create([
                'title' => 'Rick Astley - Never Gonna Give You Up (Official Music Video)',
                'youtube_url' => $embedUrl, // Simpan dalam format embed
                'description' => 'Official Music Video for Rick Astley\'s "Never Gonna Give You Up". Watch and relive the classic 80s hit!',
            ]);
        }
    }
}
