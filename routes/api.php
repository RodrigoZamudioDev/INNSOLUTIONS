<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;


Route::get('/prueba', function() {
    return response()->json(["message" => "API is working"]);
});


Route::prefix("auth")->group(function() {
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
});


Route::prefix("user")->middleware(['auth:sanctum'])->group(function() {
    Route::post('/delete',[UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware(["tokenVerification"])->group(function() {
    // Route::get('/user', [UserController::class, 'show'])->name('users.show');
    // Route::post('/user/update', [UserController::class, 'update'])->name('users.update');
});
