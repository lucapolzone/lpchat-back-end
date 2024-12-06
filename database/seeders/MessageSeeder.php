<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

			
            $conversation = Conversation::firstOrCreate([]);

            $message1 = new Message();
            $message1->conversation_id = $conversation->id;
            $message1->message_content = 'Questo è un messaggio';
            $message1->save();

            $message2 = new Message();
            $message2->conversation_id = $conversation->id;
            $message2->message_content = 'Ottimo, ho ricevuto il tuo messaggio';
            $message2->save();
    }
}
