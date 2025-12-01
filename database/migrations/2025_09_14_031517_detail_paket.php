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
         Schema::create('detail_pakets', function (Blueprint $table) {
         $table->id();
        $table->foreignId('pakets_id')
        ->constrained('pakets') // reference the "pakets" table
        ->onDelete('cascade');
         $table->string('isi'); // Example: "Hotel Stay", "Breakfast Included"
         $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::dropIfExists('detail_pakets');
    }
};
