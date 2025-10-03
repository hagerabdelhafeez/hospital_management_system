<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentConfirmation;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;

class AppointmentsController extends Controller
{
    public function index() {
        $appointments = Appointment::where('type', 'غير مؤكد')->get();
        return view('dashboard.appointments.index', compact('appointments'));
    }

    public function index2() {
        $appointments = Appointment::where('type', 'مؤكد')->get();
        return view('dashboard.appointments.index2', compact('appointments'));
    }

    public function approval(Request $request, $id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'type' => 'مؤكد',
            'appointment_date' => $request->appointment_date,
        ]);
        Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name, $appointment->appointment_date));
        session()->flash('add');
        return redirect()->back();
    }


}
