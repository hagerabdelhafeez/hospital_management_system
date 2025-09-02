<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\DoctorDashboard\RaysRepositoryInterface;
use Illuminate\Http\Request;

class RayController extends Controller
{
    public function __construct(private RaysRepositoryInterface $ray)
    {
    }

    public function store(Request $request)
    {
        return $this->ray->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->ray->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->ray->destroy($id);
    }
}
