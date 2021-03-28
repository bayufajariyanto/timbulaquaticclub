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

Route::name('pertanyaan.')->prefix('/pertanyaan')->group(function() {
    Route::get('/', 'AdministratorController@pertanyaan')->name('list');
    Route::post('/store', 'LandingPage@tanya')->name('store');
    Route::get('/destroy/{id}', 'AdministratorController@destroy_pertanyaan')->name('destroy');
});
Route::name('pendaftaran.')->prefix('/pendaftaran')->group(function() {
    Route::get('/', 'AdministratorController@pendaftaran')->name('index');
    Route::get('/detail/{id}', 'AdministratorController@detail_pendaftaran')->name('detail');
    Route::get('/acc/{id}', 'AdministratorController@acc_pendaftaran')->name('acc');
    Route::get('/destroy/{id}', 'AdministratorController@destroy_pendaftaran')->name('destroy');
});
// Route::get('/laporan', 'AdministratorController@laporan')->name('laporan');
Route::name('laporan.')->prefix('/laporan')->group(function() {
    Route::get('/', 'AdministratorController@laporan')->name('list');    
    Route::post('/store', 'AdministratorController@store_laporan')->name('store');
    Route::get('/edit/{id}', 'AdministratorController@edit_laporan')->name('edit');
    Route::post('/update', 'AdministratorController@update_laporan')->name('update');
    Route::get('/destroy/{id}', 'AdministratorController@destroy_laporan')->name('destroy');    
});
Route::name('rapor.')->prefix('/rapor')->group(function() {
    Route::get('/', 'AdministratorController@rapor')->name('list');
    Route::get('/detail/{id}', 'AdministratorController@detail_rapor')->name('detail');
});
Route::name('murid.')->prefix('/atlit')->group(function() {
    Route::get('/list', 'MuridController@list')->name('list');
    Route::get('/detail/{id}', 'MuridController@detail')->name('detail');
    Route::get('/nilai', 'NilaiController@nilai')->name('nilai');
    Route::get('/destroy/{id}', 'MuridController@destroy')->name('destroy');
});
Route::name('akun.')->prefix('/akun')->group(function() {
    Route::get('/', 'AkunController@show')->name('list');
    Route::get('/tambah', 'AkunController@add')->name('tambah');
    Route::post('/store', 'AkunController@store')->name('store');
    Route::get('/list/edit/{id}', 'AkunController@edit')->name('edit');
    Route::get('/password', 'HomeController@edit_password')->name('editpassword');
    Route::post('/password/update', 'HomeController@update_password')->name('updatepassword');
    Route::post('/update', 'AkunController@update')->name('update');
    Route::get('/list/hapus/{id}', 'AkunController@destroy')->name('hapus');
});
Route::get('/biodata', 'NilaiController@biodata')->name('biodata');
Route::get('/daftar', 'LandingPage@daftar')->name('daftar');
Route::get('/pelatih', 'LandingPage@pelatih');
Route::get('/tentang', 'LandingPage@tentang');
Route::get('/lokasi', 'LandingPage@lokasi');
Route::get('/harga/detail/{id}', 'LandingPage@detail_price')->name('detailprice');
Route::post('/daftar/simpan', 'LandingPage@simpandaftar');

Route::post('/pendaftaran', 'AjaxController@pendaftaranpost')->name('pendaftaran');
Route::get('/gettest', 'AjaxController@tes');

Route::get('/nomors/{id}', 'AjaxController@nomors');

