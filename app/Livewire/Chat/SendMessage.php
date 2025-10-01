<?php

namespace App\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Events\MessageSent2;
use App\Models\Patient;

class SendMessage extends Component
{
    public $body;
    public $selected_conversation;
    public $receiver_user;
    public $auth_email;
    public $sender;
    public $createdMessage;

    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->sender = Auth::guard('patient')->user();
            $this->auth_email = Auth::guard('patient')->user()->email;
        } else {
            $this->sender = Auth::guard('doctor')->user();
            $this->auth_email = Auth::guard('doctor')->user()->email;
        }
    }

    #[On('update-message')]
    public function updateMessage(Conversation $conversation, Doctor $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiver_user = $receiver;
    }

    #[On('update-message2')]
    public function updateMessage2(Conversation $conversation, Patient $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiver_user = $receiver;
    }

    public function sendMessage()
    {
        if (!$this->body || !$this->selected_conversation || !$this->receiver_user) {
            return;
        }
        $this->createdMessage = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_email' => $this->auth_email,
            'receiver_email' => $this->receiver_user->email,
            'body' => $this->body,
        ]);
        $this->selected_conversation->last_time_message = $this->createdMessage->created_at;
        $this->selected_conversation->save();
        $this->dispatch('push-message', message: $this->createdMessage->id);
        $this->dispatch('refresh');
        $this->dispatch('dispatchSentMessage')->self();
        $this->reset('body');
    }

    #[On('dispatchSentMessage')]
    public function dispatchSentMessage()
    {
        if (Auth::guard('patient')->check()) {
            broadcast(new MessageSent(
                $this->sender,
                $this->receiver_user,
                $this->createdMessage,
                $this->selected_conversation
            ));
        } else {
            broadcast(new MessageSent2(
                $this->sender,
                $this->receiver_user,
                $this->createdMessage,
                $this->selected_conversation
            ));
        }
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
