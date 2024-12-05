<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;


    public function notifications() {
			return $this->hasMany(Notification::class);
    }

    public function messages() {
			return $this->belongsToMany(Message::class);
      }

    public function conversations() {
			return $this->belongsToMany(Conversation::class);
    }
}
