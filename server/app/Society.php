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
}
