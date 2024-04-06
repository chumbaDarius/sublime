<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\middleware\IsAdmin;


use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoginController;






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
Route::view('welcome','welcome');
Route::view('home','home');



Route::view('dashboard','user.dashboard');
Route::view('store','users.index');


Route::view('insert','products.index');
Route::view('make','orders.index');
Route::view('make','orders.index');
Route::view('reports','reports.index');
Route::view('users','users.index');
Route::view('products','products.index');

 







Auth::routes();

Route::post('/make', [OrderController::class, 'create']);
/**Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('is_admin');
Route::get('/orders', [OrderController::class, 'index'])->name('orders')->middleware('is_admin');
**/
Route::middleware(['auth','is_admin'])->group(function(){
Route::get('/users', [UserController::class, 'index'])->middleware('is_admin');
;

Route::get('/orders', [OrderController::class, 'index'])->middleware('is_admin');
Route::get('/reports', [ReportController::class, 'index'])->middleware('is_admin');
Route::get('/products', [ProductController::class, 'index'])->middleware('is_admin');
Route::get('/search', [UserController::class, 'search'])->middleware('is_admin');
Route::delete('/selected', [UserController::class, 'select'])->middleware('is_admin');
Route::get('/search_product', [ProductController::class, 'search'])->middleware('is_admin');
Route::delete('/selected_product', [ProductController::class, 'select'])->middleware('is_admin');
});
Route::post('/store_data', [UserController::class, 'store']);
Route::get('/edit_data/{id}', [UserController::class, 'edit_data']);
Route::get('/delete_data/{id}', [UserController::class, 'delete_data']);
Route::post('/update_data/{id}', [UserController::class, 'update_data']);
Route::post('/insert', [ProductController::class, 'insert']);
     
Route::post('/display', [ProductController::class, 'store']);

Route::get('/edit_Data/{id}', [ProductController::class, 'edit_Data']);
Route::get('/delete_Data/{id}', [ProductController::class, 'delete_Data']);
Route::post('/update_Data/{id}', [ProductController::class, 'update_Data']);











