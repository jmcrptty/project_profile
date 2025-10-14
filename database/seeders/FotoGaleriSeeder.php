<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FotoGaleri;

class FotoGaleriSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            FotoGaleri::updateOrCreate(
                ['id' => $i],
                [
                    'foto_file' => null,
                    'deskripsi' => "Caption untuk foto ke-$i. Silakan edit.",
                ]
            );
        }
    }
}