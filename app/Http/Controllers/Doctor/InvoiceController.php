<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Interfaces\DoctorDashboard\InvoicesRepositoryInterface;

class InvoiceController extends Controller
{
    public function __construct(private InvoicesRepositoryInterface $invoice)
    {
    }

    public function index()
    {
        return $this->invoice->index();
    }
}
