<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\MineralController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/artifacts', [ArtifactController::class, 'index'])->name('artifacts.index');
    Route::get('/artifacts/show/{id}', [ArtifactController::class, 'show'])->name('artifacts.show');

    Route::get('/minerals', [MineralController::class, 'index'])->name('minerals.index');
    Route::get('/minerals/show/{id}', [MineralController::class, 'show'])->name('minerals.show');

    Route::middleware(['can:admin-only'])->group(function () {
        
        Route::get('/artifacts/create', [ArtifactController::class, 'create'])->name('artifacts.create');
        Route::post('/artifacts/store', [ArtifactController::class, 'store'])->name('artifacts.save');
        Route::get('/artifacts/edit/{id}', [ArtifactController::class, 'edit'])->name('artifacts.edit');
        Route::post('/artifacts/update/{id}', [ArtifactController::class, 'update'])->name('artifacts.update');
        Route::get('/artifacts/delete/{id}', [ArtifactController::class, 'delete'])->name('artifacts.delete');

        Route::get('/minerals/create', [MineralController::class, 'create'])->name('minerals.create');
        Route::post('/minerals/store', [MineralController::class, 'store'])->name('minerals.store');
        Route::get('/minerals/edit/{id}', [MineralController::class, 'edit'])->name('minerals.edit');
        Route::post('/minerals/update/{id}', [MineralController::class, 'update'])->name('minerals.update');
        Route::get('/minerals/delete/{id}', [MineralController::class, 'delete'])->name('minerals.delete');
    });
});