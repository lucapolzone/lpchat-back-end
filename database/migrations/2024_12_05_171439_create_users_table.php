<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            id (PK)          : INT : AUTOINCREMENT : NOT NULL
            username         : VARCHAR(50) : NOT NULL
            email            : VARCHAR(255) : UNIQUE
            password         : VARCHAR(255) : NOT NULL
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', length: 50);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
