<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Chatbox extends Component
{
    public $selected_conversation;
    public $receiver_user;
    public $messages;
    public $auth_email;

    public function mount()
    {
        $this->auth_email = Auth::user()->email;
    }

    #[On('load-conversation-doctor')]
    public function loadConversationDoctor(Conversation $conversation, Doctor $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiver_user = $receiver;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }

    #[On('load-conversation-patient')]
    public function loadConversationPatient(Conversation $conversation, Patient $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiver_user = $receiver;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
