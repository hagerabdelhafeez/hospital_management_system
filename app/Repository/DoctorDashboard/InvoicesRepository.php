<?php

namespace App\Repository\DoctorDashboard;

use App\Interfaces\DoctorDashboard\InvoicesRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoicesRepository implements InvoicesRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->get();

        return view('dashboard.doctor.invoices.index', compact('invoices'));
    }
}
