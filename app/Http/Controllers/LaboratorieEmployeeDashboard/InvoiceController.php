<?php

namespace App\Http\Controllers\LaboratorieEmployeeDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\LaboratorieEmployeeDashboard\LaboratorieEmployeeInvoicesInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(private LaboratorieEmployeeInvoicesInterface $Laboratorie_Employee)
    {
    }

    public function index()
    {
        return $this->Laboratorie_Employee->index();
    }

    public function completed_invoices()
    {
        return $this->Laboratorie_Employee->completed_invoices();
    }

    public function edit($id)
    {
        return $this->Laboratorie_Employee->edit($id);
    }

    public function view_laboratories($id)
    {
        return $this->Laboratorie_Employee->view_laboratories($id);
    }

    public function update(Request $request, $id)
    {
        return $this->Laboratorie_Employee->update($request, $id);
    }

    public function destroy($id)
    {
    }
}
