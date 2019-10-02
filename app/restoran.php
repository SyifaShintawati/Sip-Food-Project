<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restoran extends Model
{
    protected $table = 'restoran';
    protected $fillable = ['nama_restoran', 'alamat', 'no_telpon', 'rating', 'ceo_resto'];
    protected $primaryKey = 'id';
}
