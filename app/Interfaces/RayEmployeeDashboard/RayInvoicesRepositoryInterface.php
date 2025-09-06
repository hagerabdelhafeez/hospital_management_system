<?php

namespace App\Interfaces\RayEmployeeDashboard;

interface RayInvoicesRepositoryInterface
{
    public function index();

    public function completedInvoices();

    public function edit($id);

    public function update($request, $id);
}
