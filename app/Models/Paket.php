<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
      use HasFactory;

      protected $fillable = ['nama', 'deskripsi'];

      public function detailPakets()
        {
          return $this->hasMany(DetailPaket::class, 'pakets_id');
        }
}
