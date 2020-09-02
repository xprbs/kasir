<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index')->name('index');

Route::get('satuan', 'SatuanController@index')->name('satuan');
Route::post('simpan-satuan', 'SatuanController@store')->name('simpan-satuan');
Route::get('hapus-satuan/{id}', 'SatuanController@destroy')->name('hapus-satuan/{id}');

Route::get('produk', 'ProdukController@index')->name('produk');
Route::post('simpan-produk', 'ProdukController@store')->name('simpan-produk');
Route::get('hapus-produk/{id}', 'ProdukController@destroy')->name('hapus-produk/{id}');

Route::get('transaksi', 'TransaksiController@index')->name('transaksi');
Route::post('harga', 'TransaksiController@check')->name('harga');

Route::get('transaksi-grosir', 'TransaksiGrosirController@index')->name('transaksi-grosir');
Route::post('harga-grosir', 'TransaksiGrosirController@check')->name('harga-grosir');