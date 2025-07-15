<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', [DashboardController::class, 'index']);


Route::get('/jadwal', [MahasiswaController::class, 'index']);
Route::get('/jadwal/create', [MahasiswaController::class, 'create']);
Route::get('/jadwal/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/jadwal/store', [MahasiswaController::class, 'store']);
Route::put('/jadwal/{id}', [MahasiswaController::class, 'update']);
Route::delete('/jadwal/{id}', [MahasiswaController::class, 'delete']);