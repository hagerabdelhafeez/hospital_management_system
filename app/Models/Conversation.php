<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    public function scopecheckConversation($query, $auth_email, $receiver_email)
    {
        return $query->where('sender_email', $auth_email)->where('receiver_email', $receiver_email)
            ->orWhere('sender_email', $receiver_email)->orWhere('receiver_email', $auth_email);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
