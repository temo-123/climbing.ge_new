<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public $table = 'comments';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'text',
        'article_id',
        'user_id'
    ];
}
