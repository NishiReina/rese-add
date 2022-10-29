<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReserveController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/',[ShopController::class, 'index'])->name('index');
Route::post('/search',[ShopController::class, 'search'])->name('search');
Route::post('/like/store',[LikeController::class, 'store'])->name('like.store');
Route::post('/like/delete',[LikeController::class, 'delete'])->name('like.delete');
Route::get('/mypage',[UserController::class, 'index'])->name('mypage');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');
Route::post('/reserve', [ReserveController::class, 'store'])->name('reserve');
Route::post('/reserve/update', [ReserveController::class, 'update'])->name('reserve.update');
Route::post('/reserve/delete', [ReserveController::class, 'delete'])->name('reserve.delete');

require __DIR__.'/auth.php';
