<?php

namespace App\Livewire\Chat;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;

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
