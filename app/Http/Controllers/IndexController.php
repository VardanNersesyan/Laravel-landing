<?php

namespace App\Http\Controllers;

use App\Mail\MailClass;
use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;
use Illuminate\Support\Facades\DB;
use Mail;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function execute(Request $request)
    {
        if( $request->isMethod('post') ) {

            $this->validate($request,[
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'text'  => 'required'
            ]);

            $data = $request->all();

            if( Mail::to(env('MAIL_ADMIN'))
                ->send(new MailClass($data['name'],$data['email'],$data['text'])) ) {

                return redirect()->route('home')->with('status', 'email is send');
            }
        }

        $pages = Page::all();
        $portfolios = Portfolio::all();/*Portfolio::get(['name','filter','images']);*/
        $services = Service::all();/*Service::where('id','<',20)->get();*/
        $peoples = People::all();/*People::take(3)->get();*/
        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        $menu = [];
        foreach ($pages as $page) {
            $item = [
                'title'=>$page->name,
                'alias'=>$page->alias
            ];
            array_push($menu,$item);
        }

        $item = [
            'title'=>'Services',
            'alias'=>'service'
        ];
        array_push($menu,$item);

        $item = [
            'title'=>'Portfolio',
            'alias'=>'Portfolio'
        ];
        array_push($menu,$item);

        $item = [
            'title'=>'Team',
            'alias'=>'team'
        ];
        array_push($menu,$item);

        $item = [
            'title'=>'Contact',
            'alias'=>'contact'
        ];
        array_push($menu,$item);

        return view('site.index',[
            'menu'     => $menu,
            'pages'    => $pages,
            'services' => $services,
            'portfolios'=> $portfolios,
            'peoples'  => $peoples,
            'tags'     => $tags
        ]);
    }
}
