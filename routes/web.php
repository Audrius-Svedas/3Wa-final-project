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

Route::get('/', 'ProductController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/editUserProfile', 'UserProfileController@edit')->name('editProfile');
Route::post('/updateUserProfile/{id}', 'UserProfileController@update')->name('updateProfile');

Route::get('/index', 'ProductController@index')->name('index');
Route::get('/productByCategory/{category}', 'ProductController@showByCategory')->name('productByCategory');
Route::get('/showProduct/{id}', 'ProductController@show')->name('showProduct');
Route::get('/createProduct', 'ProductController@create')->name('createProduct');
Route::post('/storeProduct', 'ProductController@store')->name('storeProduct');
Route::get('/editProduct/{id}', 'ProductController@edit')->name('editProduct');
Route::post('/updateProduct/{id}', 'ProductController@update')->name('updateProduct');
Route::get('/deleteProduct/{id}', 'ProductController@destroy')->name('deleteProduct');
Route::get('/contacts', 'ContactsController@showContacts')->name('contacts');

Route::post('/addToCart', 'CartController@store')->name('addToCart');
Route::get('/destroyCartItem/{id}', 'CartController@destroy')->name('deleteCartItem');
Route::get('/cart', 'CartController@show')->name('showCart');

Route::post('/order', 'OrderController@store')->name('order');
Route::get('/orders_show', 'OrderController@show')->name('orders_show');
Route::get('/orderView', 'OrderController@index')->name('orderView');
