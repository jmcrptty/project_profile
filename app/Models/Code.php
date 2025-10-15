<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
        'arduino_code',
        'python_code',
        'github_url',
        'hardware_requirements',
        'software_stack'
    ];

    protected $casts = [
        'hardware_requirements' => 'array',
        'software_stack' => 'array'
    ];

    /**
     * Get hardware requirements as array
     */
    public function getHardwareListAttribute()
    {
        return $this->hardware_requirements ?? [];
    }

    /**
     * Get software stack as array
     */
    public function getSoftwareListAttribute()
    {
        return $this->software_stack ?? [];
    }
}
