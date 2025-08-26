<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmbulanceRequest;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    public function __construct(private AmbulanceRepositoryInterface $Ambulance)
    {
    }

    public function index()
    {
        return $this->Ambulance->index();
    }

    public function create()
    {
        return $this->Ambulance->create();
    }

    public function store(StoreAmbulanceRequest $request)
    {
        return $this->Ambulance->store($request);
    }

    public function edit($id)
    {
        return $this->Ambulance->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Ambulance->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Ambulance->destroy($request);
    }
}
