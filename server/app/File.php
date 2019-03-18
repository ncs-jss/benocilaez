<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $timestamps = false;
    /**
     * Get the event whoes file is this.
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}
