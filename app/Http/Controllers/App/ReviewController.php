<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Star_review;
use App\Role;
// use App\User;
// use App\Role_user;
use DB;
use Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function review(Request $request)
    {
    	$users_roles = DB::table('role_user')->get();
		$roles = Role::get();

		$role = Auth::user()->hasRole('admin');
		foreach ($users_roles as $user_role) {
	    	if (Auth::user() -> id == $user_role -> user_id) {
    			$role_array = array();
	    		if ($role == true) {
	    			$input_value = "1";
	    			array_push($role_array, ["user_name"=>Auth::user() -> name, "user_role"=>"admin", "value"=>$input_value]);
	    		}
	    		else{
	    			$input_value = "2";
	    			array_push($role_array, ["user_name"=>Auth::user() -> name, "user_role"=>"user", "value"=>$input_value]);
	    		}
	    	}
		}
		foreach ($role_array as $role_value) { $input_value = $role_value['value']; }

        $input_category = $request -> category;

        $input_star = $request -> Star_Rating_of_5_stars;
        $input_article_id = $request -> article_id;
        if(Auth::user()) $input_user_id = Auth::user() -> id;
        else $input_user_id = null;

        $input = Star_review::create([
            'category' => $input_category,
            'stars' => $input_star,
            'review_value' => $input_value,

            'article_id'=> $input_article_id,
            'user_id'=> $input_user_id,
        ]);

        return back()->with('status','Review edded.');
    }
}
