<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index ()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.services.index', compact('services'));
    }
}
