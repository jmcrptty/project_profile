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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['background', 'goal', 'dosen', 'mahasiswa', 'mitra']);

            // Fields for background & goal
            $table->text('content')->nullable();

            // Fields for dosen
            $table->string('name')->nullable();
            $table->string('position')->nullable(); // for dosen
            $table->string('photo')->nullable(); // for dosen & mahasiswa

            // Fields for mahasiswa
            $table->string('role')->nullable(); // for mahasiswa

            // Fields for mitra
            $table->string('logo')->nullable(); // for mitra logo
            $table->string('mitra_type')->nullable(); // mitra type (Mitra Utama, etc)
            $table->text('description')->nullable();

            // Common fields
            $table->integer('order')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('type');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};