<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    /**
     * Get the events of the society.
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'category_id');
    }
}
