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
	Route::get('/negeri', [
		'as'	=> 'negeri.index',
		'uses'	=> 'NegeriController@index'
	]);

	Route::get('/negeri/create', [
		'as'	=> 'negeri.create',
		'uses'	=> 'NegeriController@create' 
	]);

	Route::post('/negeri/create', [
		'as'	=> 'negeri.createPost',
		'uses'	=> 'NegeriController@createPost'
	]);

	Route::get('/negeri/hapus/{id}', [
		'as'	=> 'negeri.hapus',
		'uses'	=> 'NegeriController@hapus'
	]);



	//	DAERAH
	Route::get('/daerah', [
		'as'	=> 'daerah.index', 
		'uses'	=> 'DaerahController@index'
	]); // listing of daerah

	Route::get('/daerah/create', [
		'as'	=> 'daerah.create',
		'uses'	=> 'DaerahController@create'
	]);

	Route::post('/daerah/create', [
		'as'	=> 'daerah.createPost',
		'uses'	=> 'DaerahController@createPost'
	]);

	Route::get('/daerah/hapus/{id}', [
		'as'	=> 'daerah.hapus',
		'uses'	=> 'DaerahController@hapus'
	]);


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
		'as'	=>	'wilayah.index',
		'uses'	=>	'WilayahController@index'
	]);

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


}); // end of auth group