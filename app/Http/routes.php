<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//protect from csrf
Route::when('*', 'csrf', array('post', 'put', 'delete'));

Route::filter('csrf', function() {
	$token = Request::ajax() ? Request::header('X-CSRF-Token') : Input::get('_token');
	if (Session::token() != $token){
		throw new Illuminate\Session\TokenMismatchException;
	}
});
/*protect from csrf*/

// Route::get('/', function () {
// 	return view('user.homeuser');
// });

Route::get('/', ['uses'=>'homeCtrl@homeuser', 'as'=>'homeuser']);
// utk login
//auth
Route::get('login', ['uses'=>'AuthCtrl@getLogin', 'as'=>'login']);
Route::post('login', 'AuthCtrl@postLogin');
Route::get('logout', ['uses'=>'AuthCtrl@getLogout', 'as'=>'logout']);
// utk register
Route::get('register', ['uses'=>'AuthCtrl@getRegister', 'as'=>'register']);
Route::post('register', ['uses'=>'AuthCtrl@postRegister', 'as'=>'register']);
// tampil produk
Route::get('produk/{id}', ['uses'=>'produkCtrl@show', 'as'=>'produk']);
// tampil produk berdasarkan kategori
Route::get('kategori/{id}', ['uses'=>'produkCtrl@kategori', 'as'=>'kategori']);
// syarat ketentuan
Route::get('syarat', ['uses'=>'homeCtrl@syarat', 'as'=>'syarat']);
// contact us
Route::get('contact', ['uses'=>'homeCtrl@contact', 'as'=>'contact']);

// gruop
Route::group(['middleware' => 'auth'], function() {
	/*=========== url ini utk admin ==============*/
	Route::group(['prefix' => 'superuser'], function() {
		Route::get('/', ['uses'=>'homeCtrl@index', 'as'=>'home']);
	    // utk produk
		Route::resource('produk', 'produkCtrl');
	    // utk datapemesanan
		Route::resource('pemesanan', 'pemesananCtrl');
	    // utk customer
		Route::resource('customer', 'customerCtrl');
		// konfirmasi pesanan
		Route::get('konfirmasi/{id}', ['uses'=>'pemesananCtrl@konfirmasi', 'as'=>'konfirmasi']);
		// tampil halaman cetak
		Route::get('getcetak', ['uses'=>'pemesananCtrl@getCetak', 'as'=>'getcetak']); 
		// tampil halaman post cetak
		Route::get('prosescetak', ['uses'=>'pemesananCtrl@prosesCetak', 'as'=>'prosescetak']); 
	});


	/*======ini utk user =======*/
	// profil customer
	Route::get('profil/{id}', ['uses'=>'AuthCtrl@show', 'as'=>'profil']);
	// tampil produk berdasarkan kategori
	Route::get('order', ['uses'=>'pemesananCtrl@getOrder', 'as'=>'order']);
	Route::post('order', ['uses'=>'pemesananCtrl@postOrder', 'as'=>'order']);
	// pesan berdasarkan id produk
	// Route::get('order/{id}', ['uses'=>'pemesananCtrl@getOrderById', 'as'=>'orderbyid']);
	// ajax kode produk
	Route::get('ajax/getkodebg', ['uses'=>'pemesananCtrl@getKodeBg', 'as'=>'getkodebg']);
	// belanjaan ku
	Route::get('history_belanja', ['uses'=>'pemesananCtrl@history', 'as'=>'history_belanja']);
	// belanjaan ku
	Route::get('history_belanja', ['uses'=>'pemesananCtrl@history', 'as'=>'history_belanja']);
});
// Route::get('/superuser', function () {
// 	return view('layout.layoutadmin.contoh');
// });
