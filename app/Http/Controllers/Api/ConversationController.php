<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConversationResource;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::with(['users', 'messages'])->get(); // Carica utenti e messaggi
        // $conversations = Conversation::all();  // Puoi usare un filtro per restituire solo le conversazioni dell'utente loggato
        $response = response()->json(ConversationResource::collection($conversations));
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida i dati in ingresso
        $validatedData = $request->validate([
            'user_ids' => 'required|array',  // Array degli id degli utenti
            'user_ids.*' => 'exists:users,id', // Ogni id deve esistere nella tabella users
        ]);

        // Crea la nuova conversazione
        $conversation = Conversation::create();

        // Associa gli utenti alla conversazione
        $conversation->users()->attach($validatedData['user_ids']);  

        // Restituisce la risposta JSON
        $response = response()->json(new ConversationResource($conversation), 201);
        // dd($response);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conversation = Conversation::with(['users', 'messages'])->findOrFail($id);
        $response = response()->json(new ConversationResource($conversation)); // Restituisce i dati dell'utente formattati
        // $response = new ConversationResource($conversation);
        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
