<?php

use App\Http\Controllers\CashInController;
use App\Http\Controllers\CounterpartyController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PaymentInController;
use App\Http\Controllers\SalesReturnController;
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
    return view('add-to-ms');
});

Route::get('/add-clients-to-ms',[CounterpartyController::class, 'addToMs'])->name('cliToMs');
Route::get('/add-products-to-ms',[GoodsController::class, 'addToMs'])->name('proToMs');
Route::get('/add-service-to-ms',[ServiceController::class, 'addToMs'])->name('srvToMs');
Route::get('/add-warehouse-to-ms',[WarehouseController::class, 'addToMs'])->name('wrhToMs');
Route::get('/add-group-to-ms',[GroupController::class, 'addToMs'])->name('grpToMs');

Route::get('/add-order-to-ms',[CustomerOrderController::class, 'addToMs'])->name('ordToMs');
Route::get('/add-demand-to-ms',[DemandController::class, 'addToMs'])->name('dmdToMs');
Route::get('/add-sales-return-to-ms',[SalesReturnController::class, 'addToMs'])->name('slsRtToMs');
Route::get('/add-payment-in-to-ms',[PaymentInController::class, 'addToMs'])->name('payInToMs');
Route::get('/add-cash-in-to-ms',[CashInController::class, 'addToMs'])->name('cshInToMs');
