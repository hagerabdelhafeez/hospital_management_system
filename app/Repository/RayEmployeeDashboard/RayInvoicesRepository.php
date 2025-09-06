<?php

namespace App\Repository\RayEmployeeDashboard;

use App\Interfaces\RayEmployeeDashboard\RayInvoicesRepositoryInterface;
use App\Models\Ray;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;

class RayInvoicesRepository implements RayInvoicesRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $invoices = Ray::all();

        return view('dashboard.dashboard_ray_employee.invoices.index', compact('invoices'));
    }

    public function edit($id)
    {
        $invoice = Ray::findorFail($id);

        return view('dashboard.dashboard_ray_employee.invoices.add_diagnosis', compact('invoice'));
    }

    public function update($request, $id)
    {
        $invoice = Ray::findorFail($id);

        $invoice->update([
            'employee_id' => Auth::user()->id,
            'description_employee' => $request->description_employee,
            'case' => 1,
        ]);

        // Upload img
        $this->verifyAndStoreImage($request, 'photo', 'Rays', 'upload_image', Auth::user()->id, 'App\Models\Ray');

        session()->flash('edit');

        return redirect()->route('invoices_ray_employee.index');
    }
}
