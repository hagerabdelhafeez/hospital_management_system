<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Patient extends Authenticatable
{
    use Translatable;

    public $translatedAttributes = ['name', 'Address'];
    protected $fillable = ['email', 'Password', 'Date_Birth', 'Phone', 'Gender', 'Blood_Group'];
}
