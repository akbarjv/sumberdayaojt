<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Motor extends Model
{
      use HasFactory;

      protected $fillable = ['nama', 'kategori','gambar','harga'];
}
