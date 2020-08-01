<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Galleries;

class GalleriesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['manager', 'admin']);
        
    	if (view()->exists('admin.layouts.article_list')) {
    		if ($request->gallery_category = 'article_gallery') {
    			$gallerys = Galleries::where('category','=','article_image')->get();
    		}
    		elseif ($request->gallery_category = 'index_header') {
    			$gallerys = Galleries::where('category','=','index_header_image')->get();
    		}
    		elseif ($request->gallery_category = 'index_gallery') {
    			$gallerys = Galleries::where('category','=','index_gallery_image')->get();
    		}


    		$data = [
    			'title'=>'gallerys',
    			'table_1'=>$gallerys,
    		    'table_1_add_url'=>'galleryAdd',
    		    'table_1_edit_url'=>'galleryEdit',
    		  //  'table_1_article_url'=>'indoor_page',
    		    'table_1_title'=>'1',
    		    'table_1_name'=>'Gallery',
    		    'table_1_pablic'=>'1',
    		    
    		    'page_name' => 'Gallery',
    		    'active' => 'Gallery',
    		    'page_route' => 'indoor_page',
    		    
    		    'image_open'=>1,
    		    'image_dir'=>'gallery_img',
    		    'num_1' => 0,
    		    'num_2' => 0,
    		    
    		];
    		return view('admin.layouts.article_list',$data);
    	}
    	abort(404);
    }
}
