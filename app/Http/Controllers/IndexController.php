<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\Article;
use App\galleries;

class IndexController extends Controller
{
	public function index(Request $request) {

        $news = Article::latest('id')->where('category', '=', 'news')->limit(6)->where('published', '=', 1)->get();
        $big_news = Article::latest('id')->where('category', '=', 'news')->limit(1)->where('published', '=', 1)->get();
        $big_news_count = Article::where('category', '=', 'news')->count();
 
        $security = Article::latest('id')->where('category', '=', 'security')->where('published', '=', 1)->get();
        $others = Article::latest('id')->where('category', '=', 'other')->limit(4)->where('published', '=', 1)->get();

        $events = Article::latest('id')->where('category', '=', 'event')->where('published', '=', 1)->where('completed', '=', 0)->limit(3)->get();


        $head_slider = galleries::where('category','=','index_header_image')->latest('id')->where('published', '=', 1)->limit(5)->get();

        $gallerys = galleries::where('category','=','index_gallery_image')->where('published', '=', 1)->inRandomOrder()->limit(12)->get();
        $tags = galleries::distinct()->where('published', '=', 1)->get(['filter', 'published']);

        // $about_us = \App\About::get();
        
        return view('blog.index', array(
            // 'menu' => $menu,
            'news' => $news,
            'big_news' => $big_news,
            'big_news_count'=> $big_news_count,
            // 'about_us' => $about_us,
            'events' => $events,
            'head_slider' => $head_slider,
            'gallerys' => $gallerys,
            'index_others' => $others,

            'tags' => $tags,
            'securities' => $security,

            'count_events' => \App\Article::where('category', '=', 'event')->where('completed', '=', 0)->count(),
            
            'num' => 0,
            'num1' => 0,
            'num2' => 0,
            'num3' => 0,
            'actyvity_num' => 0,
            'head_slider_num' => 0,
        )); 
    }
}
