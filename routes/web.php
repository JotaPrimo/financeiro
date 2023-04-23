<?php

use App\Http\Controllers\Auth\AutenticacaoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebitoController;
use App\Http\Controllers\ProventoController;
use App\Http\Controllers\Reports\Debitos\CsvController as DebitosCsvController;
use App\Http\Controllers\Reports\Debitos\PdfController as DebitosPdfController;
use App\Http\Controllers\Reports\Proventos\CsvController as ProventosCsvController;
use App\Http\Controllers\Reports\Proventos\PdfController as ProventosPdfController;
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

//autenticação
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/autenticacao', [AutenticacaoController::class, 'autenticacao'])->name('autenticacao');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'dashboards', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
});

Route::name('debitos.')->prefix('debitos')->middleware('auth')->group(function () {
    Route::get('/', [DebitoController::class, 'index'])->name('index');
    Route::post('/', [DebitoController::class, 'index'])->name('index');
    Route::get('/create', [DebitoController::class, 'create'])->name('create');
    Route::post('/store', [DebitoController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DebitoController::class, 'edit'])->name('edit');
    Route::get('/show', [DebitoController::class, 'show'])->name('show')->middleware('acesso-debito');
    Route::delete('/delete/{id}', [DebitoController::class, 'delete'])->name('destroy')->middleware('acesso-debito');
});

Route::name('proventos.')->prefix('proventos')->middleware('auth')->group(function () {
    Route::get('/', [ProventoController::class, 'index'])->name('index');
    Route::get('/create', [ProventoController::class, 'create'])->name('create');
    Route::post('/store', [ProventoController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProventoController::class, 'edit'])->name('edit');
    Route::post('/update', [ProventoController::class, 'update'])->name('update');
    Route::get('/show/{id}', [ProventoController::class, 'show'])->name('show');
    Route::delete('/delete/{id}', [ProventoController::class, 'delete'])->name('delete');

});

Route::name('reports.')->prefix('reports')->middleware('auth')->group(function () {
    Route::name('debitos.')->prefix('debitos')->group(function () {
        Route::get('/', [DebitosCsvController::class, 'index'])->name('csv-index');
        Route::get('/csv', [DebitosCsvController::class, 'export'])->name('csv-export');
        Route::get('/pdf', [DebitosPdfController::class, 'export'])->name('pdf-export');
    });

    Route::name('proventos.')->prefix('proventos')->group(function () {
        Route::get('/csv', [ProventosCsvController::class, 'export'])->name('csv-export');
        Route::get('/pdf', [ProventosPdfController::class, 'export'])->name('pdf-export');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
