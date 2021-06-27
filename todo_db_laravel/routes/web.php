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

Route::get('/', function () {
    return view('welcome');
});


  Route::get('/holiday', 'App\Http\Controllers\CalendarController@getHoliday');
  Route::post('/holiday', 'App\Http\Controllers\CalendarController@postHoliday');

  Route::get('/', 'App\Http\Controllers\CalendarController@index');

  //  Route::get('/plan', 'App\Http\Controllers\HelloController@index');
// Route::post('/plan', 'App\Http\Controllers\HelloController@index');

