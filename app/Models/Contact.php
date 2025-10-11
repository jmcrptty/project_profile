<?php
// app/Models/Contact.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'heading_title',
        'heading_subtitle',
        'phone_mobile',
        'phone_office',
        'address_lab',
        'address_faculty',
        'address_university',
        'address_street',
        'map_embed_url',
        'institution_label',
        'institution_name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}