<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interested_Events extends Model
{
    public $table = 'interested_events';
    
	protected $fillable = [
    	'article_id', 
		'user_id',
    ];
}
