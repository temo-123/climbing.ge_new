<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtp extends Model
{
    protected $fillable = [
        'sector',
        'name',
        'filtr_name',
        'text',
        'pitch',
        'bolter',
        'first_ascent',
    ];
}
