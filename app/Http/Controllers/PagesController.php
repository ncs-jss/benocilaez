<?php
namespace App\Http\Controllers;
use Session;
use App\User;
use App\Events;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends BaseController{
	public function root(){
		if(\Auth::check()){
			$user = User::where('email', Session::get('email'))->first();
			return view('add_event', ['society'=>$user->society,'admin'=>$user->priviliges, 'action'=>'Add Event', 'err'=>'']);
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
			return view('add_society', array('admin'=>1, 'society'=>$user->society, 'action'=> 'Add Society'));
		}else{
			return Redirect::route('root');
		}
	}

	public function event_approval(){
		if( \Auth::check() && $user->priviliges == 1){
			$user = User::where('email', Session::get('email'))->first();
			return view('event_approval');
		}else{
			return Redirect::route('root');
		}
	}

	public function view_events(){
		if( \Auth::check()){
			$user = User::where('email', Session::get('email'))->first();
			if ($user->priviliges == 1){
				$societies = User::all();
				$events = [];
				foreach ($societies as  $value) {
					$events_des = User::where('email', $value['email'])
					->join('events','events.society_email', '=', 'users.email')
					->leftjoin('event_details', 'events.event_id', '=', 'event_details.event_id')
					->select('events.event_id', 'event_details.event_name', 
						'event_details.event_description','event_details.approved')
					->get();

					array_push($events, array('society_name'=>$value['society'], 'society_events'=>$events_des));
				}

				return view('view_event', array('society'=>$user->society, 'action'=>'View Events', 
					'societies'=> $events, 'accessor'=> $user->society, 'admin'=> 1));
			}else{
				$events= [];
				$event_des = User::where('email', 'quanta@quanta.com')
				->join('events','events.society_email', '=', 'users.email')
				->leftjoin('event_details', 'events.event_id', '=', 'event_details.event_id')
				->select('users.society', 'events.event_id', 'event_details.event_name', 
					'event_details.event_description','event_details.approved')
				->get();
				array_push($events, array('society_name'=>$user->society, 'society_events'=>$event_des));
				return view('view_event', array('society'=>$user->society, 'action'=>'View Events', 
					'societies'=> $events, 'accessor'=> $user->society, 'admin'=> 0));
			}
		}else{
			return Redirect::route('root');
		}
	}

	public function add_event(){
		if(\Auth::check()){
			$user = User::where('email', Session::get('email'))->first();
			if(Session::get('success') == 1){
				return view('add_event', array('society'=>$user->society, 'admin'=>$user->priviliges, 'action'=>'Add Event', 'err'=>'Event created Successfully!!'));
			}else{
				return view('add_event', array('society'=>$user->society, 'admin'=>$user->priviliges, 'action'=>'Add Event', 'err'=>''));
			}
		}else{
			return Redirect::route('root');
		}
	}

	
}