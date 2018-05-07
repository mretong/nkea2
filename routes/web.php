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

	Route::post('/mukim', [
		'as'	=> 'mukim.indexPost',
		'uses'	=> 'MukimController@indexPost'
	]);


}); // end of auth group