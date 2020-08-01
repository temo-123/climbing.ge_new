<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $table = 'abouts';

    protected $fillable = [
    	'title', 
    	'text', 
    	'description_short',
    	'image', 

    	'fb_link', 
    	'google_link', 
    	'inst_link', 
    	'twit_link',

    	'user_1',
		'user_2',

		'mail_1',
		'mail_2',

		'num_1',
		'num_2',

		'inst_1',
		'inst_2',

		'fb_1',
		'fb_2',

		'leng_1_1',
		'leng_1_2',

		'leng_2_1',
		'leng_2_2',
		
		'activity_title_1',
		'activity_title_2',
		'activity_title_3',
		'activity_title_4',
		
		'activity_text_1',
		'activity_text_2',
		'activity_text_3',
		'activity_text_4',
		
		'activity_img_1',
		'activity_img_2',
		'activity_img_3',
		'activity_img_4',
		
		'activity_link_1',
		'activity_link_2',
		'activity_link_3',
		'activity_link_4',

		'meta_title',
    	'meta_description',
    	'meta_keyword'
    ];
}
