<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    /*
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['user' => $user, 'token' => $token], 200);
        }

        return response()->json(['message' => 'Credenziali non valide'], 401);
    }
    */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Trova l'utente tramite l'email
        $user = User::where('email', $credentials['email'])->first();

        // Verifica se l'utente esiste e la password è corretta
        if ($user && $user->password === $credentials['password']) {
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['user' => $user, 'token' => $token], 200);
        }

        return response()->json(['message' => 'Credenziali non valide'], 401);
    }

    public function logout(Request $request)
    {
        // Revoca il token utilizzato per autenticare la richiesta corrente
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout effettuato con successo'], 200);
    }

}