<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ProductController::class, 'index']);
Route::get('/product/show/{id}', [ProductController::class, 'show']);

Route::middleware(['auth'])->group(function(){

	Route::controller(AdminUserController::class)->prefix('admin/dashboard/users')->group(function(){

		Route::get('/', 'users');
		Route::delete('/delete/{id}', 'destroy');
		Route::get('/edit/{id}', 'edit');
		Route::put('/update/{id}', 'update');
	});

    Route::controller(UserController::class)->prefix('user')->group(function(){

        Route::get('/profile', 'edit');
        Route::put('/profile/update', 'update');
        Route::delete('/profile/delete/{id}', 'destroy');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('/user/cart', 'cart');
        Route::post('/product/save/{id}', 'add_product_to_cart');
        Route::delete('/user/cart/remove/{id}', 'remove_product_from_cart');

        Route::prefix('admin')->group(function(){

            Route::get('/create', 'create');
            Route::post('/store', 'store');

            Route::prefix('dashboard/products')->group(function(){
                Route::get('/', 'products');
                Route::delete('/delete/{id}', 'destroy');
                Route::get('/edit/{id}', 'edit');
                Route::put('/update/{id}', 'update');
            });
        });
    });
});

