<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTC extends Model
{
    protected $table = 'ctc';
    public $timestamps = false;

    /**
     * Get the society that owns the event.
     */
    public function society()
    {
        return $this->belongsTo('App\Society', 'society_id');
    }
}
