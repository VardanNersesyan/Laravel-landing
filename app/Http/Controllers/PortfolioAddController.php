<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioAddRequest;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioAddController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.portfolio_add')) {
            $data = [
                'title' => 'New portfolio item'
            ];

            return view('admin.portfolio_add',$data);
        }
        abort(404);
    }

    public function store(PortfolioAddRequest $request)
    {
        $input = $request->except('_token');

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $input['images'] = time() . '.' . ltrim($file->getClientMimeType(),'image/');
            $file->move(public_path('assets/img'),$input['images']);
        }

        $portfolio = new Portfolio();
        $portfolio->fill($input);
        if($portfolio->save()) {
            return redirect('admin')->with('status','portfolio item added');
        }
    }
}
