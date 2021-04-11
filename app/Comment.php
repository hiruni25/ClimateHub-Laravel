<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{ 
    protected $fillable = [
    'text', 
    'post_id',
    'user_id'];
}
