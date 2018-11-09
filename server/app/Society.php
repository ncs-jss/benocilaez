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
     * Get the events fof the society.
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'society_id');
    }

    /**
     * Get the CTCs of the society.
     */
    public function ctc()
    {
        return $this->hasMany('App\CTC', 'society_id');
    }
}
