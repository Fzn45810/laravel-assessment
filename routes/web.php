<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PolioWorkerController;

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

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/polioworker-assignment', [HomeController::class, 'assignment'])->name('polio-worker.assignment');
    Route::post('/polioworker-assignment', [HomeController::class, 'assignmentProcess'])->name('polio-worker.assignment-process');

});

Route::middleware('can:polio-worker')->group(function() {
    Route::get('/polioworker', [PolioWorkerController::class, 'index'])->name('index');

    // routes/web.php
    Route::get('/getvalue', [PolioWorkerController::class, 'get_value'])->name('getvalue');

});