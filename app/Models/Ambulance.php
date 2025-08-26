<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use Translatable;

    public $translatedAttributes = ['driver_name', 'notes'];
    protected $fillable = ['car_number', 'car_model', 'car_year_made', 'driver_license_number', 'driver_phone', 'is_available', 'car_type'];
}
