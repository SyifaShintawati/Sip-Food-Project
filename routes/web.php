<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/managamen', function () {
    return view('managemendata');
});


//customer
Route::get('api/customer', 'customerController@customer')->name('api.customer');
Route::resource('/customer', 'customerController');

//supplier/resto
Route::get('api/supplier', 'supplierController@supplier')->name('api.supplier');
Route::resource('/supplier', 'supplierController');

//makanan
Route::get('api/makanan', 'makananController@makanan')->name('api.makanan');
Route::resource('/makanan', 'makananController');

//minuman
Route::get('api/minuman', 'minumanController@minuman')->name('api.minuman');
Route::resource('/minuman', 'minumanController');

//transaksi
Route::get('api/transaksi', 'transaksiController@transaksi')->name('api.transaksi');
Route::resource('/transaksi', 'transaksiController');
Route::get('get-total/{id}/{jul}','transaksiController@total');
Route::get('get-total/{id}/{jum}/{total}','transaksiController@total1');


//produk
Route::get('api/produk', 'produkController@produk')->name('api.produk');
Route::resource('/produk', 'produkController');


//kategori
Route::get('api/kategori', 'kategoriController@kategori')->name('api.kategori');
Route::resource('/kategori', 'kategoriController');
