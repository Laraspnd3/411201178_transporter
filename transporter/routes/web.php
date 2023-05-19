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

use App\Http\Controllers\ApiBarangController;

Auth::routes();

Route::get('activate/{token}', 'Auth\RegisterController@activate')
    ->name('activate');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('lokasi','LokasiController');
Route::resource('pengiriman','PengirimanController');
Route::resource('barang','BarangController');


Route::apiResource('apiBarang', 'ApiBarangController');
Route::apiResource('apiPengiriman', 'ApiPengirimanController');
Route::apiResource('apiLokasi', 'ApiLokasiController');