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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'user'], function () {
    Route::get('/add_product', 'ProductsController@add_product');
    Route::get('/view_products ', 'ProductsController@view_products');
    Route::post('/submit_product ', 'ProductsController@submit_product');
    Route::post('/update_product ', 'ProductsController@update_product');
    Route::get('/delete_product/{id}', 'ProductsController@delete_product');
    Route::get('/edit_product/{id}', 'ProductsController@edit_product')->name('edit_product');

    Route::get('/publish_ad', 'AdsController@publish_ad');
    Route::get('/view_ads', 'AdsController@view_ads');
    Route::post('/submit_ad', 'AdsController@submit_ad');
    Route::post('/update_ad', 'AdsController@update_ad');
    Route::get('/delete_ad/{id}', 'AdsController@delete_ad');
    Route::get('/edit_ad/{id}', 'AdsController@edit_ad')->name('edit_ad');

    Route::get('/add_car', 'CarsController@add_car');
    Route::get('/view_cars', 'CarsController@view_cars');
    Route::post('/submit_car', 'CarsController@submit_car');
    Route::post('/update_car', 'CarsController@update_car');
    Route::get('/delete_car/{id}', 'CarsController@delete_car');
    Route::get('/edit_car/{id}', 'CarsController@edit_product')->name('edit_car');




});
