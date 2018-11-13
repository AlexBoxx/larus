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
Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);

});

Route::group(['prefix'=>'admin', 'namespace' =>'Admin', 'middleware'=>'auth'], function(){
	Route::get('/', 'DaschboardController@daschboard')->name('admin.index');
	Route::get('/create', 'DaschboardController@create')->name('admin.create');

	Route::resource('/category', 'CategoryController', ['as'=>'admin']);

	Route::get('/article/catArticles/{category}', 'ArticleController@catArticles' , ['as'=>'admin'])->name('admin.catArticles');
	Route::get('/article/public/{publisched}', 'ArticleController@public' , ['as'=>'admin'])->name('admin.article.public');
	Route::resource('/article', 'ArticleController', ['as'=>'admin']);

	Route::resource('/country', 'CountryController', ['as'=>'admin']);

	Route::get('/region/countryRegion/{country_id}', 'RegionController@countryRegion' , ['as'=>'admin'])->name('admin.countryRegion');
	Route::get('/region/regionCreate/{country?}', 'RegionController@regionCreate' , ['as'=>'admin'])->name('admin.region.regionCreate');
	Route::resource('/region', 'RegionController', ['as'=>'admin']);

	Route::get('/settlement/regionSettlement/{region}', 'SettlementController@regionSettlement' , ['as'=>'admin'])->name('admin.regionSettlement');
	Route::get('/settlement/settlementCreate/{region}', 'SettlementController@settlementCreate' , ['as'=>'admin'])->name('admin.settlementCreate');
	Route::resource('/settlement', 'SettlementController', ['as'=>'admin']);


	Route::group(['prefix'=>'user_managment', 'namespace'=>'UserManagment'], function(){
			Route::resource('/user', 'UserController', ['as'=>'admin.user_managment']);
			Route::resource('/role', 'RoleController', ['as'=>'admin.user_managment']);
	});

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
