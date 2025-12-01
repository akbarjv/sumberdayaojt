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
            Schema::create('motors', function (Blueprint $table) {
                $table->id();
                $table->string('nama'); // Motorcycle name
                $table->string('kategori'); // e.g. sport, scooter
                $table->string('gambar'); // store image path/filename
                $table->timestamps(); // created_at, updated_at
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('motors');
    }
};
