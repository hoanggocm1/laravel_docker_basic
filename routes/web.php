<?php

use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\MainController;

Route::get('/', [MainController::class, 'index']);
Route::prefix('admin')->group(function () {
  Route::get('/', [MainController::class, 'index']);
  Route::prefix('accounts')->group(function () {
    Route::get('list', [AccountController::class, 'index'])->name('listAccout');
    Route::get('add', [AccountController::class, 'create']);
    Route::post('add', [AccountController::class, 'store']);
    Route::get('edit/{id}', [AccountController::class, 'edit']);
    Route::post('edit/{id}', [AccountController::class, 'update']);
    Route::DELETE('deleteAccount', [AccountController::class, 'destroy']);
    Route::post('search_account_byName', [AccountController::class, 'search_byName']);
    Route::post('search_account_byPhone', [AccountController::class, 'search_byPhone']);
    Route::post('search_account_byNameAndPhone', [AccountController::class, 'search_byNameAndPhone']);
    Route::post('filter_account_byAge', [AccountController::class, 'filter_account_byAge']);
    Route::post('refresh_listAccount', [AccountController::class, 'refresh_listAccount']);
  });
});
