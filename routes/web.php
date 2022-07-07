<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/account', [DashboardController::class, 'account'])->middleware(['auth'])->name('account');
Route::get('/cities/{country}', [DashboardController::class, 'getCities'])->middleware(['auth'])->name('get-cities');
Route::post('/update-account', [DashboardController::class, 'updateAccount'])->middleware(['auth'])->name('account-update');

require __DIR__.'/auth.php';
