<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    protected $fillable = ['title', 'image', 'published', 'text', 'link', 'filter'];
}
