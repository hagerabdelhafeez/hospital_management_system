<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public $auth_email;

    public function mount()
    {
        $this->auth_email = Auth::user()->email;
    }

    public function createConversation($receiver_email)
    {
        $checkConversation = Conversation::checkConversation($this->auth_email, $receiver_email)->get();

        if ($checkConversation->isEmpty()) {
            DB::beginTransaction();
            try {
                $createConversation = Conversation::create([
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                ]);
                Message::create([
                    'conversation_id' => $createConversation->id,
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                    'body' => 'Hello, I want to chat with you',
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        } else {
            dd('Conversation already exists');
        }
    }

    public function render()
    {
        if (Auth::guard('patient')->check()) {
            $this->users = Doctor::all();
        } else {
            $this->users = Patient::all();
        }

        return view('livewire.chat.create-chat')->extends('dashboard.layouts.master');
    }
}
