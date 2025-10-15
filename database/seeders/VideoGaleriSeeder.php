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
        // Use updateOrCreate to ensure only one row with ID=1 ever exists.
        VideoGaleri::updateOrCreate(
            ['id' => 1], // The condition to find the row
            [
                // The default data for the row
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'judul'       => 'Demo Project IoT Agriculture',
                'deskripsi' => 'Demonstrasi lengkap sistem monitoring dan kontrol otomatis pertanian menggunakan sensor IoT',
            ]
        );
    }
}
