<?php

namespace App\Repository\DoctorDashboard;

use App\Interfaces\DoctorDashboard\InvoicesRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoicesRepository implements InvoicesRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 1)->get();

        return view('dashboard.doctor.invoices.index', compact('invoices'));
    }

    public function reviewInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 2)->get();

        return view('dashboard.doctor.invoices.review_invoices', compact('invoices'));
    }

    public function completedInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 3)->get();

        return view('dashboard.doctor.invoices.completed_invoices', compact('invoices'));
    }
}
