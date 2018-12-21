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



Route::get('/users/index','UserController@index');
Route::get('/users/resources','UserController@resources');
Route::get('/users/maps','UserController@maps');



Route::get('/users/transactions/index','TransactionController@index');
Route::post('/users/transactions/index','TransactionController@changeTransactionStatus')->name('changeTransactionStatus');
Route::get('/users/transactions/newTransaction','TransactionController@enterNewTransaction');
Route::post('/users/transactions/newTransaction', 'TransactionController@newTrans')->name('newTrans');


Route::get('/admin/35/resources','AdminController@resources');
Route::post('/admin/35/resources','AdminController@changeResourcesStatus')->name('changeResourcesStatus');

Route::get('/admin/35/maps','AdminController@maps');
Route::post('/admin/35/maps','AdminController@changeMapStatus')->name('changeMapStatus');