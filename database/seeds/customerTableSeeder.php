<?php

use Illuminate\Database\Seeder;

class customerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = [
        	['id'=>'1', 'nama_customer'=>'Ksatria Bagus R', 'alamat_customer'=>'Sanggar Indah Banjaran', 'email'=>'ksatriabagus@gmail.com', 'no_telpon'=>'0896764742'],
        	['id'=>'2', 'nama_customer'=>'Dina Khairunnisa', 'alamat_customer'=>'Kampung Soreang', 'email'=>'dinakhoer@gmail.com', 'no_telpon'=>'0896723453'],
        	['id'=>'3', 'nama_customer'=>'Annisa Frida M', 'alamat_customer'=>'Komplek Ceuri Pangauban', 'email'=>'fridanisa@gmail.com', 'no_telpon'=>'081232474'],
        ];

        //innput ke db
        DB::table('customer')->insert($customer);
    }
}
