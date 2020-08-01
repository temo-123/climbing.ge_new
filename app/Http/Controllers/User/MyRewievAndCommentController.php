<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comments;
use App\Star_review;
use Auth;

class MyRewievAndCommentController extends Controller
{
    public function myReviewsAndComments(Request $request)
    {
        $request->user()->authorizeRoles(['manager', 'admin', 'user']);
        
    	if (view()->exists('admin.layouts.article_list')) {
    		$table_1 = Comments::where('user_id', '=', Auth::user()->id)->get();
    		$count_table_1 = Comments::count();

    		$table_2 = Star_review::where('user_id', '=', Auth::user()->id)->get();
    		$count_table_2 = Star_review::count();

    		$data = [
    			'title'=>'My Review And Coments',

    			'table_1'=>$table_1,
                'table_1_count' => $count_table_1,
    		    'table_1_name' => 'Coments',
    		    'table_1_article_url'=>'mount_page',
                
                'table_2' => $table_2,
                'table_2_count' => $count_table_2,
    		    'table_2_name' => 'Review',
    		    'table_2_article_url'=>'mount_page',

    		    'page_name' => 'Mount And Mount Route',
    		    'active' => 'mount',
    		];
    		return view('admin.layouts.article_list',$data);
    	}
    	abort(404);
    }
}
