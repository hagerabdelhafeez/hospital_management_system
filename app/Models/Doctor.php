<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use Translatable;
    use HasFactory;

    protected $fillable = ['name', 'email', 'email_verified_at', 'password', 'phone', 'price', 'appointments', 'section_id', 'status'];

    public $translatedAttributes = ['name', 'appointments'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
