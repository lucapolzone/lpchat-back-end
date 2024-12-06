<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recupera utenti
        $luca = User::where('username', 'LucaPolz')->first();
        $mario = User::where('username', 'MarioRiceve')->first();

        // Recupera messaggi
        $message1 = Message::where('message_content', 'Questo è un messaggio')->first();
        $message2 = Message::where('message_content', 'Ottimo, ho ricevuto il tuo messaggio')->first();

        // Collega messaggi agli utenti
        $luca->messages()->attach($message1->id, ['read_at' => now()]);
        $mario->messages()->attach($message2->id, ['read_at' => now()]);
    }
}
