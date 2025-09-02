<?php

namespace App\Interfaces\DoctorDashboard;

interface InvoicesRepositoryInterface
{
    public function index();

    public function reviewInvoices();

    public function completedInvoices();
}
