<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'type',
        'content',
        'name',
        'position',
        'photo',
        'role',
        'logo',
        'mitra_type',
        'description',
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = ['photo_url', 'logo_url'];

    // ========================================
    // Accessors
    // ========================================

    /**
     * Get photo URL
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        return null;
    }

    /**
     * Get logo URL
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/' . $this->logo);
        }
        return null;
    }

    /**
     * Get initials from name
     */
    public function getInitialsAttribute()
    {
        if ($this->name) {
            return strtoupper(substr($this->name, 0, 2));
        }
        return null;
    }

    /**
     * Get goals as array
     */
    public function getGoalsArrayAttribute()
    {
        if ($this->type === 'goal' && $this->content) {
            return array_filter(explode("\n", $this->content));
        }
        return [];
    }

    // ========================================
    // Scopes
    // ========================================

    public function scopeBackground($query)
    {
        return $query->where('type', 'background');
    }

    public function scopeGoal($query)
    {
        return $query->where('type', 'goal');
    }

    public function scopeDosen($query)
    {
        return $query->where('type', 'dosen')->ordered();
    }

    public function scopeMahasiswa($query)
    {
        return $query->where('type', 'mahasiswa')->ordered();
    }

    public function scopeMitra($query)
    {
        return $query->where('type', 'mitra');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'asc');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('role', 'like', "%{$search}%")
              ->orWhere('position', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    // ========================================
    // Boot Method
    // ========================================

    protected static function boot()
    {
        parent::boot();

        // Auto delete media files when deleting record
        static::deleting(function ($about) {
            if ($about->photo && Storage::disk('public')->exists($about->photo)) {
                Storage::disk('public')->delete($about->photo);
            }
            if ($about->logo && Storage::disk('public')->exists($about->logo)) {
                Storage::disk('public')->delete($about->logo);
            }
        });
    }
}
