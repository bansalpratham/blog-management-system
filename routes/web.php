<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index']);

Route::get('/blog/{slug}', [FrontendController::class, 'show']);

Route::get('/filter-blogs', [FrontendController::class, 'filter']);

Route::get('/category/{category}', [FrontendController::class, 'category']);


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/admin/login', [AuthController::class, 'login']);

Route::post('/admin/logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| ADMIN PROTECTED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('blogs', BlogController::class);

});