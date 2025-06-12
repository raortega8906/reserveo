<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
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

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'El servicio fue creado correctamente');
    }

    public function edit (Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update (UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Servicio actualizado correctamente');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('error', 'Servicio eliminada satisfactoriamente');
    }
}
