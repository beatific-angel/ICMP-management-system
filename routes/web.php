<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

Route::prefix('group')->name('group.')->middleware('auth')->group(function(){
    Route::get('/', [GroupController::class, 'index'])->name('index');
    Route::get('/create', [GroupController::class, 'create'])->name('create');
    Route::post('/store', [GroupController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [GroupController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [GroupController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [GroupController::class, 'delete'])->name('destroy');
});

Route::prefix('device')->name('device.')->middleware('auth')->group(function(){
    Route::get('/', [DeviceController::class, 'index'])->name('index');
    Route::get('/create', [DeviceController::class, 'create'])->name('create');
    Route::post('/store', [DeviceController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [DeviceController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [DeviceController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [DeviceController::class, 'delete'])->name('destroy');
});

// Users
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');

});

