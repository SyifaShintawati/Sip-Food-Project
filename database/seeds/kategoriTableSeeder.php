<?php

use Illuminate\Database\Seeder;

class kategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
        	['id'=>'1', 'jenis_kategori'=>'Ayam'],
        	['id'=>'2', 'jenis_kategori'=>'Paket nasi'],
        	['id'=>'3', 'jenis_kategori'=>'Makanan ringan'],
        	['id'=>'4', 'jenis_kategori'=>'Salad'],
        	['id'=>'5', 'jenis_kategori'=>'Minuman'],
        	['id'=>'6', 'jenis_kategori'=>'Kue'],
        	['id'=>'7', 'jenis_kategori'=>'Mie'],
        	['id'=>'8', 'jenis_kategori'=>'Spagheti'],
        	['id'=>'9', 'jenis_kategori'=>'Junk food'],
        	['id'=>'10', 'jenis_kategori'=>'Makanan berat'],
        ];

        DB::table('kategori')->insert($kategori);
    }
}
