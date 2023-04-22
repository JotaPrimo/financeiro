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
    Route::get('/show', [DebitoController::class, 'show'])->name('show')->middleware('acesso-debito');
});

Route::name('proventos.')->prefix('proventos')->middleware('auth')->group(function () {
    Route::get('/', [ProventoController::class, 'index'])->name('index');
    Route::post('/', [ProventoController::class, 'index'])->name('index');
    Route::get('/create', [ProventoController::class, 'create'])->name('create');
});

Route::name('reports.')->prefix('reports')->middleware('auth')->group(function () {
    Route::name('debitos')->group(function () {
        Route::get('/', [DebitosCsvController::class, 'export'])->name('debitos-export');
        Route::get('/', [DebitosPdfController::class, 'export'])->name('debitos-export');
    });

    Route::name('proventos')->group(function () {
        Route::get('/', [ProventosCsvController::class, 'export'])->name('proventos-export');
        Route::get('/', [ProventosPdfController::class, 'export'])->name('proventos-export');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
