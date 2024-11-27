<?php

use Illuminate\Http\Request;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('register', [AuthController::class, 'showRegisterForm']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth:sanctum')->group(function () { 
    // Protected routes
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
    //profile details update
    Route::get('edit_profile/{id}', [ProfileController::class, 'edit'])->name('edit_profile');

});


