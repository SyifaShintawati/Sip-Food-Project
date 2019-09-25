<?php

use Illuminate\Database\Seeder;

class supplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = [
        	['id'=>'1', 'nama_supplier'=>'PT Sejahtera Bersama', 'alamat_supplier'=>'Cikarang Raya No 12', 'no_telpon'=>'121314'],
        	['id'=>'2', 'nama_supplier'=>'PT Bangkit', 'alamat_supplier'=>'Bekasi Timur', 'no_telpon'=>'12434665'],
        	['id'=>'3', 'nama_supplier'=>'Cahaya Abadi Food', 'alamat_supplier'=>'Cigondewah No 982', 'no_telpon'=>'1123445'],
        ];

        //innput ke db
        DB::table('supplier')->insert($supplier);
    }
}
