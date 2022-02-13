<?php

use App\Http\Controllers\JsonAjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use Illuminate\Contracts\Cache\Store;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/record', RecordController::class);
// Route::get('record', RecordController::class)
// Route::post('record/store', 'RecordController@store');

Route::get('/jsonajax', [JsonAjaxController::class, 'index']);


