<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message; // Dati del messaggio

    /**
     *
     * @param  \App\Models\Message  $message
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message; // Passa il messaggio all'evento
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('conversation.' . $this->message->conversation_id); // Broadcast su un canale privato
    }

    /**
     * Dati da inviare a Pusher
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'message' => $this->message->message_content,
            'users' => $this->message->users->pluck('username'),
            'created_at' => $this->message->created_at,
        ];
    }
}