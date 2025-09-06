<?php

namespace App\Http\Controllers\RayEmployeeDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\RayEmployeeDashboard\RayInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(private RayInvoicesRepositoryInterface $Ray_Employee)
    {
    }

    public function index()
    {
        return $this->Ray_Employee->index();
    }

    public function completedInvoices()
    {
        return $this->Ray_Employee->completedInvoices();
    }

    public function edit($id)
    {
        return $this->Ray_Employee->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->Ray_Employee->update($request, $id);
    }

    public function destroy($id)
    {
    }
}
