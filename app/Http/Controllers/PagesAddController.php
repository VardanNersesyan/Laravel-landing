<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagesAddRequest;
use App\Page;
use Validator;
use Illuminate\Http\Request;

class PagesAddController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.pages_add')) {
            $data = [
                'title' => 'New page'
            ];

            return view('admin.pages_add',$data);
        }
        abort(404);
    }

    public function store(PagesAddRequest $request)
    {
        $input = $request->except('_token');

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $input['images'] = time() . '.' . ltrim($file->getClientMimeType(),'image/');
            $file->move(public_path('assets/img'),$input['images']);
        }

        $page = new Page();
        $page->fill($input);
        if($page->save()) {
            return redirect('admin')->with('status','page added');
        }
    }
}
