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
    return redirect('index.html');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/admin', 'ProductController@index')->name('admin');
Route::resource('txng', 'TXNGController');
Route::resource('certificate', 'CertificateController');

Route::get('product-detail/{id}', 'ProductController@detailProduct')->name('detailProduct');
Route::resource('product', 'ProductController');
Route::resource('image', 'ImageController');
Route::resource('company', 'CompanyController');
Route::resource('plantingarea', 'PlantingAreaController');
Route::get('delete/image/{id}', 'ImageController@deleteImage');

Route::get('list/product', 'ProductController@index')->name('list.product');
Route::get('list/company', 'CompanyController@index')->name('list.company');
Route::get('list/plantingarea', 'PlantingAreaController@index')->name('list.plantingarea');

Route::get('/searchproduct', 'ProductController@search')->name('searchproduct');
Route::get('/searchcompany', 'CompanyController@search')->name('searchcompany');
Route::get('/searchplantingarea', 'PlantingAreaController@search')->name('searchplantingarea');

Route::get('/changepassword', 'HomeController@changepasswordForm')->name('changepasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/search/certificate', 'CertificateController@search')->name('searchCertificate');
// URL::forceScheme('https');