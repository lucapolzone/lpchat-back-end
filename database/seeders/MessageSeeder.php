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

			
            $conversation1 = Conversation::find(1);
            $conversation2 = Conversation::find(2);

            // Prima conversazione
            $message1 = new Message();
            $message1->conversation_id = $conversation1->id;
            $message1->message_content = 'Ciao, come va?';
            $message1->save();

            $message2 = new Message();
            $message2->conversation_id = $conversation1->id;
            $message2->message_content = 'Tutto bene, e tu?';
            $message2->save();

            // Seconda conversazione
            $message3 = new Message();
            $message3->conversation_id = $conversation2->id;
            $message3->message_content = 'Ciao, tutto ok!';
            $message3->save();

            $message4 = new Message();
            $message4->conversation_id = $conversation2->id;
            $message4->message_content = 'Ottimo, ci vediamo presto!';
            $message4->save();
    }
}
