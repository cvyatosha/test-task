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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/view/{id}', [\App\Http\Controllers\SiteController::class, 'show'])->name('view');
Route::post('/logout', [\App\Http\Controllers\SiteController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('post', \App\Http\Controllers\PostController::class);
});

require __DIR__.'/auth.php';
