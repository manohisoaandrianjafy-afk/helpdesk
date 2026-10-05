<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/tickets', function (Request $request) {
//     return $request->user()->tickets;
// })->middleware('auth:sanctum');

Route::get('/tickets',[TicketController::class,'getTickets'])->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin-test', function () {
    return response()->json([
        'message' => 'Bienvenue administrateur'
    ]);
})->middleware(['auth:sanctum', 'role:admin']);

// CRUD TICKET
Route::delete('/deleteTicket/{ticket}',[TicketController::class,'deleteTicket'])->middleware('auth:sanctum');
Route::put('/modifierTicket/{ticket}',[TicketController::class,'modifierTicket'])->middleware('auth:sanctum');