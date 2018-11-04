<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    /**
     * Get the society that owns the event.
     */
    public function society()
    {
        return $this->belongsTo('App\Society', 'society_id');
    }

    /**
     * Get the winners fof the event.
     */
    public function winners()
    {
        return $this->hasMany('App\Winner', 'event_id');
    }
}
