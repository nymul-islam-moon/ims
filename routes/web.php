<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDepertmentController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductTitleController;

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
    return view('welcome');
});


Route::prefix('/dashboard')->group(function () {

    // Route::controller(IncomeController::class)->prefix('/')->group( function () {
    //     Route::get('/', 'index')->name('income.dashboard.index');
    // });

    Route::prefix('/product')->group(function () {

        Route::controller(ProductDepertmentController::class)->prefix('/depertment')->group(function () {
            Route::get('/', 'index')->name('product.depertment.index');
            Route::post('/', 'store')->name('product.depertment.store');
            Route::get('/{productDepertment}/edit', 'edit')->name('product.depertment.edit');
            Route::put('/{productDepertment}/update', 'update')->name('product.depertment.update');
            Route::delete('/{productDepertment}/destroy', 'destroy')->name('product.depertment.destroy');
        });

        Route::controller(ProductController::class)->prefix('/')->group(function () {
            Route::get('/', 'index')->name('product.index');
            Route::post('/', 'store')->name('product.store');
            Route::get('/{product}/edit', 'edit')->name('product.edit');
            Route::put('/{product}/update', 'update')->name('product.update');
            Route::delete('/{product}/destroy', 'destroy')->name('product.destroy');
        });

        Route::controller(ProductCategoryController::class)->prefix('/category')->group(function () {
            Route::get('/', 'index')->name('product.category.index');
            Route::post('/', 'store')->name('product.category.store');
            Route::get('/{productCategory}/edit', 'edit')->name('product.category.edit');
            Route::put('/{productCategory}/update', 'update')->name('product.category.update');
            Route::delete('/{productCategory}/destroy', 'destroy')->name('product.category.destroy');
        });


        Route::controller(ProductSubCategoryController::class)->prefix('/sub-category')->group(function () {
            Route::get('/', 'index')->name('product.subcategory.index');
            Route::post('/', 'store')->name('product.subcategory.store');
            Route::get('/{productSubCategory}/edit', 'edit')->name('product.subcategory.edit');
            Route::put('/{productSubCategory}/update', 'update')->name('product.subcategory.update');
            Route::delete('/{productSubCategory}/destroy', 'destroy')->name('product.subcategory.destroy');
        });

        Route::controller(ProductTitleController::class)->prefix('/title')->group(function () {
            Route::get('/', 'index')->name('product.title.index');
            Route::post('/', 'store')->name('product.title.store');
            Route::get('/{productTitle}/edit', 'edit')->name('product.title.edit');
            Route::put('/{productTitle}/update', 'update')->name('product.title.update');
            Route::delete('/{productTitle}/destroy', 'destroy')->name('product.title.destroy');
        });



    });
    // Route::controller(CashController::class)->prefix('/cash')->group(function () {
    //     Route::get('/', 'index')->name('income.cash.index');
    //     Route::post('/', 'store')->name('income.cash.store');
    //     Route::get('/{cash}/edit', 'edit')->name('income.cash.edit');
    //     Route::put('/{cash}/update', 'update')->name('income.cash.update');
    //     Route::delete('/{cash}/destroy', 'destroy')->name('income.cash.destroy');
    // });


    // Route::controller(IncomeMobileBankController::class)->prefix('/mobilebank')->group(function () {
    //     Route::get('/', 'index')->name('income.mobilebank.index');
    //     Route::post('/', 'store')->name('income.mobilebank.store');
    //     Route::get('/{incomeMobileBank}/edit', 'edit')->name('income.mobilebank.edit');
    //     Route::put('/{incomeMobileBank}/update', 'update')->name('income.mobilebank.update');
    //     Route::delete('/{incomeMobileBank}/destroy', 'destroy')->name('income.mobilebank.destroy');
    // });

});
