<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

// class User extends Model
class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, HasApiTokens;

    protected $fillable = ['email', 'password'];

    public function notifications() {
			return $this->hasMany(Notification::class);
    }

    public function messages() {
			return $this->belongsToMany(Message::class, 'user_message')->withPivot('read_at');
      }

    public function conversations() {
			return $this->belongsToMany(Conversation::class, 'user_conversation');
    }
}
