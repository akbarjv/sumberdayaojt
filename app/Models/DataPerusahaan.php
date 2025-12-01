<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPerusahaan extends Model
{
     use HasFactory;

     protected $fillable = ['nama',
     'no_hp','alamat','google_map','ig','facebook','tiktok','x','alamat_pickup','google_map_pickup','banner_title','banner_subtitle'];

   
}
