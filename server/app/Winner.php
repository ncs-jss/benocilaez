<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    public $timestamps = false;

    /**
     * Get the event whoes winner is this.
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}
