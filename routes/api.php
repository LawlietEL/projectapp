<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RolesController;
use App\Http\Controllers\API\SettingRolesController;
use App\Http\Controllers\API\ProfilPerusahaanController;
use App\Http\Controllers\API\AbsenController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//yang belum login
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//yang sudah login
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/change-password', [AuthController::class, 'change_password']);
    Route::post('/search-user', [AuthController::class, 'search']);
    Route::resource('profil_perusahaan', ProfilPerusahaanController::class);
});
    
    //yang sudah login
Route::middleware(['auth:sanctum', 'Admin'])->prefix('admin')->group(function () {
    Route::post('/search-user', [AuthController::class, 'search']);
    Route::resource('roles', RolesController::class);
    Route::resource('setting_roles', SettingRolesController::class);

    Route::resource('absen', AbsenController::class);
});

Route::middleware(['auth:sanctum', 'Pegawai'])->prefix('pegawai')->group(function () {
    // Route::get('/profil_perusahaan/{id}', [ProfilPerusahaanController::class, 'show']);
    // Route::post('/search-user', [AuthController::class, 'search']);
    // Route::resource('roles', RolesController::class);
    // Route::resource('setting_roles', SettingRolesController::class);
    // // Route::resource('profil_perusahaan', ProfilPerusahaanController::class);
    // Route::resource('absen', AbsenController::class);
});