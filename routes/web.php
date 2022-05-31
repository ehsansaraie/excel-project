<?php

use App\Http\Controllers\Symbol\SymbolController;
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

Route::group(['namespace' => 'Symbol', 'prefix' => 'symbols'], function () {
    Route::get('/index', [SymbolController::class, 'index']);
    Route::post('/store', [SymbolController::class, 'store'])->name('symbol.store');
});
