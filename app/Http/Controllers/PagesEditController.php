<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagesDelRequest;
use App\Http\Requests\PagesEditRequest;
use App\Page;
use File;
use Validator;
use Illuminate\Http\Request;


class PagesEditController extends Controller
{
    public function execute(Page $page)
    {
        $old = $page->toArray();

        if(view()->exists('admin.pages_edit')) {
            $data = [
              'title' => 'Edit page - ' . $old['name'],
              'data'  => $old
            ];

            return view('admin.pages_edit',$data);
        }

        abort(404);
    }

    public function store(Page $page, PagesEditRequest $request)
    {
        $input = $request->except('_token');

        if($request->hasFile('images')) {
            File::delete(public_path('assets/img/') . $input['old_images']);
            $file = $request->file('images');
            $input['images'] = time() . '.' . ltrim($file->getClientMimeType(),'image/');
            $file->move(public_path('assets/img'), $input['images'] );
        }
        else {
            $input['images'] = $input['old_images'];
        }

        unset($input['old_images']);

        $page->fill($input);
        if($page->update()) {
            return redirect('admin')->with('status','Page is updated');
        }

    }

    public function del(Page $page, PagesDelRequest $request)
    {
        File::delete(public_path('assets/img/') . $page->images);
        $page->delete();
        return redirect('admin')->with('status','Page was deleted');
    }
}
