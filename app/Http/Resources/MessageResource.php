<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'conversation_id' => $this->conversation_id, // id della conversazione
            'message_content' => $this->message_content, // Contenuto del messaggio
            'users' => UserResource::collection($this->users), // Gli utenti associati
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
