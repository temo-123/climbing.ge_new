<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use App\Article;
use App\Mount_routes;

class SearchController extends Controller
{
 public function index()
    {
		// From - https://justlaravel.com/search-functionality-laravel/
		
	    $q = Input::get('q');
	    if ($q != "") {
		    $outdoor = Article::where('published', '=', 1)->where('category', '=', 'outdoor')->orWhere('short_description', 'LIKE', '%'.$q.'%')->get();
		    $indoor = Article::where('published', '=', 1)->where('category', '=', 'indoor')->orWhere('short_description', 'LIKE', '%'.$q.'%')->get();
		    $ice = Article::where('published', '=', 1)->where('category', '=', 'ice')->orWhere('short_description', 'LIKE', '%'.$q.'%')->get();
		    $other = Article::where('published', '=', 1)->where('category', '=', 'other')->orWhere('short_description', 'LIKE', '%'.$q.'%')->get();

		    $event = Article::where('published', '=', 1)->where('completed', '=', 0)->where('category', '=', 'event')->orWhere('short_description', 'LIKE', '%'.$q.'%')->get();
		    
		    $mount = Mount_routes::Where('short_description', 'LIKE', '%'.$q.'%')->orWhere('meta_keyword', 'LIKE', '%'.$q.'%')->get();
            
	        return view(
    	                'blog.search', 
                        array(
                            'num_1' => 1,
                            'num_2' => 1,
                            'num_3' => 1,
                            'num_4' => 1,
                            'num_5' => 1,
                            'search' => 0
                            )
                        )
    	        
                        ->withIndoors($indoor)
                        ->withOutdoors($outdoor)
                        ->withMounts($mount)
                        ->withIces($ice)
                        ->withOthers($other)
                        ->withEvents($event)
    	                ->withQuery($q);
	    } 	
	    else return view ( 'blog.search' )->withMessage ( 'No Details found. Try to search again !' );
    }
}


