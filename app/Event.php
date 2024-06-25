<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    //
    use Notifiable;

    /**
     * Set table to app
     *
     * @var table
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name', 'event_category', 'price_int','price_ext','quota','event_start','event_end','description','attachment','SKPPL_type','SKPPL','place',
    ];
}
