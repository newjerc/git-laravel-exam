<?php

use App\Http\Controllers\TransactionController;
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
    return view('welcome');
});




Route::get('/index', [TransactionController::class, 'index'])->name('index');
Route::get('/addform', [TransactionController::class, 'showAddForm'])->name('show.addform');
Route::post('/transaction/insert', [TransactionController::class, 'insert'])->name('addTransaction');

Route::get('/transaction/edit/{id}', [TransactionController::class, 'showEditForm'])->name('show.editform');
Route::post('/transaction/update/{id}', [TransactionController::class, 'update'])->name('update');

Route::get('/transaction/delete/{id}',[TransactionController::class,'delete'])->name('DeleteService');


Route::get('/search', [TransactionController::class, 'search'])->name('search');

Route::get('/report/transaction', [TransactionController::class, 'showTReport'])->name('report.transaction');
Route::get('/report/income-expense', [TransactionController::class, 'showIEReport'])->name('report.income-expense');