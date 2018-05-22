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

		Route::get('/show/{id}', [
			'as'	=>	'daerah.show',
			'uses'	=>	'DaerahController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'daerah.update',
			'uses'	=>	'DaerahController@update'
		]);

	});
	


	//Mukim
	Route::group(['prefix' => 'mukim'], function() {

		Route::get('/', [
			'as'	=> 'mukim.index',
			'uses'	=> 'MukimController@index'
		]);

		Route::get('/create', [
			'as'	=> 'mukim.create',
			'uses'	=> 'MukimController@create'
		]);

		Route::post('/create', [
			'as'	=> 'mukim.createPost',
			'uses'	=> 'MukimController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=> 'mukim.hapus',
			'uses'	=> 'MukimController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'mukim.show',
			'uses'	=>	'MukimController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'mukim.update',
			'uses'	=>	'MukimController@update'
		]);
	});




	//Wilayah
	Route::group(['prefix' => 'wilayah'], function() {
		Route::get('/', [
			'as'	=> 'wilayah.index', 
			'uses'	=> 'WilayahController@index'
		]); // listing of daerah

		Route::get('/create', [
			'as'	=> 'wilayah.create',
			'uses'	=> 'WilayahController@create'
		]);

		Route::post('/create', [
			'as'	=> 'wilayah.createPost',
			'uses'	=> 'WilayahController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=> 'wilayah.hapus',
			'uses'	=> 'WilayahController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'wilayah.show',
			'uses'	=>	'WilayahController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'wilayah.update',
			'uses'	=>	'WilayahController@update'
		]);
	});


	//Fasa
	Route::group(['prefix' => 'fasa'], function() {
		Route::get('/', [
			'as'	=>	'fasa.index',
			'uses'	=>	'FasaController@index'
		]);

		Route::get('/create', [
			'as'	=>	'fasa.create',
			'uses'	=>	'FasaController@create'
		]);

		Route::post('/create', [
			'as'	=>	'fasa.createPost',
			'uses'	=>	'FasaController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'fasa.hapus',
			'uses'	=>	'FasaController@hapus'
		]);
		Route::get('/show/{id}', [
			'as'	=>	'fasa.show',
			'uses'	=>	'FasaController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'fasa.update',
			'uses'	=>	'FasaController@update'
		]);
	});


	//Lokaliti
	Route::group(['prefix' => 'lokaliti'], function() {

		Route::get('/', [
			'as'	=>	'lokaliti.index',
			'uses'	=>	'LokalitiController@index'
		]);

		Route::get('/create', [
			'as'	=>	'lokaliti.create',
			'uses'	=>	'LokalitiController@create'
		]);

		Route::post('/create', [
			'as'	=>	'lokaliti.createPost',
			'uses'	=>	'LokalitiController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'lokaliti.hapus',
			'uses'	=>	'LokalitiController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'lokaliti.show',
			'uses'	=>	'LokalitiController@show'
		]);
		
		Route::post('/show/{id}',[
			'as'	=>	'lokaliti.update',
			'uses'	=>	'LokalitiController@update'
		]);
	});



	//Pakej
	Route::group(['prefix' => 'pakej'], function() {
		Route::get('/', [
			'as'	=>	'pakej.index',
			'uses'	=>	'PakejController@index'
		]);

		Route::get('/create', [
			'as'	=>	'pakej.create',
			'uses'	=>	'PakejController@create'
		]);

		Route::post('/create', [
			'as'	=>	'pakej.createPost',
			'uses'	=>	'PakejController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'pakej.hapus',
			'uses'	=>	'PakejController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'pakej.show',
			'uses'	=>	'PakejController@show'
		]);
		
		Route::post('/show/{id}',[
			'as'	=>	'pakej.update',
			'uses'	=>	'PakejController@update'
		]);
	});



	//Blok
	Route::group(['prefix' => 'blok'], function() {

		Route::get('/', [
			'as'	=>	'blok.index',
			'uses'	=>	'BlokController@index'
		]);

		Route::get('/create', [
			'as'	=>	'blok.create',
			'uses'	=>	'BlokController@create'
		]);

		Route::post('/create', [
			'as'	=>	'blok.createPost',
			'uses'	=>	'BlokController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'blok.hapus',
			'uses'	=>	'BlokController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'blok.show',
			'uses'	=>	'BlokController@show'
		]);
		
		Route::post('/show/{id}',[
			'as'	=>	'blok.update',
			'uses'	=>	'BlokController@update'
		]);
	});


	//Lot
	Route::group(['prefix' => 'lot'], function() {

		Route::get('/', [
			'as'	=>	'lot.index',
			'uses'	=>	'LotController@index'
		]);

		Route::get('/create', [
			'as'	=>	'lot.create',
			'uses'	=>	'LotController@create'
		]);

		Route::post('/create', [
			'as'	=>	'lot.createPost',
			'uses'	=>	'LotController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'lot.hapus',
			'uses'	=>	'LotController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'lot.show',
			'uses'	=>	'LotController@show'
		]);
		
		Route::post('/show/{id}',[
			'as'	=>	'lot.update',
			'uses'	=>	'LotController@update'
		]);
	});


	//Warta
	Route::group(['prefix' => 'warta'], function() {
		
		Route::get('/', [
			'as'	=>	'warta.index',
			'uses'	=>	'WartaController@index'
		]);

		Route::get('/create', [
			'as'	=>	'warta.create',
			'uses'	=>	'WartaController@create'
		]);

		Route::post('/create', [
			'as'	=>	'warta.createPost',
			'uses'	=>	'WartaController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'warta.hapus',
			'uses'	=>	'WartaController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'warta.show',
			'uses'	=>	'WartaController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'warta.update',
			'uses'	=>	'WartaController@update'
		]);
	});




	//Perbicaraan
	Route::group(['prefix' => 'bicara'], function() {

		Route::get('/', [
			'as'	=>	'bicara.index',
			'uses'	=>	'PerbicaraanController@index'
		]);

		Route::get('/create', [
			'as'	=>	'bicara.create',
			'uses'	=>	'PerbicaraanController@create'
		]);

		Route::post('/create', [
			'as'	=>	'bicara.createPost',
			'uses'	=>	'PerbicaraanController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'bicara.hapus',
			'uses'	=>	'PerbicaraanController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'bicara.show',
			'uses'	=>	'PerbicaraanController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'bicara.update',
			'uses'	=>	'PerbicaraanController@update'
		]);
	});



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
	Route::group(['prefix' => 'bank'], function() {

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

		Route::get('/show/{id}', [
			'as'	=>	'bank.show',
			'uses'	=>	'BankController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'bank.update',
			'uses'	=>	'BankController@update'
		]);
	});

	

	//Status Aduan
	Route::group(['prefix' => 'status_aduan'], function() {

		Route::get('/', [
			'as'	=>	'status_aduan.index',
			'uses'	=>	'StatusAduanController@index'
		]);

		Route::get('/create', [
			'as'	=>	'status_aduan.create',
			'uses'	=>	'StatusAduanController@create'
		]);

		Route::post('/create', [
			'as'	=>	'status_aduan.createPost',
			'uses'	=>	'StatusAduanController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'status_aduan.hapus',
			'uses'	=>	'StatusAduanController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'status_aduan.show',
			'uses'	=>	'StatusAduanController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'status_aduan.update',
			'uses'	=>	'StatusAduanController@update'
		]);
	});



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
	Route::group(['prefix' => 'ptj'], function() {
		
		Route::get('/', [
			'as'	=>	'ptj.index',
			'uses'	=>	'PtjController@index'
		]);

		Route::get('/create', [
			'as'	=>	'ptj.create',
			'uses'	=>	'PtjController@create'
		]);

		Route::post('/create', [
			'as'	=>	'ptj.createPost',
			'uses'	=>	'PtjController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'ptj.hapus',
			'uses'	=>	'PtjController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'ptj.show',
			'uses'	=>	'PtjController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'ptj.update',
			'uses'	=>	'PtjController@update'
		]);
	});


	//Staff
	Route::group(['prefix' => 'staff'], function() {

		Route::get('/', [
			'as'	=>	'staff.index',
			'uses'	=>	'StaffController@index'
		]);

		Route::get('/create', [
			'as'	=>	'staff.create',
			'uses'	=>	'StaffController@create'
		]);

		Route::post('/create', [
			'as'	=>	'staff.createPost',
			'uses'	=>	'StaffController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'staff.hapus',
			'uses'	=>	'StaffController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'staff.show',
			'uses'	=>	'StaffController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'staff.update',
			'uses'	=>	'StaffController@update'
		]);
	});



	//StatusBicara
	Route::group(['prefix' => 'status_bicara'], function() {

		Route::get('/', [
			'as'	=>	'status_bicara.index',
			'uses'	=>	'StatusBicaraController@index'
		]);

		Route::get('/create', [
			'as'	=>	'status_bicara.create',
			'uses'	=>	'StatusBicaraController@create'
		]);

		Route::post('/create', [
			'as'	=>	'status_bicara.createPost',
			'uses'	=>	'StatusBicaraController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'status_bicara.hapus',
			'uses'	=>	'StatusBicaraController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'status_bicara.show',
			'uses'	=>	'StatusBicaraController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'status_bicara.update',
			'uses'	=>	'StatusBicaraController@update'
		]);
	});




	//KategoriBayaran
	Route::group(['prefix' => 'kategori'], function() {

		Route::get('/', [
			'as'	=>	'kategori.index',
			'uses'	=>	'KategoriPampasanController@index'
		]);

		Route::get('/create', [
			'as'	=>	'kategori.create',
			'uses'	=>	'KategoriPampasanController@create'
		]);

		Route::post('/create', [
			'as'	=>	'kategori.createPost',
			'uses'	=>	'KategoriPampasanController@createPost'
		]);

		Route::get('/hapus/{id}', [
			'as'	=>	'kategori.hapus',
			'uses'	=>	'KategoriPampasanController@hapus'
		]);

		Route::get('/show/{id}', [
			'as'	=>	'kategori.show',
			'uses'	=>	'KategoriPampasanController@show'
		]);

		Route::post('/show/{id}',[
			'as'	=>	'kategori.update',
			'uses'	=>	'KategoriPampasanController@update'
		]);
	});

}); // end of auth group