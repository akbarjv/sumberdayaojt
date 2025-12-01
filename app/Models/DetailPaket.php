<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPaket extends Model
{
      use HasFactory;

      protected $fillable = ['pakets_id', 'isi'];
       public function paket()
       {
       return $this->belongsTo(Paket::class, 'pakets_id');
       }
}
