<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $doctors = Doctor::all();

        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();

        return view('dashboard.doctors.add', compact('sections', 'appointments'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $doctor = new Doctor();
            $doctor->email = $request->email;
            $doctor->password = Hash::make($request->password);
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->status = 1;
            $doctor->save();

            // store trans
            $doctor->name = $request->name;
            $doctor->appointments = implode(',', $request->appointments);
            $doctor->save();

            // insert image
            $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $doctor->id, Doctor::class);

            DB::commit();
            session()->flash('add');

            return redirect()->route('doctors.index');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        if ($request->page_id == 1) {
            if ($request->filename) {
                $this->Delete_attachment('upload_image', 'doctors/'.$request->filename, $request->id, $request->filename);
            }
            Doctor::destroy($request->id);
            session()->flash('delete');

            return redirect()->route('doctors.index');
        } else {
            $delete_all_id = explode(',', $request->delete_select_id);
            foreach ($delete_all_id as $id) {
                $doctor = Doctor::findOrFail($id);
                if ($doctor->image) {
                    $this->Delete_attachment('upload_image', 'doctors/'.$doctor->image->filename, $id, $doctor->image->filename);
                }
            }
            Doctor::destroy($delete_all_id);
            session()->flash('delete');

            return redirect()->route('doctors.index');
        }
    }
}
