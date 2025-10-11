<?php
// database/seeders/ContactSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'heading_title' => 'Kontak',
                'heading_subtitle' => 'Hubungi kami untuk informasi lebih lanjut tentang project ini',
                'phone_mobile' => '+62 812-3456-7890',
                'phone_office' => '(031) 123-4567',
                'address_lab' => 'Laboratorium IoT & Embedded Systems',
                'address_faculty' => 'Fakultas Teknik Informatika',
                'address_university' => 'Universitas Teknologi Nusantara',
                'address_street' => 'Jl. Teknologi No. 123, Surabaya 60111',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.344!2d112.7366!3d-7.2504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTUnMDEuNCJTIDExMsKwNDQnMTEuOCJF!5e0!3m2!1sen!2sid!4v1234567890',
                'institution_label' => 'Supported by',
                'institution_name' => 'Universitas Teknologi Nusantara',
            ]
        );
    }
}