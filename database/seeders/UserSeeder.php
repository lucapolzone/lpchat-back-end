<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
					['username' => 'LucaManda', 'email' => 'luca@email.it', 'password' => 'ciaociao12'],
					['username' => 'MarioRiceve', 'email' => 'mario@email.it', 'password' => 'ciaomario20'],
					['username' => 'PaoloManda', 'email' => 'paolo@email.it', 'password' => 'ciaopaolo25'],
					['username' => 'SaraRiceve', 'email' => 'sara@email.it', 'password' => 'ciaosara30'],
        ];

				foreach ($users as $user) {
					User::create([
						'username' => $user['username'],
						'email' => $user['email'],
						'password' => $user['password'],
					]);

				}
    }
}
