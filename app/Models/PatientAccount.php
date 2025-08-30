<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    protected $guarded = [];

    public function single_invoice()
    {
        return $this->belongsTo(SingleInvoice::class, 'single_invoice_id');
    }

    public function ReceiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class, 'receipt_account_id');
    }

    public function PaymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class, 'payment_account_id');
    }
}
