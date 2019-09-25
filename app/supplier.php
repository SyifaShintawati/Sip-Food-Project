<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = ['nama_supplier', 'alamat_supplier', 'no_telpon'];
    protected $primaryKey = 'id';

    public function makanan(){
    	return $this->hasMany('App\makanan', 'id');
    }

    public function minuman(){
    	return $this->hasMany('App\minuman', 'id');
    }
}
