<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGaleri extends Model
{
    /** @use HasFactory<\Database\Factories\VideoGaleriFactory> */
    use HasFactory;

    protected $table = 'video_galeris';

    protected $fillable = [
        'youtube_url',    
        'judul',
        'deskripsi'
    ];
}
