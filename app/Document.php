<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'author',
        'title',
        'content',
        'ctime',
        'mtime',
        'content',
        'hashtag',
        'status'
    ];
}
