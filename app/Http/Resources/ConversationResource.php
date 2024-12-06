<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
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
					'users' => UserResource::collection($this->whenLoaded('users')), // Carica gli utenti
					'messages' => MessageResource::collection($this->whenLoaded('messages')), // Carica i messaggi
					'created_at' => $this->created_at,
					'updated_at' => $this->updated_at,
        ];
    }
}
