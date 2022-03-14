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

Route::get('/lk',[\App\Http\Controllers\ProductController::class, 'auth'] )->middleware(['auth'])->name('lk');

require __DIR__.'/auth.php';


Route::get('/submission_form/{product}', [\App\Http\Controllers\ProductController::class, 'submissionForm'])->name('submissionForm');
Route::post('/send_mail/{product}',[\App\Http\Controllers\ProductController::class,'sendMail'])->name('send_mail');
Route::get('/lk/add_product',[\App\Http\Controllers\ProductController::class,'addProduct'])->name('add_product');
