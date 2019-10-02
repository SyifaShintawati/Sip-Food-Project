<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class minuman extends Model
{
    protected $table = 'minuman';
    protected $fillable = ['nama_minuman','deskripsi', 'harga_minuman','pajak_minuman', 'foto','stok_minuman'];
    protected $primaryKey = 'id';

    public function transaksi(){
    	return $this->hasMany('App\transaksi', 'id');
    }
}
