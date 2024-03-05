<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
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
Route::get('shop', [ShopController::class, 'shop'])->name('shop');
Route::get('shop/producto', [ShopController::class, 'producto'])->name('shop.producto');
Route::get('shop/chart', [ShopController::class, 'chart'])->name('chart');
Route::post('shop/{code}', [ShopController::class, 'add'])->name('add');
Route::post('shop/rest/{code}', [ShopController::class, 'rest'])->name('rest');


Route::resource('/login', LoginController::class);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/shop');
});

Route::get('searchbytalla', [ShopController::class, 'searchbytalla']);
Route::get('/search/producto', [ShopController::class, 'search']);
Route::get('/admin/sort/{column}/{order}', [AdminController::class, 'sort'])->name('sort');


Route::resource('admin', AdminController::class);

Route::delete('shop/{code}', [ShopController::class, 'destroy'])->name('shop.destroy');