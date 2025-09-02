<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\DoctorDashboard\DiagnosisRepositoryInterface;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    public function __construct(private DiagnosisRepositoryInterface $diagnosis)
    {
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        return $this->diagnosis->store($request);
    }

    public function show($id)
    {
        return $this->diagnosis->show($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function addReview(Request $request)
    {
        return $this->diagnosis->addReview($request);
    }

    public function destroy($id)
    {
    }
}
