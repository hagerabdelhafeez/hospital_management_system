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

    public function reviewInvoices()
    {
        return $this->invoice->reviewInvoices();
    }

    public function completedInvoices()
    {
        return $this->invoice->completedInvoices();
    }

    public function show($id)
    {
        return $this->invoice->show($id);
    }
}
