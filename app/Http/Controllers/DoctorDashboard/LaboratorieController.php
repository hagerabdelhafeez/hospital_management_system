<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\DoctorDashboard\LaboratoriesRepositoryInterface;
use Illuminate\Http\Request;

class LaboratorieController extends Controller
{
    public function __construct(private LaboratoriesRepositoryInterface $laboratorie)
    {
    }

    public function store(Request $request)
    {
        return $this->laboratorie->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->laboratorie->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->laboratorie->destroy($id);
    }
}
