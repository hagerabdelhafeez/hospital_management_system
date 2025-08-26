<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'Address'];
    protected $fillable = ['email', 'Password', 'Date_Birth', 'Phone', 'Gender', 'Blood_Group'];
}
