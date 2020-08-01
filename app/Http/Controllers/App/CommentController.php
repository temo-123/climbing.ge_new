<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comments;
use Auth;

class CommentController extends Controller
{
    public function comments(Request $request)
    {
        if ($request->actions == "add") {
            $input_name = $request -> name;
            $input_surname = $request -> surname;
            $input_email = $request -> email;
            $input_text = $request -> text;
            $input_article_id = $request -> article_id;
            if(Auth::user()) $input_user_id = Auth::user() -> id;
            else $input_user_id = null;

            $input = Comments::create([
                'name' => $input_name,
                'surname' => $input_surname,
                'email' => $input_email,
                'text' => $input_text,

                'article_id'=> $input_article_id,
                'user_id'=> $input_user_id,
            ]);

            return back()->with('status','Coomment edded.');

            // dd($request -> name. "|". $request -> surname. "|". $request -> email. "|". $request -> text);
            // echo "test comment";
        }
        elseif($request->actions == "del"){

        }
    }
}
