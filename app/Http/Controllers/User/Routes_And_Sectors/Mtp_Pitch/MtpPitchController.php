<?php

namespace App\Http\Controllers\User\Routes_And_Sectors\Mtp_Pitch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Route;
use Validator;

use DB;

class MtpPitchController extends Controller
{
    public function add(Request $request)
    {
		$request->user()->authorizeRoles(['manager', 'admin']);
        
        if ($request -> isMethod('post')) {
            $input = $request -> except('_token');

            // $validator = validator::make($input, [
            //     'name' => 'required|max:190'
            // ]);
            // if ($validator->fails()) {
            //     return redirect() -> route('routes_and_sectors') -> withErrors($validator) -> withInput();
            // }   
            
            $route = new route();
            $route -> fill($input);

            if ($route->save()) {
                return redirect('user/routes_and_sectors') -> with('status', 'route addid'); //text
            }
        }
    	if (view() -> exists('admin.routes_and_sectors.route.route_add')) {
    	    
            $tags = DB::table('sectors')->distinct()->get(['region']);
            
            $indoor_sectors = \App\Sector::all();
            $route_images = \App\Route::all();
            $mtps = \App\Mtp::all();
            
    		$data=[
    			'title' => 'New route',
    			
    			'indoor_sectors'=>$indoor_sectors,
    			'route_images'=>$route_images,
    			'mtps'=>$mtps,
    			
    			'tags' => $tags
    		];
    		
    		
    		return view('admin.routes_and_sectors.mtp_pitch.mtp_pitch_add', $data);
    	}
    	abort(404);
    }
}
