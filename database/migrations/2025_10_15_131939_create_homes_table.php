<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->enum('media_type', ['video', 'images'])->default('video');
            $table->string('video_url')->nullable();
            $table->json('images')->nullable(); // Array untuk menyimpan multiple images
            $table->string('subtitle');
            $table->string('title');
            $table->text('description');
            $table->string('button_text');
            $table->string('button_link');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};