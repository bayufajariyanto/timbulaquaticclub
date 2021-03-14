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
Route::get('/pertanyaan', 'AdministratorController@pertanyaan')->name('pertanyaan');
Route::name('pendaftaran.')->prefix('/pendaftaran')->group(function() {
    Route::get('/', 'AdministratorController@pendaftaran')->name('index');
    Route::get('/detail/{id}', 'AdministratorController@detail_pendaftaran')->name('detail');
});
// Route::get('/laporan', 'AdministratorController@laporan')->name('laporan');
Route::name('laporan.')->prefix('/laporan')->group(function() {
    Route::get('/', 'AdministratorController@laporan')->name('list');
    Route::get('/detail', 'AdministratorController@detail_laporan')->name('detail');
    Route::post('/store', 'AdministratorController@store_laporan')->name('store');
});
Route::name('murid.')->prefix('/murid')->group(function() {
    Route::get('/list', 'MuridController@list')->name('list');
    Route::get('/tambah', 'MuridController@add')->name('tambah');
    Route::get('/nilai', 'NilaiController@nilai')->name('nilai');
});
Route::name('akun.')->prefix('/akun')->group(function() {
    Route::get('/', 'AkunController@show')->name('list');
    Route::get('/tambah', 'AkunController@add')->name('tambah');
    Route::post('/store', 'AkunController@store')->name('store');
    Route::get('/list/edit/{id}', 'AkunController@edit')->name('edit');
    Route::post('/update', 'AkunController@update')->name('update');
    Route::get('/list/hapus/{id}', 'AkunController@destroy')->name('hapus');
});
// Route::get('/nilai', 'MuridController@nilaibyid')->name('murid.nilaibyid');
Route::get('/daftar', 'LandingPage@daftar');
Route::get('/pelatih', 'LandingPage@pelatih');
Route::get('/tentang', 'LandingPage@tentang');
Route::get('/lokasi', 'LandingPage@lokasi');
Route::post('/daftar/simpan', 'LandingPage@simpandaftar');

Route::post('/pendaftaran', 'AjaxController@pendaftaranpost')->name('pendaftaran');
Route::get('/gettest', 'AjaxController@tes');

