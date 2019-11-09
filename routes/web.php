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

Route::get('/admin', 'HomeController@index')->name('admin');
Route::resource('txng', 'TXNGController');
Route::resource('certificate', 'CertificateController');
Route::get('/search', 'TXNGController@search')->name('search');
Route::get('/product/{id}', 'ProductController@detailProduct')->name('detailProduct');
Route::get('/search/certificate', 'CertificateController@search')->name('searchCertificate');
// URL::forceScheme('https');