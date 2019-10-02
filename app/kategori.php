<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['jenis_kategori'];
    protected $primaryKey  = 'id';

    public function produk(){
    	return $this->hasMany('App\produk', 'id');
    }
}
