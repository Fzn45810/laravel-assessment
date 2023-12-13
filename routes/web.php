<?php

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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('can:admin')->group(function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::middleware('can:polio-worker')->group(function() {
    Route::get('/polioworker', [App\Http\Controllers\PolioWorkerController::class, 'index'])->name('index');

    // routes/web.php
    Route::get('/getvalue', [App\Http\Controllers\PolioWorkerController::class, 'get_value'])->name('getvalue');

});