<?php
namespace App\Http\Controllers;
use Session;
use App\User;
use App\Events;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends BaseController{
	public function root(){
		if(\Auth::check()){
			return view('add_event');
		}else{
			if(Session::get('err') == '1'){
				return view('back_office_login', ['err'=>"Oh daiiumm!! Email and password aren't compatible"]);
			}else{
				return view('back_office_login', ['err'=>'']);
			}
		}
	}

	public function add_society(){
		$user = User::where('email', Session::get('email'))->first();

		if( \Auth::check() && $user->priviliges == 1){
			return view('add_society');
		}else{
			return redirect('/');
		}
	}

	public function event_approval(){
		$user = User::where('email', Session::get('email'))->first();

		if( \Auth::check() && $user->priviliges == 1){
			return view('event_approval');
		}else{
			return redirect('/');
		}
	}

	public function view_events(){
		$user = User::where('email', Session::get('email'))->first();

		if( \Auth::check()){
			if ($user->priviliges == 1){
				$societies = User::all();
				$events = [];
				foreach ($societies as  $value) {
					$events_des = User::where('email', $value['email'])
								->join('events','events.society_email', '=', 'users.email')
								->join('event_details', 'events.event_id', '=', 'event_details.event_id')
								->select('events.event_id', 'event_details.event_name', 
									'event_details.event_description','event_details.approved')
								->get();

					array_push($events, array('society_name'=>$value['society'], 'society_events'=>$events_des));
				}

				return view('view_event', array('societies'=> $events));
			}else{
				return view('view_event');
			}
		}else{
			return redirect('/');
		}
	}



}