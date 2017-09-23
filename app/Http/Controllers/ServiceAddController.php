<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceAddRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceAddController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.service_add')) {
            $data = [
                'title' => 'New service item'
            ];

            return view('admin.service_add',$data);
        }
        abort(404);
    }

    public function store(ServiceAddRequest $request)
    {
        $input = $request->except('_token');

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $input['images'] = time() . '.' . ltrim($file->getClientMimeType(),'image/');
            $file->move(public_path('assets/img'),$input['images']);
        }

        $service = new Service();
        $service->fill($input);
        if($service->save()) {
            return redirect('admin')->with('status','service item added');
        }
    }
}
