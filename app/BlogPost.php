<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'blog_title', 
        'content', 
        'image_file',
        'visible',
        'user_id'];
}
