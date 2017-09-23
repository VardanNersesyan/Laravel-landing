<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.portfolio')) {
            $portfolio = Portfolio::all();
            $data = [
                'title' => 'Portfolio',
                'portfolio' => $portfolio
            ];

            return view('admin.portfolio',$data);
        }
        abort(404);
    }
}
