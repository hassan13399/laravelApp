<?php

use Illuminate\Support\Facades\Route;
use App\Models\Forms;
use App\Http\Controllers\PagesController;
use App\Models\Stock;

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




Route::get('/home', 'App\Http\Controllers\PagesController@index')->middleware('auth', 'verified');
//Route::post('/home/import', 'App\Http\Controllers\PagesController@import');


Route::post('add', 'App\Http\Controllers\PagesController@add')->name('import');

Route::get('/export-excel', 'App\Http\Controllers\PagesController@exportIntoExcel')->name('export');
Route::get('/generate-excel', 'App\Http\Controllers\PagesController@generateExcel')->name('generate');



