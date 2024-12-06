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
        $user = new User();
        $user->username = 'LucaPolz';
        $user->email = 'luca@email.it';
        $user->password = 'ciaociao12';
        $user->save();

        $user = new User();
        $user->username = 'MarioRiceve';
        $user->email = 'mario@email.it';
        $user->password = 'ciaomario20';
        $user->save();
    }
}
