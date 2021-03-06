<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = [
            'name', 'description', 'society_id', 'winner1', 'winner2', 'contact_name', 'contact_no', 'is_active'
        ];
    /**
     * Get the society that owns the event.
     */
    public function society()
    {
        return $this->belongsTo('App\Society', 'society_id');
    }
    /**
     * Get the Categories of the event.
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    /**
     * Get the winners of the event.
     */
    public function winners()
    {
        return $this->hasMany('App\Winner', 'event_id');
    }
    /**
     * Get the files of the event.
     */
    public function files()
    {
        return $this->hasMany('App\File', 'event_id');
    }
}
