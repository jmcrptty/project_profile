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
        // Jika foto_file ada dan file exists di storage
        if ($this->foto_file && Storage::disk('public')->exists($this->foto_file)) {
            // Gunakan asset() untuk menghasilkan URL yang benar
            return asset('storage/' . $this->foto_file);
        }

        // Jika tidak ada foto, return placeholder SVG dengan pesan
        return 'data:image/svg+xml;utf8,' . rawurlencode('
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 853" class="w-full h-full">
                <rect width="1280" height="853" fill="#f1f5f9"/>
                <g transform="translate(640, 426.5)">
                    <path d="M-60-60h120v120h-120z" fill="#cbd5e1" opacity="0.5"/>
                    <circle cx="0" cy="-20" r="15" fill="#94a3b8"/>
                    <path d="M-40 20 L-20 0 L20 40 L40 20 L60 40" stroke="#94a3b8" stroke-width="8" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <text x="640" y="600" font-family="Arial, sans-serif" font-size="24" fill="#64748b" text-anchor="middle">Dokumentasi pengembangan dan testing IoT Agriculture</text>
            </svg>
        ');
    }
}
