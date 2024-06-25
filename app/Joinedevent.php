<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Joinedevent extends Model
{
    //
    use Notifiable;

    /**
     * Set table to app
     *
     * @var table
     */
    protected $table = 'joinedevents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'event_id', 'status','invoice','SKPPL_type','SKPPL',
    ];

}
