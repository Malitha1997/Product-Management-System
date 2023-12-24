<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FreeIssueController;
use App\Http\Controllers\PlacingOrderController;

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
Route::get('/',[ProductController::class,'main'])->name('main');

Route::resource('products',ProductController::class);

Route::resource('customers',CustomerController::class);

Route::resource('freeIssues',FreeIssueController::class);

Route::resource('placingOrders',PlacingOrderController::class);