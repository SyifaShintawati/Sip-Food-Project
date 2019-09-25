<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['nama_customer', 'alamat_customer', 'email', 'no_telpon'];
    protected $primaryKey = 'id';

    public function transaksi(){
    	return $this->hasMany('App\transaksi', 'id');
    }
}
