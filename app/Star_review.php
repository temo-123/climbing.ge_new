<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star_review extends Model
{
    public $table = 'star_reviews';

    protected $fillable = [
    	'stars',
    	'review_value',
    	'category',
    	'article_id', 
		'user_id',
    ];
}
