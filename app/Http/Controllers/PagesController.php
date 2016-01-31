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
			return Redirect::route('add_event');
		}else{
			if(Session::get('err') == '1'){
				return view('back_office_login', 
					['err'=>"Oh daiiumm!! Email and password don't match."]);
			}else{
				return view('back_office_login', 
					['err'=>'']);
			}
		}
	}

	public function add_society(){
		$user = User::where('email', Session::get('email'))->first();
		
		if( \Auth::check() && $user->priviliges == 1){
			return view('add_society', array('admin'=>1, 
				'society'=>$user->society, 'action'=> 'Add Society'));
		}else{
			return Redirect::route('root');
		}
	}


	public function add_event(){
		if(\Auth::check()){
			$user = User::where('email', Session::get('email'))->first();
			if(Session::get('success') == 1){
				return view('add_event', array('society'=>$user->society, 
					'admin'=>$user->priviliges, 'action'=>'Add Event', 
					'err'=>'Event created Successfully!!', 'edit'=>0));
			}else{
				return view('add_event', array('society'=>$user->society, 
					'admin'=>$user->priviliges, 'action'=>'Add Event', 
					'err'=>'', 'edit'=>0));
			}
		}else{
			return Redirect::route('root');
		}
	}

	public function view_events($soc_id = null){
		if( \Auth::check()){
			$user = User::where('email', Session::get('email'))->first();
			if ($user->priviliges == 1){
				if($soc_id == null )
					return self::view_event($user, 1, $user->society, $user->id, 
						(($soc_id == null) ? 1 : 0) );
				else{
					$soc2 = User::where('id',$soc_id)->first()->society;
					return self::view_event($soc2, 1, $user->society, $soc_id, 0);
				}
		}else{
			return self::view_event($user, 0, $user->society, $user->id, 0);
		}
}else{
	return Redirect::route('root');
}
}


public function view_event($user, $admin, $accessor, $soc_id, $re_draw){
	if($admin == 1)
		$societies = User::select('id','society')->get();

	$event_des = User::where('users.id', $soc_id)
	->join('events','events.society_email', '=', 'users.email')
	->leftjoin('event_details', 'events.event_id', '=', 'event_details.event_id')
	->select('users.society', 'events.event_id', 
		'event_details.event_name', 'event_details.event_description', 
		'event_details.prize_money', 'event_details.contact', 'event_details.timing',
		'event_details.approved')
	->get();

	for ($i=0; $i < count($event_des) ; $i++) { 
		$x = $event_des[$i]['event_description'];
		$event_des[$i]['event_description'] = json_decode($x);

	}
	if($admin == 1){
		if($re_draw == 1) 
			return \View::make('view_event', array('society'=>$user->society,
							'society_events'=>$event_des, 'action'=>'View Events', 
							'societies'=> $societies, 'accessor'=> $accessor, 'admin'=> $admin));
		else
			return \View::make('table', array('society'=>$user,
							'society_events'=>$event_des, 'accessor'=> $accessor, 'admin'=> $admin));
	}else{
		return \View::make('view_event', array('society'=>$user->society,
							'society_events'=>$event_des, 'action'=>'View Events', 
							'societies'=> null, 'accessor'=> $accessor , 'admin'=> $admin));
	}

}

}