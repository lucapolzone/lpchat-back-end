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
        $luca = User::where('username', 'LucaManda')->first();
        $mario = User::where('username', 'MarioRiceve')->first();
        $paolo = User::where('username', 'PaoloManda')->first();
        $sara = User::where('username', 'SaraRiceve')->first();

        $messageIds = Message::pluck('id');

        // Associa i messaggi alla prima conversazione
        $luca->messages()->attach($messageIds->get(0), ['read_at' => now()]);
        $mario->messages()->attach($messageIds->get(1), ['read_at' => now()]);

        // Associa i messaggi alla seconda conversazione
        $paolo->messages()->attach($messageIds->get(2), ['read_at' => now()]);
        $sara->messages()->attach($messageIds->get(3), ['read_at' => now()]);

    }
}
