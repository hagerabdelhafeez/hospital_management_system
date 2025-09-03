<?php

namespace App\Interfaces\DoctorDashboard;

interface LaboratoriesRepositoryInterface
{
    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}
