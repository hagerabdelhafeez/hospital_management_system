<?php

namespace App\Interfaces\DoctorDashboard;

interface RaysRepositoryInterface
{
    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}
