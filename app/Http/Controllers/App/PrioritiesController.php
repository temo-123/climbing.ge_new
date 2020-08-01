<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Interested_Events;
use App\Favorite_products;
use Auth;

class PrioritiesController extends Controller
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


    public function events_interes(Request $request, $events_id)
    {
        $request->user()->authorizeRoles(['user', 'manager', 'admin']);

    	if ($request->actions == "add") {
            $input_events_id = $request -> events_id;
            $input_user_id = Auth::user() -> id;

            $input = Interested_Events::create([
                'article_id'=> $input_events_id,
                'user_id'=> $input_user_id,
            ]);
            return back()->with('status','This event added to your priority events list.');
        }
    	elseif ($request->actions == "del") {
            $interested_events = Interested_Events::where("article_id","=",$events_id)->where ("user_id","=",Auth::user() -> id);
            $interested_events->delete();
            return back()->with('status','This event deleted from your priority events list.');
    	}
    }

    public function favorite_product(Request $request, $product_id)
    {
    	if ($request->actions == "add") {
            $input_events_id = $request -> product_id;
            $input_user_id = Auth::user() -> id;

            $input = Favorite_products::create([
                'product_id'=> $input_events_id,
                'user_id'=> $input_user_id,
            ]);
            return back()->with('status','This event added to your priority events list.');
    	}
    	elseif ($request->actions == "del") {
            $interested_events = Favorite_products::where("product_id","=",$product_id)->where ("user_id","=",Auth::user() -> id);
            $interested_events->delete();
            return back()->with('status','This event deleted from your priority events list.');
    	}
    }
}
