<?php

namespace App\Interfaces\DoctorDashboard;

interface InvoicesRepositoryInterface
{
    public function index();

    public function reviewInvoices();

    public function completedInvoices();

    public function show($id);

    public function showLaboratorie($id);
}
