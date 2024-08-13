<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', function () {
    return view('home');
});

// BACKEND
Route::group(['middleware' => 'auth:web', 'prefix' => 'c-panel'], function () {
    Route::get('logout', [\App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('backend.logout');
    Route::get('dashboard', [\App\Http\Controllers\Backend\DashboardController::class, 'dashboard'])->name('backend.dashboard');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class, 'indexProfile'])->name('backend.profile');
        Route::post('store', [\App\Http\Controllers\Backend\DashboardController::class, 'updateProfile'])->name('backend.profile.update');
    });

    Route::group(['prefix' => 'pengujian'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\PengujianController::class, 'index'])->name('backend.pengujian');
        Route::post('store', [\App\Http\Controllers\Backend\PengujianController::class, 'store'])->name('backend.pengujian.store');
        Route::get('edit/{id}', [\App\Http\Controllers\Backend\PengujianController::class, 'edit'])->name('backend.pengujian.edit');
        Route::get('create', [\App\Http\Controllers\Backend\PengujianController::class, 'create'])->name('backend.pengujian.create');
        Route::get('delete/{id}', [\App\Http\Controllers\Backend\PengujianController::class, 'delete'])->name('backend.pengujian.delete');
        Route::post('update/{id}', [\App\Http\Controllers\Backend\PengujianController::class, 'update'])->name('backend.pengujian.update');
        Route::post('alat/store', [\App\Http\Controllers\Backend\PengujianController::class, 'alatStore'])->name('backend.pengujian.alat.store');
        Route::post('penguji/store', [\App\Http\Controllers\Backend\PengujianController::class, 'pengujiStore'])->name('backend.pengujian.penguji.store');
        Route::get('alat/delete/{id}', [\App\Http\Controllers\Backend\PengujianController::class, 'alatDelete'])->name('backend.pengujian.alat.delete');
        Route::get('penguji/delete/{id}', [\App\Http\Controllers\Backend\PengujianController::class, 'pengujiDelete'])->name('backend.pengujian.penguji.delete');
    });
});