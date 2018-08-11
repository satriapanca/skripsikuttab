<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('dashboard', 'DashboardController');
Route::resource('pengajar', 'PengajarController');
Route::get('cari/pengajar/{s?}', 'PengajarController@getCari')->name('pengajar.cari')->where('s', '[\w\d]+');
Route::resource('kelas', 'KelasController');
Route::resource('kategori', 'KategoriController');
Route::resource('jenis', 'JenisController');
Route::resource('pelajaran', 'PelajaranController');
Route::resource('santri', 'SantriController');
Route::get('cari/santri/{s?}', 'SantriController@getCari')->name('santri.cari')->where('s', '[\w\d]+');
Route::resource('pembayaran','PembayaranController');
Route::post('pembayaran/search','PembayaranController@search');
Route::resource('kas','KasController');
Route::resource('nilaiangka','NilaiangkaController');
Route::get('nilaiangka/uts/{uts}', 'NilaiangkaController@getUTS')->name('nilaiangka.uts');
Route::get('nilaiangka/input/{input}', 'NilaiangkaController@getINPUT')->name('nilaiangka.input');
