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

Route::get('/', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::get('/lk', function () {
    return view('lk');
})->middleware(['auth'])->name('lk');

require __DIR__.'/auth.php';


Route::get('/submission_form', [\App\Http\Controllers\UserResponseController::class, 'submissionForm'])->name('submissionForm');
