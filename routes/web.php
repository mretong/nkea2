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
    if(!Auth::user())
    	return redirect()->route('login');
    else
    	return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'members', 'as' => 'members.', 'middleware' => 'auth'], function() {


	//	Negeri

	Route::group(['prefix' => 'negeri'], function() {

		Route::get('/', [
			'as'	=> 'negeri.index',
			'uses'	=> 'NegeriController@index'
		]);

		Route::get('/create', [
			'as'	=> 'negeri.create',
			'uses'	=> 'NegeriController@create' 
		]);

		Route::post('/create', [
			'as'	=> 'negeri.createPost',
			'uses'	=> 'NegeriController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=> 'negeri.hapus',
			'uses'	=> 'NegeriController@hapus'
		]);

		Route::get('/{negeri}', [
			'as'	=>	'negeri.show',
			'uses'	=>	'NegeriController@show'
		]);

		Route::post('/{negeri}',[
			'as'	=>	'negeri.update',
			'uses'	=>	'NegeriController@update'
		]);

	});


	//	DAERAH
	Route::group(['prefix' => 'daerah'], function() {

		Route::get('/', [
			'as'	=> 'daerah.index', 
			'uses'	=> 'DaerahController@index'
		]); // listing of daerah

		Route::get('/create', [
			'as'	=> 'daerah.create',
			'uses'	=> 'DaerahController@create'
		]);

		Route::post('/create', [
			'as'	=> 'daerah.createPost',
			'uses'	=> 'DaerahController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=> 'daerah.hapus',
			'uses'	=> 'DaerahController@hapus'
		]);

		Route::get('/{daerah}', [
			'as'	=>	'daerah.show',
			'uses'	=>	'DaerahController@show'
		]);

		Route::post('/{daerah}',[
			'as'	=>	'daerah.update',
			'uses'	=>	'DaerahController@update'
		]);

	});
	


	//Mukim
	Route::get('/mukim', [
		'as'	=> 'mukim.index',
		'uses'	=> 'MukimController@index'
	]);

	Route::get('/mukim/create', [
		'as'	=> 'mukim.create',
		'uses'	=> 'MukimController@create'
	]);

	Route::post('/mukim/create', [
		'as'	=> 'mukim.createPost',
		'uses'	=> 'MukimController@createPost'
	]);

	Route::get('/mukim/hapus/{id}', [
		'as'	=> 'mukim.hapus',
		'uses'	=> 'MukimController@hapus'
	]);




	//Wilayah
	Route::get('/wilayah', [
		'as'	=> 'wilayah.index', 
		'uses'	=> 'WilayahController@index'
	]); // listing of daerah

	Route::get('/wilayah/create', [
		'as'	=> 'wilayah.create',
		'uses'	=> 'WilayahController@create'
	]);

	Route::post('/wilayah/create', [
		'as'	=> 'wilayah.createPost',
		'uses'	=> 'WilayahController@createPost'
	]);

	Route::get('/wilayah/hapus/{id}', [
		'as'	=> 'wilayah.hapus',
		'uses'	=> 'WilayahController@hapus'
	]);


	//Fasa
	Route::get('/fasa', [
		'as'	=>	'fasa.index',
		'uses'	=>	'FasaController@index'
	]);

	Route::get('/fasa/create', [
		'as'	=>	'fasa.create',
		'uses'	=>	'FasaController@create'
	]);

	Route::post('/fasa/create', [
		'as'	=>	'fasa.createPost',
		'uses'	=>	'FasaController@createPost'
	]);

	Route::get('/fasa/hapus/{id}', [
		'as'	=>	'fasa.hapus',
		'uses'	=>	'FasaController@hapus'
	]);


	//Lokaliti
	Route::get('/lokaliti', [
		'as'	=>	'lokaliti.index',
		'uses'	=>	'LokalitiController@index'
	]);

	Route::get('/lokaliti/create', [
		'as'	=>	'lokaliti.create',
		'uses'	=>	'LokalitiController@create'
	]);

	Route::post('/lokaliti/create', [
		'as'	=>	'lokaliti.createPost',
		'uses'	=>	'LokalitiController@createPost'
	]);

	Route::get('/lokaliti/hapus/{id}', [
		'as'	=>	'lokaliti.hapus',
		'uses'	=>	'LokalitiController@hapus'
	]);



	//Pakej
	Route::get('/pakej', [
		'as'	=>	'pakej.index',
		'uses'	=>	'PakejController@index'
	]);

	Route::get('/pakej/create', [
		'as'	=>	'pakej.create',
		'uses'	=>	'PakejController@create'
	]);

	Route::post('/pakej/create', [
		'as'	=>	'pakej.createPost',
		'uses'	=>	'PakejController@createPost'
	]);

	Route::get('/pakej/hapus/{id}', [
		'as'	=>	'pakej.hapus',
		'uses'	=>	'PakejController@hapus'
	]);



	//Blok
	Route::get('/blok', [
		'as'	=>	'blok.index',
		'uses'	=>	'BlokController@index'
	]);

	Route::get('/blok/create', [
		'as'	=>	'blok.create',
		'uses'	=>	'BlokController@create'
	]);

	Route::post('/blok/create', [
		'as'	=>	'blok.createPost',
		'uses'	=>	'BlokController@createPost'
	]);

	Route::get('/blok/hapus/{id}', [
		'as'	=>	'blok.hapus',
		'uses'	=>	'BlokController@hapus'
	]);


	//Lot
	Route::get('/lot', [
		'as'	=>	'lot.index',
		'uses'	=>	'LotController@index'
	]);

	Route::get('/lot/create', [
		'as'	=>	'lot.create',
		'uses'	=>	'LotController@create'
	]);

	Route::post('/lot/create', [
		'as'	=>	'lot.createPost',
		'uses'	=>	'LotController@createPost'
	]);

	Route::get('/lot/hapus/{id}', [
		'as'	=>	'lot.hapus',
		'uses'	=>	'LotController@hapus'
	]);


	//Warta
	Route::get('/warta', [
		'as'	=>	'warta.index',
		'uses'	=>	'WartaController@index'
	]);

	Route::get('/warta/create', [
		'as'	=>	'warta.create',
		'uses'	=>	'WartaController@create'
	]);

	Route::post('/warta/create', [
		'as'	=>	'warta.createPost',
		'uses'	=>	'WartaController@createPost'
	]);

	Route::get('/warta/hapus/{id}', [
		'as'	=>	'warta.hapus',
		'uses'	=>	'WartaController@hapus'
	]);

	Route::get('warta/{warta}', [
		'as'	=>	'warta.show',
		'uses'	=>	'WartaController@show'
	]);

	Route::post('warta/{warta}',[
		'as'	=>	'warta.update',
		'uses'	=>	'WartaController@update'
	]);



	//Perbicaraan
	Route::get('/bicara', [
		'as'	=>	'bicara.index',
		'uses'	=>	'PerbicaraanController@index'
	]);

	Route::get('/bicara/create', [
		'as'	=>	'bicara.create',
		'uses'	=>	'PerbicaraanController@create'
	]);

	Route::post('/bicara/create', [
		'as'	=>	'bicara.createPost',
		'uses'	=>	'PerbicaraanController@createPost'
	]);

	Route::get('/bicara/hapus/{id}', [
		'as'	=>	'bicara.hapus',
		'uses'	=>	'PerbicaraanController@hapus'
	]);

	Route::get('bicara/{bicara}', [
		'as'	=>	'bicara.show',
		'uses'	=>	'PerbicaraanController@show'
	]);

	Route::post('bicara/{bicara}',[
		'as'	=>	'bicara.update',
		'uses'	=>	'PerbicaraanController@update'
	]);



	//Borang-K
	Route::get('/borangk', [
		'as'	=>	'borangk.index',
		'uses'	=>	'BorangkController@index'
	]);

	Route::get('/borangk/create', [
		'as'	=>	'borangk.create',
		'uses'	=>	'BorangkController@create'
	]);

	Route::post('/borangk/create', [
		'as'	=>	'borangk.createPost',
		'uses'	=>	'BorangkController@createPost'
	]);

	Route::get('/borangk/hapus/{id}', [
		'as'	=>	'borangk.hapus',
		'uses'	=>	'BorangkController@hapus'
	]);

	Route::get('borangk/{borangk}', [
		'as'	=>	'borangk.show',
		'uses'	=>	'BorangkController@show'
	]);

	Route::post('borangk/{borangk}',[
		'as'	=>	'borangk.update',
		'uses'	=>	'BorangkController@update'
	]);



	//Aduan
	Route::get('/aduan', [
		'as'	=>	'aduan.index',
		'uses'	=>	'AduanController@index'
	]);

	Route::get('/aduan/create', [
		'as'	=>	'aduan.create',
		'uses'	=>	'AduanController@create'
	]);

	Route::post('/aduan/create', [
		'as'	=>	'aduan.createPost',
		'uses'	=>	'AduanController@createPost'
	]);

	Route::get('/aduan/hapus/{id}', [
		'as'	=>	'aduan.hapus',
		'uses'	=>	'AduanController@hapus'
	]);




	//Borang-H
	Route::get('/borangh', [
		'as'	=>	'borangh.index',
		'uses'	=>	'BoranghController@index'
	]);

	Route::get('/borangh/create', [
		'as'	=>	'borangh.create',
		'uses'	=>	'BoranghController@create'
	]);

	Route::post('/borangh/create', [
		'as'	=>	'borangh.createPost',
		'uses'	=>	'BoranghController@createPost'
	]);

	Route::get('/borangh/hapus/{id}', [
		'as'	=>	'borangh.hapus',
		'uses'	=>	'BoranghController@hapus'
	]);

	Route::get('borangh/{borangh}', [
		'as'	=>	'borangh.show',
		'uses'	=>	'BoranghController@show'
	]);

	Route::post('borangh/{borangh}',[
		'as'	=>	'borangh.update',
		'uses'	=>	'BoranghController@update'
	]);



	//Bank
	Route::get('/bank', [
		'as'	=>	'bank.index',
		'uses'	=>	'BankController@index'
	]);

	Route::get('/bank/create', [
		'as'	=>	'bank.create',
		'uses'	=>	'BankController@create'
	]);

	Route::post('/bank/create', [
		'as'	=>	'bank.createPost',
		'uses'	=>	'BankController@createPost'
	]);

	Route::get('/bank/hapus/{id}', [
		'as'	=>	'bank.hapus',
		'uses'	=>	'BankController@hapus'
	]);

	

	//Status Aduan
	Route::get('/status_aduan', [
		'as'	=>	'status_aduan.index',
		'uses'	=>	'StatusAduanController@index'
	]);

	Route::get('/status_aduan/create', [
		'as'	=>	'status_aduan.create',
		'uses'	=>	'StatusAduanController@create'
	]);

	Route::post('/status_aduan/create', [
		'as'	=>	'status_aduan.createPost',
		'uses'	=>	'StatusAduanController@createPost'
	]);

	Route::get('/status_aduan/hapus/{id}', [
		'as'	=>	'status_aduan.hapus',
		'uses'	=>	'StatusAduanController@hapus'
	]);



	//Status Milik
	Route::get('/status_milik', [
		'as'	=>	'status_milik.index',
		'uses'	=>	'StatusMilikController@index'
	]);

	Route::get('/status_milik/create', [
		'as'	=>	'status_milik.create',
		'uses'	=>	'StatusMilikController@create'
	]);

	Route::post('/status_milik/create', [
		'as'	=>	'status_milik.createPost',
		'uses'	=>	'StatusMilikController@createPost'
	]);

	Route::get('/status_milik/hapus/{id}', [
		'as'	=>	'status_milik.hapus',
		'uses'	=>	'StatusMilikController@hapus'
	]);



	//Ptj
	Route::get('/ptj', [
		'as'	=>	'ptj.index',
		'uses'	=>	'PtjController@index'
	]);

	Route::get('/ptj/create', [
		'as'	=>	'ptj.create',
		'uses'	=>	'PtjController@create'
	]);

	Route::post('/ptj/create', [
		'as'	=>	'ptj.createPost',
		'uses'	=>	'PtjController@createPost'
	]);

	Route::get('/ptj/hapus/{id}', [
		'as'	=>	'ptj.hapus',
		'uses'	=>	'PtjController@hapus'
	]);


	//Staff
	Route::get('/staff', [
		'as'	=>	'staff.index',
		'uses'	=>	'StaffController@index'
	]);

	Route::get('/staff/create', [
		'as'	=>	'staff.create',
		'uses'	=>	'StaffController@create'
	]);

	Route::post('/staff/create', [
		'as'	=>	'staff.createPost',
		'uses'	=>	'StaffController@createPost'
	]);

	Route::get('/staff/hapus/{id}', [
		'as'	=>	'staff.hapus',
		'uses'	=>	'StaffController@hapus'
	]);



	//StatusBicara
	Route::get('/status_bicara', [
		'as'	=>	'status_bicara.index',
		'uses'	=>	'StatusBicaraController@index'
	]);

	Route::get('/status_bicara/create', [
		'as'	=>	'status_bicara.create',
		'uses'	=>	'StatusBicaraController@create'
	]);

	Route::post('/status_bicara/create', [
		'as'	=>	'status_bicara.createPost',
		'uses'	=>	'StatusBicaraController@createPost'
	]);

	Route::get('/status_bicara/hapus/{id}', [
		'as'	=>	'status_bicara.hapus',
		'uses'	=>	'StatusBicaraController@hapus'
	]);




	//KategoriBayaran
	Route::get('/kategori', [
		'as'	=>	'kategori.index',
		'uses'	=>	'KategoriPampasanController@index'
	]);

	Route::get('/kategori/create', [
		'as'	=>	'kategori.create',
		'uses'	=>	'KategoriPampasanController@create'
	]);

	Route::post('/kategori/create', [
		'as'	=>	'kategori.createPost',
		'uses'	=>	'KategoriPampasanController@createPost'
	]);

	Route::get('/kategori/hapus/{id}', [
		'as'	=>	'kategori.hapus',
		'uses'	=>	'KategoriPampasanController@hapus'
	]);

}); // end of auth group