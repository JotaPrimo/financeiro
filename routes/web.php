<?php

use App\Http\Controllers\DebitoController;
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
    return view('welcome');
});


Route::prefix('debitos')->group(function () {
    Route::get('/', [DebitoController::class, 'index'])->name('index');
    Route::post('/', [DebitoController::class, 'index'])->name('index');
    Route::get('/create', [DebitoController::class, 'create'])->name('create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
