<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupTranslation extends Model
{
    protected $fillable = ['name', 'notes'];
    public $timestamps = false;
}
