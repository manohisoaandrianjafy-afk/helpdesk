<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tickets', function (Request $request) {
    return $request->user()->tickets;
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin-test', function () {
    return response()->json([
        'message' => 'Bienvenue administrateur'
    ]);
})->middleware(['auth:sanctum', 'role:admin']);