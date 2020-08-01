<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;

class ArticlesController extends Controller
{
	public function index(Request $request)
    {
        
        $request->user()->authorizeRoles(['manager', 'admin']);
        
    	if (view()->exists('admin.layouts.article_list')) {
            if ($request->article_category == "outdoor") {
                $articles = Article::latest('id')->where('category', '=', 'outdoor')->get();
                $title = 'Outdoor';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'outdoor';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }
            elseif ($request->article_category == "indoor") {
                $articles = Article::latest('id')->where('category', '=', 'indoor')->get();
                $title = 'Indoor';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'indoor';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }
            elseif ($request->article_category == "ice") {
                $articles = Article::latest('id')->where('category', '=', 'ice')->get();
                $title = 'Ice & Mixed';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'ice';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }
            elseif ($request->article_category == "news") {
                $articles = Article::latest('id')->where('category', '=', 'news')->get();
                $title = 'News';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'news';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }
            elseif ($request->article_category == "other") {
                $articles = Article::latest('id')->where('category', '=', 'other')->get();
                $title = 'Other';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'other';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }
            elseif ($request->article_category == "security") {
                $articles = Article::latest('id')->where('category', '=', 'security')->get();
                $title = 'Security';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'security';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }
            elseif ($request->article_category == "partners") {
                $articles = Article::latest('id')->where('category', '=', 'partners')->get();
                $title = 'Partners';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'partner';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }
            elseif ($request->article_category == "events") {
                $articles = Article::latest('id')->where('category', '=', 'events')->get();
                $title = 'Events';
                $page_name = $title;
                $table_1_name = $title;
                $articles_add_url = 'article_add';
                $article_add_category = 'event';
                $articles_edit_url = 'article_edit';
                $article_page_utl = 'index';
            }

    		$data = [
    			'title'=>$title,
    			'table_1'=>$articles,

    		    'table_1_add_url'=>$articles_add_url,
                'table_1_add_category'=>$article_add_category,
        	    'table_1_edit_url'=>$articles_edit_url,
    		    'table_1_article_url'=>$article_page_utl,
    		    'table_1_title'=>'1',
    		    'table_1_pablic' => '',
    		    'table_1_name'=> $table_1_name,
    		    
    		    'page_name' => $page_name,
    		    'active' => 'Outdoor',
    		    'page_route' => 'outdoor_page',

    		];
    		return view('admin.layouts.article_list',$data);
    	}
    	abort(404);	}

	public function add(Request $request)
	{
        $request->user()->authorizeRoles(['manager', 'admin']);
        
        if ($request -> isMethod('post')) {
            $input = $request -> except('_token');

            // $validator = validator::make($input, [
            //     'title' => 'required|max:190',
            //     'image' => 'required',
            //     'text' => 'max:500',
            // ]);
            // if ($validator->fails()) {
            //     return back() -> withErrors($validator) -> withInput();
            // }

            if ($request->hasFile('image')) {
                
                $file = $request -> file('image');
                $input['image'] = $file -> getClientOriginalName();

                $file -> move(public_path().'/assets/img/gallery_img/', $input['image']);
            }

            $gallery = new gallery();
            $gallery -> fill($input);

            if ($gallery->save()) {
                return redirect('user/gallery') -> with('status', 'gallery addid'); //text
            }
        }

        if (view() -> exists('admin.components.form')) {
            $data=[
                'title' => 'New gallery',
                'back_btn' => 'home',
                'add_title' => 'Add gallery',
                'add_active' => 'Add gallery',
                
                'add_form' => 'galleryAdd',
                
                'url_title' => 1,
                'text' => 1, 
                'published'=>'1',
                'link'=>'1',
                'gallery_filtr'=>'1',
                
                'image' => 'gallery_img',
            ];
            return view('admin.components.form', $data);
        }
        abort(404);
	}

	public function edit(gallery $gallery, Request $request)
    {
        
        $request->user()->authorizeRoles(['manager', 'admin']);
        
        if ($request->isMethod('delete')) {
            $gallery ->delete();
            return back()->with('status', 'gallery delited'); //text
        }

        if ($request->isMethod('post')) {
            $input = $request -> except('_token');
    
            // $validator = validator::make($input, [
            //     'title' => 'required|max:190',
            //     'text' => 'max:500'
            // ]);
            // if ($validator->fails()) {
            //     return back() -> withErrors($validator) -> withInput();
            // }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file -> move(public_path().'/assets/img/gallery_img/',$file->getClientOriginalName());
                $input['image'] = $file->getClientOriginalName();
            }
            else {
                $input['image'] = $input['old_image'];
            }

            unset($input ['old_image']);
            $gallery -> fill($input);

            if ($gallery->update()) {
                return redirect('user/gallery')->with('status','gallery updated'); //text
            }
        }

        $old = $gallery -> toArray();

        if (view()->exists('admin.components.form')) {
            $data = [
                'title' => 'Edit gallery - '.$old['title'],
                'data' => $old,
                'back_btn' => 'home',
                'edit_title' => 'Edit gallery',
                'edit_active' => 'Edit gallery',
                
                'edit_form' => 'home',
                
                'url_title' => 1,
                'text' => 1, 
                'published'=>'1',
                'link'=>'1',
                'gallery_filtr'=>'1',
                
                'image' => 'gallery_img',
            ];
            return view('admin.components.form', $data);
        }
	}

	public function delete()
	{
		# code...
	}
}
