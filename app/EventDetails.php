<?php
namespace App;

use Illuminate\Database\Eloquent\Model as Model;
class EventDetails extends Model{
	protected $fillable = ['event_name','event_description', 
	'event_id', 'prize_money', 'timing', 'approved', 'attachment', 'long_des', 'rules','first_place','second_place','grp'];
	protected $hidden = [
	'created_at', 'updated_at','remember_token',
	];
}	