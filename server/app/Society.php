<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Society extends Authenticatable
{
    protected $table = 'society';
    public $timestamps = false;
}
