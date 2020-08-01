<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return view('admin/home');
        $request->user()->authorizeRoles(['manager', 'admin', 'user']);
        
        $data = [

            'abouts' => About::latest('id')->limit(5)->get(),
            
            'page_name'=>'Home',
        ];
        return view('admin.home',$data); 
    }
}
