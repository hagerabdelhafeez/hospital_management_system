<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptAccount extends Model
{
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
