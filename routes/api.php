<?php

use App\Http\Controllers\Api\ConversationController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
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

// Users API routes
Route::get('/users', [UserController::class, 'index']); //Restituisce tutti gli utenti.
Route::get('/users/{id}', [UserController::class, 'show']); //Restituisce i dettagli di un utente specifico

// Conversations API routes
Route::get('/conversations', [ConversationController::class, 'index']); //Restituisce tutte le conversazioni.
Route::get('/conversations/{id}', [ConversationController::class, 'show']); //Restituisce i dettagli di una conversazione specifica.
Route::post('/conversations', [ConversationController::class, 'store']); //Crea una nuova conversazione

// Messages API routes
Route::post('/messages', [MessageController::class, 'store']);  // Crea un nuovo messaggio
Route::get('/messages/{conversationId}', [MessageController::class, 'index']);  // Restituisce i messaggi di una conversazione

// Route::post('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login'])->name('api.login');




Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/conversations', [ConversationController::class, 'index']);
    Route::get('/conversations/{id}', [ConversationController::class, 'show']);
    Route::post('/conversations', [ConversationController::class, 'store']);
    Route::post('/messages', [MessageController::class, 'store']);
    Route::get('/messages/{conversationId}', [MessageController::class, 'index']);
});