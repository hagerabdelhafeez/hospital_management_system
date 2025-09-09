<?php

namespace App\Repository\LaboratorieEmployeeDashboard;

use App\Interfaces\LaboratorieEmployeeDashboard\LaboratorieEmployeeInvoicesInterface;
use App\Models\Laboratorie;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;

class LaboratorieEmployeeInvoicesRepository implements LaboratorieEmployeeInvoicesInterface
{
    use UploadTrait;

    public function index()
    {
        $invoices = Laboratorie::where('case', 0)->get();

        return view('dashboard.dashboard_laboratorie_employee.invoices.index', compact('invoices'));
    }

    public function completed_invoices()
    {
        $invoices = Laboratorie::where('case', 1)->where('employee_id', Auth::user()->id)->get();

        return view('dashboard.dashboard_laboratorie_employee.invoices.completed_invoices', compact('invoices'));
    }

    public function edit($id)
    {
        $invoice = Laboratorie::findorFail($id);

        return view('dashboard.dashboard_laboratorie_employee.invoices.add_diagnosis', compact('invoice'));
    }

    public function update($request, $id)
    {
        $invoice = Laboratorie::findorFail($id);

        $invoice->update([
            'employee_id' => Auth::user()->id,
            'description_employee' => $request->description_employee,
            'case' => 1,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                // Upload img
                $this->verifyAndStoreImageForeach($photo, 'laboratories', 'upload_image', $invoice->id, 'App\Models\Laboratorie');
            }
        }
        session()->flash('edit');

        return redirect()->route('invoices_laboratorie_employee.index');
    }

    public function view_laboratories($id)
    {
        $laboratorie = Laboratorie::findorFail($id);
        if ($laboratorie->employee_id != Auth::user()->id) {
            // abort(404);
            return redirect()->route('404');
        }

        return view('dashboard.dashboard_laboratorie_employee.invoices.patient_details', compact('laboratorie'));
    }
}
