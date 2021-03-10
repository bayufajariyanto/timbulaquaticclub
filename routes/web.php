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

Route::get('/', 'LandingPage@home');

Auth::routes();

Route::get('/tes', function() {
    return view('dashboard.tes');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pertanyaan', 'HomeController@pertanyaan')->name('pertanyaan');
Route::get('/laporan', 'HomeController@laporan')->name('laporan');
Route::name('murid.')->prefix('/murid')->group(function() {
    Route::get('/list', 'MuridController@list')->name('list');
    Route::get('/tambah', 'MuridController@add')->name('tambah');
    Route::get('/nilai', 'MuridController@nilai')->name('nilai');
});
// Route::get('/nilai', 'MuridController@nilaibyid')->name('murid.nilaibyid');
Route::get('/daftar', 'LandingPage@daftar');
Route::get('/pelatih', 'LandingPage@pelatih');
Route::get('/tentang', 'LandingPage@tentang');
Route::get('/lokasi', 'LandingPage@lokasi');
Route::post('/daftar/simpan', 'LandingPage@simpandaftar');

Route::post('/pendaftaran', 'AjaxController@pendaftaranpost')->name('pendaftaran');

