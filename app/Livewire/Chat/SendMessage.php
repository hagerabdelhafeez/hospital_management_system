<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SendMessage extends Component
{
    public $body;
    public $selected_conversation;
    public $receiver_user;
    public $auth_email;

    public function mount()
    {
        $this->auth_email = Auth::user()->email;
    }

    #[On('update-message')]
    public function updateMessage(Conversation $conversation, Doctor $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiver_user = $receiver;
    }

    public function sendMessage()
    {
        if (!$this->body || !$this->selected_conversation || !$this->receiver_user) {
            return;
        }
        $createdMessage = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_email' => $this->auth_email,
            'receiver_email' => $this->receiver_user->email,
            'body' => $this->body,
        ]);
        $this->selected_conversation->last_time_message = $createdMessage->created_at;
        $this->selected_conversation->save();
        $this->reset('body');
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
