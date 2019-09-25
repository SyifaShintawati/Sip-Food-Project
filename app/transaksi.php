<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_customer', 'id_makanan', 'id_minuman', 'jumlah_makanan', 'jumlah_minuman', 'total_harga', 'tgl_pesan', 'tgl_kirim', 'alamat_tujuan'];
    protected $primaryKey = 'id';

    public function customer(){
    	return $this->belongsTo('App\customer', 'id_customer');
    }

    public function makanan(){
    	return $this->belongsTo('App\makanan', 'id_makanan');
    }

    public function minuman(){
    	return $this->belongsTo('App\minuman', 'id_minuman');
    }
}
