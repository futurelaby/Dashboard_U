<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/update', 'App\Http\Controllers\HomeController@update');
Route::resource('AppUsers','App\Http\Controllers\HomeController');
Route::delete('/deleteAll', 'App\Http\Controllers\HomeController@deleteAll');
Route::get('importExportView', 'App\Http\Controllers\HomeController@importExportView');
Route::get('export', 'App\Http\Controllers\HomeController@export')->name('export');
Route::post('import', 'App\Http\Controllers\HomeController@import')->name('import');
// Route::resource('products', 'ProductsController', [
//     'only' => ['index', 'create', 'store']
// ]);
// Route::get('AppUsers/{id}/edit/','App\Http\Controllers\HomeController@edit');

Route::get('/test', function () {
    return view('test');
});
