<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

class Events extends Model{
	protected $fillable = ['society_email', 'event_id'];
	protected $hidden = [
        'created_at', 'updated_at','remember_token',
    ];
}