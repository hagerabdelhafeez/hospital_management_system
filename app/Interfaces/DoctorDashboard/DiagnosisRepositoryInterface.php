<?php

namespace App\Interfaces\DoctorDashboard;

interface DiagnosisRepositoryInterface
{
    public function store($request);

    public function show($id);
}
