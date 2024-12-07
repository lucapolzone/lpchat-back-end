<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($conversationId)
    {
        // Recupera tutti i messaggi della conversazione specificata
        $messages = Message::where('conversation_id', $conversationId)->get();

        // Restituisce la risposta JSON con tutti i messaggi
        $response = response()->json(MessageResource::collection($messages), 200);
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
        // Validazione dei dati
        $validatedData = $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'message_content' => 'required|string',
        ]);

        // Crea il messaggio
        $message = Message::create([
            'conversation_id' => $validatedData['conversation_id'],
            'message_content' => $validatedData['message_content'],
        ]);

        // Associa gli utenti al messaggio tramite la tabella pivot user_message
        $message->users()->attach($validatedData['user_ids']);

        // Fa partire l'evento per inviare il messaggio ai client
        event(new MessageSent($message));

        // $response = response()->json($message, 201); 
        $response = response()->json(new MessageResource($message), 201); //Restituisce la response JSON con i dati del messaggio creato
        // dd($response);
        // return response()->json($message, 201); 
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

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
