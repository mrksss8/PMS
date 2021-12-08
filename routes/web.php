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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['prefix' => 'dashboard' ,'middleware' => 'auth'], function(){
  Route::get('/index', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::post('/Store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
});


Route::group(['prefix' => 'role', 'middleware' => 'auth'], function(){
  Route::get('/index', [App\Http\Controllers\RolesController::class, 'index'])->name('role.index');
  Route::post('/Store', [App\Http\Controllers\RolesController::class, 'store'])->name('role.store');
  Route::delete('/delete/{id}', [App\Http\Controllers\RolesController::class, 'delete'])->name('role.delete');
});

Route::group(['prefix' => 'permission', 'middleware' => 'auth'], function(){
  Route::get('/index', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
  Route::post('/Store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
  Route::delete('/delete/{id}', [App\Http\Controllers\PermissionController::class, 'delete'])->name('permission.delete');
});






Auth::routes();
