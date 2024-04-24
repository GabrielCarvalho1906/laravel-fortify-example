<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReprocessController;


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
Route::get('/reprocessamento', [ReprocessController::class, 'showForm']);
Route::post('/reprocessamento', [ReprocessController::class, 'processCommand']);

Route::view('/home', 'home')->middleware(['auth', 'verified']);
Route::view('/profile/edit', 'profile.edit')->middleware('auth');
Route::view('/profile/password', 'profile.password')->middleware('auth');
Route::get('/zabbix/card', 'App\Http\Controllers\ZabbixController@showCard')->name('zabbix.card');
Route::get('/honeybadger/card', 'App\Http\Controllers\HoneybadgerController@index')->name('honeybadger.card');

