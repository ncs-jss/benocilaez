<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Society extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'society';
    public $timestamps = false;

    /**
     * Get the events of the society.
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'society_id');
    }

    /**
     * Get the members of the society.
     */
    public function members()
    {
        return $this->hasMany('App\Member', 'society_id');
    }
}
