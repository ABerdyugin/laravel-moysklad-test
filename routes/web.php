<?php

use App\Http\Controllers\CounterpartyController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-clients-to-ms',[CounterpartyController::class, 'addToMs']);
Route::get('/add-products-to-ms',[GoodsController::class, 'addToMs']);
Route::get('/add-service-to-ms',[ServiceController::class, 'addToMs']);
Route::get('/add-warehouse-to-ms',[WarehouseController::class, 'addToMs']);
Route::get('/add-group-to-ms',[GroupController::class, 'addToMs']);
