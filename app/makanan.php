<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    protected $table = 'makanan';
    protected $fillable = ['id_supplier','nama_makanan','harga_makanan','stok_makanan'];
    protected $primaryKey = 'id';

    public function supplier(){
    	return $this->belongsTo('App\supplier', 'id_supplier');
    }

    public function transaksi(){
    	return $this->hasMany('App\transaksi', 'id');
    }
}
