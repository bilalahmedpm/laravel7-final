<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ClientController;

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
    return view('auth.login');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/client/create', 'ClientController@create')->name('client.create');
    Route::post('/client/store', 'ClientController@store')->name('client.store');
    Route::get('/client/index', 'ClientController@index')->name('client.index');
    Route::get('/client/edit/{id}', 'ClientController@edit')->name('client.edit');
    Route::post('/client/update/{id}', 'ClientController@update')->name('client.update');
    Route::get('/client/delete/{id}', 'ClientController@destroy')->name('client.delete');
    });


