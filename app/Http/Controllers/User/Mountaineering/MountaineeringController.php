<?php

namespace App\Http\Controllers\User\Mountaineering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mount;
use App\Mount_routes;

use DB;

class MountaineeringController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function execute(Request $request){
        
        $request->user()->authorizeRoles(['manager', 'admin']);
        
    	if (view()->exists('admin.layouts.article_list')) {
    		$mounts = Mount::all();
    		$mount_routes = Mount_routes::all();
    		
    // 		$sectors = DB::table('sectors')->paginate(15, ['*'], 'sectors');
    //         $routes = DB::table('routes')->paginate(15, ['*'], 'routes');
            
            // 2 pagination in 1 page
            // https://stackoverflow.com/questions/24086269/laravel-multiple-pagination-in-one-page?fbclid=IwAR3JRE9e0fStM0wvZEH5PfajaNhuOxD4k8LDdmV33O4vo3_-tVg_-xrHBng
    		
    		$route_tags = DB::table('mount_routes')->distinct()->get();
    		
    		$count_mount = Mount::count();
    		$count_mount_routes = Mount_routes::count();

    		$data = [
    			'title'=>'mounts',
    			'table_1'=>$mounts,
                'table_1_count' => $count_mount,
    		    'table_1_add_url'=>'mountAdd',
    		    'table_1_edit_url'=>'mountEdit',
    		    'table_1_name' => 'Mount',
                
                'table_2_count' => $count_mount_routes,
                'table_2_tags' => $route_tags,
                'table_2' => $mount_routes,
    		    'table_2_pablic' => '',
    		    'table_2_name' => 'Mount Route',
    		    'table_2_add_url'=>'mountRouteAdd',
    		    'table_2_edit_url'=>'mountRouteEdit',
    		    'table_2_article_url'=>'mount_page',

    		    'page_name' => 'Mount And Mount Route',
    		    'active' => 'mount',
    		];
    		return view('admin.layouts.article_list',$data);
    	}
    	abort(404);
    }
}
