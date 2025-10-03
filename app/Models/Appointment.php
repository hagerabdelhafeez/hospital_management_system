<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use Translatable;
    use HasFactory;

    protected $fillable = ['name'];

    public $translatedAttributes = ['name', 'email', 'phone', 'notes', 'section_id', 'doctor_id', 'type', 'appointment_date'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
