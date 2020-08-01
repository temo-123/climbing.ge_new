<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public $table = 'routes';

    protected $fillable = [
    'name',
    'text',
    
    'height',
    'bolts',
    
    'numder',
    
    'gread',
    
    'last_carabin',
    
    'first_ascent',
    'bolter',
    
    'category',
    
    'stars',
    
    'sector',
    ];
}
