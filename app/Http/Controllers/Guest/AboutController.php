<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function about(Request $request)
    {
    	if (view()->exists('blog.about')) {
        	$pages = \App\About::all();
    
            $partners = \App\Article::latest('id')->where('category', '=', 'partner')->where('published','=','1')->get();
            $partners_count = \App\Article::latest('id')->where('category', '=', 'partner')->where('published','=','1')->count();
    
            return view('blog.about', array(
                'pages'=>$pages,
                'partners' => $partners,
                'partners_count' => $partners_count,
                'thurs_num' => 0,
                
                'article_edit_link'=>'aboutEdit',
            )); 
        }
        abort(404);
    }
}
