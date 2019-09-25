<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class minuman extends Model
{
    protected $table = 'minuman';
    protected $fillable = ['id_supplier','nama_minuman','harga_minuman','stok_minuman'];
    protected $primaryKey = 'id';

    public function supplier(){
    	return $this->belongsTo('App\supplier', 'id_supplier');
    }

    public function transaksi(){
    	return $this->hasMany('App\transaksi', 'id');
    }
}
