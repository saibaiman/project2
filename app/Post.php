<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $filleable = [
        'user_id',
        'class_id',
        'body',
        'image',
    ];

    protected $guarded = [
        'id',
        'deleted_at'
    ];
}
