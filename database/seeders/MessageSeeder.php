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

			
			$conversations = Conversation::all();

			foreach ($conversations as $conversation) {
				$message = new Message();
				$message->conversation_id = $conversation->id;
				$message->message_content = 'Questo è un messaggio';
				$message->save();
			}
    }
}
