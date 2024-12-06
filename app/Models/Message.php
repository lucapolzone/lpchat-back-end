<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['conversation_id', 'message_content'];

    public function users() {
			return $this->belongsToMany(User::class, 'user_message');

    }

    public function conversations() {
			return $this->belongsToMany(Conversation::class);
    }
}
