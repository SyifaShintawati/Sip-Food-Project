<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    protected $table = 'makanan';
    protected $fillable = ['nama_makanan', 'deskripsi', 'harga_makanan','pajak_makanan', 'foto', 'stok_makanan'];
    protected $primaryKey = 'id';

    public function transaksi(){
    	return $this->hasMany('App\transaksi', 'id');
    }
}
