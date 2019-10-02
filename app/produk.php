<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['id_kategori', 'nama_produk', 'deskripsi', 'foto', 'stok', 'harga_asli', 'harga_jual'];
    protected $primaryKey = 'id';

    public function kategori(){
    	return $this->belongsTo('App\kategori', 'id_kategori');
    }
}
