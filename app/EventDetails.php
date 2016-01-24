<?php
namespace App;

use Illuminate\Database\Eloquent\Model as Model;
class EventDetails extends Model{
	protected $fillable = ['event_name','event_description', 
	'event_id', '1st_place', '2nd_place', 
	'3rd_place', 'rules', 'timing', 'approved'];
	protected $hidden = [
	'created_at', 'updated_at','remember_token',
	];
}