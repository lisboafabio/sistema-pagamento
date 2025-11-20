<?php

use App\Http\Controllers\PixController;
use App\Http\Controllers\SubAcquirerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawController;

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/{id}', [UserController::class, 'getById'])->name('user.byId');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::prefix('subacquirer')->group(function () {
    Route::get('/', [SubAcquirerController::class, 'index'])->name('subacquirer.index');
    Route::get('/{id}', [SubAcquirerController::class, 'getById'])->name('subacquirer.byId');
    Route::post('/', [SubAcquirerController::class, 'create'])->name('subacquirer.store');
    Route::put('/{id}', [SubAcquirerController::class, 'update'])->name('subacquirer.update');
    Route::delete('/{id}', [SubAcquirerController::class, 'delete'])->name('subacquirer.delete');
});

Route::prefix('pix')->group(function () {
    Route::get('/{id}', [PixController::class, 'getById'])->name('pix.byId');
    Route::post('/', [PixController::class, 'create'])->name('pix.store');
});

Route::prefix('withdraw')->group(function () {
    Route::get('/{id}', [WithdrawController::class, 'getById'])->name('withdraw.getById');
    Route::post('/', [WithdrawController::class, 'create'])->name('withdraw.store');
});
