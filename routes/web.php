<?php

declare(strict_types=1);

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

require __DIR__.'/auth.php';

Route::get('/submission_form/{product}', [\App\Http\Controllers\ProductController::class, 'submissionForm'])->name('submissionForm');
Route::post('/send_mail/{product}', [\App\Http\Controllers\ProductController::class,'sendMail'])->name('send_mail');


Route::middleware(['auth'])->group(function () {
    Route::get('/after-login', [\App\Http\Controllers\Auth\LoginController::class,'afterLogin'])
        ->name('login.afterLogin');

    Route::prefix('agent')->name('agent.')->middleware(['role:agent'])->group(function () {
        Route::get('/', [\App\Http\Controllers\Agent\AgentController::class,'index'])->name('index');
        Route::resource('product', \App\Http\Controllers\Agent\ProductController::class);
        Route::resource('user-response', \App\Http\Controllers\Agent\UserResponseController::class)
            ->only(['index', 'show']);
    });

    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('index');
        Route::resource('insurance-company', \App\Http\Controllers\Admin\InsuranceCompanyController::class);
    });
});
