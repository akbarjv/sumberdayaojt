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
        Schema::table('data_perusahaans', function (Blueprint $table) {
              $table->string('alamat_pickup')->nullable();
              $table->text('google_map_pickup')->nullable();
              $table->string('banner_title')->nullable();
              $table->string('banner_subtitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_perusahaans', function (Blueprint $table) {
            $table->dropColumn('alamat_pickup');
            $table->dropColumn('google_map_pickup');
            $table->dropColumn('banner_title');
            $table->dropColumn('banner_subtitle');
        });
    }
};
