<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recupera gli utenti
        $luca = User::where('username', 'LucaManda')->first();
        $mario = User::where('username', 'MarioRiceve')->first();
        $paolo = User::where('username', 'PaoloManda')->first();
        $sara = User::where('username', 'SaraRiceve')->first();

        // Recupera le conversazioni
        $conversation1 = Conversation::find(1); // LucaManda e MarioRiceve
        $conversation2 = Conversation::find(2); // PaoloManda e SaraRiceve

        // Collega gli utenti alle conversazioni
        $luca->conversations()->attach($conversation1->id);
        $mario->conversations()->attach($conversation1->id);
        $paolo->conversations()->attach($conversation2->id);
        $sara->conversations()->attach($conversation2->id);
    }
}
