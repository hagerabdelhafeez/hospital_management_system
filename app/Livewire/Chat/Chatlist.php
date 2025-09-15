<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;
    public $auth_email;
    public $receiver_user;

    public function mount()
    {
        $this->auth_email = Auth::user()->email;
    }

    public function getUsers(Conversation $conversation, $request)
    {
        if ($conversation->sender_email == $this->auth_email) {
            $this->receiver_user = Doctor::firstWhere('email', $conversation->receiver_email);
        } else {
            $this->receiver_user = Patient::firstWhere('email', $conversation->sender_email);
        }
        if (isset($request)) {
            return $this->receiver_user->$request;
        }
    }

    public function render()
    {
        $this->conversations = Conversation::where('sender_email', $this->auth_email)->orWhere('receiver_email', $this->auth_email)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.chat.chatlist');
    }
}
