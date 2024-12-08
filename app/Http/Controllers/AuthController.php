<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        // Validazione avvenuta con successo grazie al RegisterUserRequest
        $validatedData = $request->validated();

        // Creazione dell'utente
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json(['message' => 'Utente registrato con successo', 'user' => $user], 201);
    }
}