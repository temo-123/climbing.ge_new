<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;
use App\Comments;
use App\Galleries;

class PartnersController extends Controller
{
    public function partners_page($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('blog.article_page')) {
            $partners = Article::latest('id')->where('category', '=', 'partner')->where('url_title',strip_tags($name))->first();
            
            $partners_id = $partners->id;
            
            $article_gallery = Galleries::where('article_id',strip_tags($partners_id))->limit(8)->get();
            $comments = Comments::where('article_id',strip_tags($partners_id))->get();
            $other_list = Article::where('category', '=', 'partner')->where('published','=','1')->inRandomOrder()->limit(6)->get();;
                
            $data  = [
                'title'=>$partners->name,
                'article'=>$partners,
                
                'articles_gallery'=>$article_gallery,
                'comments'=>$comments,
                
                'image_dir' => 'partners_img',
                'slider_link'=>'gallery_img/partnersr_img/',
                'all_article_but'=>'about',
                'article_map'=>'partners',
                
                'article_edit_link'=>'partnersEdit',

                'other_article'=>$other_list,
                'other_article_link'=>'partners_page',
                'other_article_img'=>'images/partners_img/',
                
                // 'article'=>$article
            ];
            return view('blog.article_page',$data);
        }
        else{
            abort(404);
        }
    }
}
