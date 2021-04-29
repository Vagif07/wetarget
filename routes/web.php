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

Route::get('/', 'MainController@index')->name('home');
Route::get('/demo', 'MainController@demo')->name('demo');

Route::post('/getKeyword', 'KeywordController@getKeywords')->name('getKeywords');

Route::post('/save-user-tags', 'APIController@saveTags')->name('saveUserTags');
Route::get('/get-preferred-ad', 'APIController@getAd')->name('getAd');
Route::get('/reset-keywords', 'APIController@reset')->name('reset');

Auth::routes();
Route::resource('ads', 'AdController');

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/transactions', 'HomeController@transactions')->name('transactions');
Route::get('/balance', 'HomeController@balance')->name('transactions.balance');
Route::post('/balance/top_up', 'HomeController@balanceTopUp')->name('topUp');

