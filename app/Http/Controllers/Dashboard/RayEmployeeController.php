<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\RayEmployee\RayEmployeeRepositoryInterface;
use Illuminate\Http\Request;

class RayEmployeeController extends Controller
{
    public function __construct(private RayEmployeeRepositoryInterface $employee)
    {
    }

    public function index()
    {
        return $this->employee->index();
    }

    public function store(Request $request)
    {
        return $this->employee->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->employee->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->employee->destroy($id);
    }
}
