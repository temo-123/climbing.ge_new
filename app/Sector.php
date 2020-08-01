<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public $table = 'sectors';

    protected $fillable = [
	'name',
	'filtr_name',
    'region',
    'text',
    'image_1',
    'image_2',
    'image_3',
    'image_4',
    'image_height'
];
}
