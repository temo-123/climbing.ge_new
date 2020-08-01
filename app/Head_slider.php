<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Head_slider extends Model
{
    public $table = 'head_sliders';

    protected $fillable = [
        'title',
        'image',
        'link',
        'mobile_image',
        'published'
    ];
}
