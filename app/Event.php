<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    'title', 
    'description', 
    'sdate', 
    'edate', 
    'venue', 
    'recurrence', 
    'partcipantType',
    'isPoll',
    'admin_id'
];

}
