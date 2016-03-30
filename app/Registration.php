<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

class Registration extends Model{
	protected $fillable = ['name', 'email','course','branch','contact','college','year','zeal_id'];
	protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $table = 'registrations';
}