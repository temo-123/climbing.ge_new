<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;
use App\Interested_Events;

class EventsController extends Controller
{
    public function events_page($name){
        if (!$name) {
            abort(404);
        }
        if (view()->exists('blog.events_page')) {
            $events = Article::where('category', '=', 'event')->where('url_title',strip_tags($name))->first();
            $event_id = $events->id;
            $interested = Interested_Events::where('article_id', '=', $event_id)->get();
            // dd($interested);
            $data  = [
                'title'=>$events->title,
                'events'=>$events,
                'interested'=>$interested
            ];
            return view('blog.events_page',$data);
        }
        else{
            abort(404);
        }
    }
}
