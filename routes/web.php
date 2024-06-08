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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('', 'dashboard.main')->name('dashboard');

Route::resource('/vouchers',App\Http\Controllers\VoucherController::class);
Route::resource('/flash-sales',App\Http\Controllers\FlashSaleController::class);
Route::get('/admin/orders',[App\Http\Controllers\OrderController::class,'index']);
Route::match(['POST','GET'],'/orders',[App\Http\Controllers\OrderController::class,'create']);
Route::get('/detail/{id}/orders',[App\Http\Controllers\OrderController::class,'detail']);
