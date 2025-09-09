<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class LaboratorieEmployee extends Authenticatable
{
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
