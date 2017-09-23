<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.services')) {
            $services = Service::all();
            $data = [
                'title' => 'Service',
                'services' => $services
            ];

            return view('admin.services',$data);
        }
        abort(404);
    }
}
