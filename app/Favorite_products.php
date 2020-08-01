<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite_products extends Model
{
    // public $table = 'favorite_products';
    
    protected $fillable = [
    	'product_id', 
		'user_id',
    ];
}
