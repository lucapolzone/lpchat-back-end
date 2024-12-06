<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recupera gli utenti
        $mario = User::where('username', 'MarioRiceve')->first();
        $sara = User::where('username', 'SaraRiceve')->first();

        // Crea le notifiche per gli utenti
        $mario->notifications()->create([
            'notification_message' => 'Hai ricevuto un nuovo messaggio!',
            'read_at' => null,
        ]);

        $sara->notifications()->create([
            'notification_message' => 'Hai ricevuto un nuovo messaggio!',
            'read_at' => null,
        ]);
    }
}
