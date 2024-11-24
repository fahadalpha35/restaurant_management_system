<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;


Auth::routes();

Route::middleware(['auth'])->group(function () { 
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::resource('stores', StoresController::class);
    // Route::resource('stores', 'StoresController');
    // Route::get('stores/fetchStores', [StoresController::class, 'fetchStores'])->name('stores.fetchStores');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    // Route for fetching subcategories based on category
    Route::get('/get-subcategories/{categoryId}', [ProductsController::class, 'getSubcategories']);
    Route::resource('company', CompanyController::class);
    Route::resource('groups', GroupsController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('reports', ReportsController::class);
    Route::resource('tables', TablesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('/home', HomeController::class);
});


