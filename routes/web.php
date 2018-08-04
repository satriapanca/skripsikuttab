<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('pengajar', 'PengajarController');
Route::resource('kelas', 'KelasController');
Route::resource('kategori', 'KategoriController');
Route::resource('jenis', 'JenisController');
Route::resource('pelajaran', 'PelajaranController');
Route::resource('santri', 'SantriController');
Route::resource('pembayaran','PembayaranController');
Route::post('pembayaran/search','PembayaranController@search');
Route::resource('kas','KasController');
