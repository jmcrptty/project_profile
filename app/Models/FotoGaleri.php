<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoGaleri extends Model
{
    /** @use HasFactory<\Database\Factories\FotoGaleriFactory> */
    use HasFactory;

    protected $table = 'foto_galeris';

    protected $fillable = [
        'foto_file',    
        'deskripsi'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->foto_file && Storage::disk('public')->exists($this->foto_file)) {
            return Storage::disk('public')->url($this->foto_file); //ABAIKAN ERROR PADA LINE INI. VSCODE BE TRIPPIN, IM RIGHT
        }
        return 'https://placehold.co/1280x853/e2e8f0/adb5bd?text=Image+Not+Found';
    }
}
