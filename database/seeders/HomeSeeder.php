<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        Home::truncate();

        // Buat data default
        Home::create([
            'media_type' => 'video',
            'video_url' => 'https://cdn.coverr.co/videos/coverr-aerial-view-of-a-farm-field-5352/1080p.mp4',
            'images' => null,
            'subtitle' => 'Smart Agriculture IoT Project',
            'title' => "Meningkatkan Hasil Pertanian\nDengan Sensor Pintar",
            'description' => 'Monitoring real-time kondisi lingkungan pertanian untuk produktivitas maksimal dan keberlanjutan',
            'button_text' => 'Jelajahi Proyek',
            'button_link' => '#about',
            'is_active' => true
        ]);
    }
}