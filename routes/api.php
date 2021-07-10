<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);

Route::get('/all-categories', [App\Http\Controllers\CategoriesController::class, 'allCategories'])->middleware('auth:sanctum');

// Operaciones
Route::post('/add-transaction', [App\Http\Controllers\TransactionController::class, 'addTransaction'])->middleware('auth:sanctum');
Route::post('/update-transaction', [App\Http\Controllers\TransactionController::class, 'updateTransaction'])->middleware('auth:sanctum');
Route::post('/remove-transaction', [App\Http\Controllers\TransactionController::class, 'removeTransaction'])->middleware('auth:sanctum');
Route::get('/transactions-month', [App\Http\Controllers\TransactionController::class, 'getTransactionsMonth'])->middleware('auth:sanctum');
Route::get('/transactions-last-30-days', [App\Http\Controllers\TransactionController::class, 'getTransactionsLast30Days'])->middleware('auth:sanctum');
Route::get('/transactions-all', [App\Http\Controllers\TransactionController::class, 'getAllTransactions'])->middleware('auth:sanctum');
Route::get('/transaction-data-{id_transaction}', [App\Http\Controllers\TransactionController::class, 'getTransactionData'])->middleware('auth:sanctum');
