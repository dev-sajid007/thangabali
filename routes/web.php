<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/dashboard',[App\Http\Controllers\AdminController::class, 'index']);

    Route::group(['prefix' => 'user'], function () {
        //user crud
        Route::get('/list','UserController@index')->name('user.list');
        Route::post('/store',[App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}',[App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}',[App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    });
    Route::group(['prefix' => 'menu'], function () {
        //Menu crud
        Route::get('/list','MenuController@index')->name('menu.list');
        Route::post('/store',[App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
        Route::get('/edit/{id}',[App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
        Route::post('/update/{id}',[App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
        Route::get('/delete/{id}',[App\Http\Controllers\MenuController::class, 'delete'])->name('menu.delete');
    });
    Route::group(['prefix' => 'purchase'], function () {
        //user crud
        Route::get('/list','PurchaseController@index')->name('purchase.list');
        Route::get('/add',[App\Http\Controllers\PurchaseController::class, 'add'])->name('purchase.add');
        Route::post('/store',[App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase.store');
        Route::get('/edit/{id}',[App\Http\Controllers\PurchaseController::class, 'edit'])->name('purchase.edit');
        Route::post('/update/{id}',[App\Http\Controllers\PurchaseController::class, 'update'])->name('purchase.update');
        Route::get('/delete/{id}',[App\Http\Controllers\PurchaseController::class, 'delete'])->name('purchase.delete');

        //get price
        Route::get('/get_price/{id}','DefaultController@get_menu_price');

    });
});
