<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable = [
        'event_id', 
        'email',
        'isVote'];
    
    protected $primaryKey = 'event_id';

}
