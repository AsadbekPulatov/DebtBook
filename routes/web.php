<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.master');
})->middleware(['auth', 'verified'])->name('admin');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users');
    Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.users.delete');
});

//Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])
//    ->middleware(['auth', 'admin'])->name('admin.users');
//
//Route::get('/admin/users/{id}', [App\Http\Controllers\UserController::class, 'update'])
//    ->middleware(['auth','admin'])->name('admin.users.update');
//
//Route::get('/admin/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])
//    ->middleware(['auth','admin'])->name('admin.users.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
