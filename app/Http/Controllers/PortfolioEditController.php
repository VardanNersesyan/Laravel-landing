<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioDelRequest;
use App\Http\Requests\PortfolioEditRequest;
use App\Portfolio;
use File;
use Illuminate\Http\Request;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio)
    {
        $old = $portfolio->toArray();

        if(view()->exists('admin.portfolio_edit')) {
            $data = [
                'title' => 'Edit portfolio item - ' . $old['name'],
                'data'  => $old
            ];

            return view('admin.portfolio_edit',$data);
        }

        abort(404);
    }

    public function store(Portfolio $portfolio, PortfolioEditRequest $request)
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

        $portfolio->fill($input);
        if($portfolio->update()) {
            return redirect('admin')->with('status','Portfolio item is updated');
        }

    }

    public function del(Portfolio $portfolio, PortfolioDelRequest $request)
    {
        File::delete(public_path('assets/img/') . $portfolio->images);
        $portfolio->delete();
        return redirect('admin')->with('status','Portfolio item was deleted');
    }
}
