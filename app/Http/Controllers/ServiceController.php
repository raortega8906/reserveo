<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index ()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create ()
    {
        return view('admin.services.create');
    }

    public function store (StoreServiceRequest $request) 
    {
        $validated = $request->validated();

        // dd($validated);

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'El servicio fue creado correctamente');
    }
}
