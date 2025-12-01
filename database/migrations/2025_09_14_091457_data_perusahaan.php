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
          Schema::create('data_perusahaans', function (Blueprint $table) {
          $table->id();
          $table->string('nama'); 
          $table->String('no_hp');
          $table->String('alamat');
          $table->text('google_map');
          $table->String('ig')->nullable();
          $table->String('facebook')->nullable();
          $table->String('tiktok')->nullable();
          $table->String('x')->nullable();
          $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
           Schema::dropIfExists('data_perusahaans');
    }
};
