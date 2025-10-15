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
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->text('arduino_code')->nullable();
            $table->text('python_code')->nullable();
            $table->string('github_url')->nullable();
            $table->text('hardware_requirements')->nullable(); // stored as JSON array
            $table->text('software_stack')->nullable(); // stored as JSON array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
};
