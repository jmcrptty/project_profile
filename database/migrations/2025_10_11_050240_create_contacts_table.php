<?php
// database/migrations/xxxx_xx_xx_create_contacts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('heading_title');
            $table->text('heading_subtitle');
            $table->string('phone_mobile');
            $table->string('phone_office');
            $table->string('address_lab');
            $table->string('address_faculty');
            $table->string('address_university');
            $table->string('address_street');
            $table->text('map_embed_url');
            $table->string('institution_label');
            $table->string('institution_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};