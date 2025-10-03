<?php

namespace App\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use Livewire\Component;

class Create extends Component
{
    public $sections;
    public $doctors;
    public $doctor;
    public $section;
    public $name;
    public $email;
    public $phone;
    public $notes;
    public $message = false;
    public $message2 = false;
    public $appointment_patient;

    public function mount()
    {
        $this->sections = Section::all();
        $this->doctors = collect();
    }

    public function updatedSection($section_id)
    {
        $this->doctors = Doctor::where('section_id', $section_id)->get();
    }

    public function store()
    {
        // chek number_of_statements

        $appointment_count = Appointment::where('doctor_id', $this->doctor)->where('type', 'غير مؤكد')->where('appointment_patient', $this->appointment_patient)->count();
        $doctor_info = Doctor::find($this->doctor);

        if ($appointment_count == $doctor_info->number_of_patients) {
            $this->message2 = true;
            return back();
        }
        $appointments = new Appointment();
        $appointments->name = $this->name;
        $appointments->email = $this->email;
        $appointments->phone = $this->phone;
        $appointments->notes = $this->notes;
        $appointments->doctor_id = $this->doctor;
        $appointments->section_id = $this->section;
        $appointments->appointment_patient = $this->appointment_patient;
        $appointments->save();
        $this->message = true;
        $this->resetInputFields();
    }

    public function render()
    {
        return view('livewire.appointments.create', [
            'sections' => Section::all(),
        ]);
    }
}
