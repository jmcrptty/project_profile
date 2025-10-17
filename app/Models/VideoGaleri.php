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
        'title',
        'description',
    ];
    
    // public function getEmbedUrlAttribute(): string
    // {
    //     preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->youtube_url, $match);

    //     $videoId = $match[1] ?? null;

    //     if ($videoId) {
    //         return 'https://www.youtube.com/embed/' . $videoId;
    //     }
        
    //     return $this->youtube_url;
    // }

    public function getEmbedUrlAttribute()
    {
        $url = $this->youtube_url;

        // If it's a youtu.be short link
        if (str_contains($url, 'youtu.be')) {
            $videoId = substr(parse_url($url, PHP_URL_PATH), 1);
        }
        // If it's a full youtube.com link
        elseif (str_contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $params);
            $videoId = $params['v'] ?? null;
        } else {
            return null; // Not a recognized YouTube URL
        }

        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }

}
