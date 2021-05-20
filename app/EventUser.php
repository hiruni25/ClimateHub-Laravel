<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable = [
        'event_id', 
        'user_id',
        'isVote'];
    
    protected $primaryKey = 'event_id';

}
