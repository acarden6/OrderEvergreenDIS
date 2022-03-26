<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
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

#Route::get('/', [OrderController::class, 'index'])->name("home.index");
Route::get('/order/create', [OrderController::class, 'create'])->name("order.create");
Route::post('/order/save', [OrderController::class, 'save'])->name("order.save");
