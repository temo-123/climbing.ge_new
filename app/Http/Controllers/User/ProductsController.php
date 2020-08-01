<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Favorite_products;
use Auth;

class ProductsController extends Controller
{
    public function index()
    {
    	if (view()->exists('admin.layouts.products_list')) {
    		$products = product::latest('id')->where('user_id', '=', Auth::user()->id)->get();
            $products_count = product::count();
            $favorite_products = Favorite_products::get();
            // dd($products[1]->title);
            $tags = product::get();
            $tags_count = product::count();

            $price_array = array();
            foreach ($products as $product) {
                if ($product->discount != null) {
                    $old_price = $product->price;
                    $sale = $product->discount;
                    $price_x_sale = $sale * $old_price;
                    $var_1 = $price_x_sale/100;
                    $new_price = $old_price - $var_1;
                    // dd($products[0]);
                    array_push($price_array, ['product_id'=>$product->id, 'old_price'=>$old_price, 'sale'=>$sale, 'new_price'=>$new_price]);
                }
                else{
                    array_push($price_array, ['product_id'=>$product->id, 'old_price'=>$old_price, 'sale'=>'0', 'new_price'=>$old_price]);
                }
            }            

            $favorite_products_array = array();
            foreach ($favorite_products as $favorite) {
                array_push($favorite_products_array, ['favorite_id'=>$favorite->id, 'favorite_product_id'=> $favorite->product_id, 'user_id'=>$favorite->user_id]);
            }
            // dd($favorite_products_array);
            // foreach ($price_array as $price) {
            //     print_r($price['product_id']);
            //     echo "<hr />";
            // }
            // dd($price_array);
            // dd($products[0]);
            // array_push($products, $price_array);
            // if ($x > 0) {
            //     $new_price = 0;
            // }

    		$data = [
    			'title'=>'Shop',
    			'products'=>$products,
                'products_count'=>$products_count,
                'favorite_products_array'=>$favorite_products_array,
                'tags'=>$tags,
                'tags_count'=>$tags_count,
                'page_name'=>'Products',

                'price_array'=>$price_array,
                'loop_num_var' => 0,

    			'shop'=>1,
                'num' => 1,
                
                'articles_link' => 'other_page',
                'image_dir' => 'shop_img',
    		];
    		return view('admin.layouts.products_list',$data);
    	}
    	abort(404);
    }
    public function store()
    {
    	echo "store";
    }
    public function edit()
    {
    	echo "edit";
    }
    public function favorite()
    {
    	echo "favorite";
    }
}
