<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

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


Route::get('/', [ExpenseController::class, 'index'])->name('expenses.index');
// Route::post('/expenses', [ExpenseController::class, 'store']);
Route::get('/expenses/create', [ExpenseController::class, 'create']);

Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
