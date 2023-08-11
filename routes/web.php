<?php

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
    return "Welcome to API";
});

Route::get('api/sales', 'SalesController@sales');
Route::get('api/stocks', 'StocksController@stocks');
Route::get('api/incomes', 'IncomesController@incomes');
Route::get('api/orders', 'OrdersController@orders');
