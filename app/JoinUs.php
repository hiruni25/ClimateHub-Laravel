<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinUs extends Model
{
    public $timestamps = false;
    protected $fillable=[
    'name',
    'email', 
    'mobile',  
    'profession',
    'institute',
    'message'
    ];
}
