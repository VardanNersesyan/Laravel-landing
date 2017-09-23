<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceDelRequest;
use App\Http\Requests\ServiceEditRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceEditController extends Controller
{
    public function execute(Service $service)
    {
        $old = $service->toArray();

        if(view()->exists('admin.services_edit')) {
            $data = [
                'title' => 'Edit service item - ' . $old['name'],
                'data'  => $old
            ];

            return view('admin.services_edit',$data);
        }

        abort(404);
    }

    public function store(Service $service, ServiceEditRequest $request)
    {
        $input = $request->except('_token');

        $service->fill($input);
        if($service->update()) {
            return redirect('admin')->with('status','Service item is updated');
        }

    }

    public function del(Service $service, ServiceDelRequest $request)
    {
        $service->delete();
        return redirect('admin')->with('status','Service item deleted');
    }
}
