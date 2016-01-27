<?php
namespace App\Http\Controllers;

use Session;
use App\User;
use App\Events;
use App\EventDetails;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class OpController extends BaseController{
	public function edit($id){
		$owner = Events::where('event_id', $id)->get()[0]->society_email;


		if(\Auth::check() && Session::get('email') == $owner){
			$user = User::where('email', Session::get('email'))->first();

			$event = EventDetails::where('event_id',$id)->get();

			return view('add_event', array(
				'action'=>'Edit Event',
				'event_name'=>$event[0]->event_name,
				'err'=>''
				));
			
		}else{
			return Redirect::route('view_event');
		}
	}

	public function delete($id){
		$owner = Events::where('event_id', $id)->get()[0]->society_email;
		if(\Auth::check() && Session::get('email')==$owner){
			
			if (EventDetails::where('event_id', $id)->count()>=1){
				EventDetails::where('event_id', $id)->delete();
			}
			if(Events::where('event_id', $id)->count()>=1){
				Events::where('event_id', $id)->delete();
			}
			return 1;
			
		}else{
			return 0;
		}
	}

	public function add_winners()
	{
		if (\Auth::check()) {
			$user = User::where('email', Session::get('email'))->first();
			return view('add_winners', array('society'=>$user->society, 'action'=> 'Add Winners', 'admin'=> $user->priviliges));
		}
	}

	public function logout(){
		\Auth::logout();
		return Redirect::back();
	}
}
