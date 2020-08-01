<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mount extends Model
{
     public $table = 'mounts';

	protected $fillable = [
    'name',
    'filter_name',
    'description_short',
    'map',
    'text', 
    'how_get',
    'weather',
    'best_time',
    ]; 
}
