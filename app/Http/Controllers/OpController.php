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
			//echo $event[0]->event_description;
			$e = $event[0]->event_description;
			//echo $e;
			return view('add_event', array(
				'action'=>'Edit Event',
				'event_name'=>$event[0]->event_name,
				'err'=>'',
				'society'=>$user->society,
				'admin'=>$user->priviliges,
				'id'=>$id,
				'event_des'=>json_encode($e),
				'edit'=>1,
				'contacts'=>$event[0]->contact,
				'prizes'=>$event[0]->prize_money,
				));

			
		}else{
			return Redirect::back();
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
			return view('add_winners', array('society'=>$user->society,
			 'action'=> 'Add Winners', 'admin'=> $user->priviliges));
		}else{
			return Redirect::route('root');
		}
	}

	public function edit_event($id = null){
		if(\Auth::check()){
			$user = User::where('email', Session::get('email'))->first();
			$data = Input::all();

			$eventdetails = EventDetails::where('event_id', $id)->first();
			//echo print_r($eventdetails);

			if($eventdetails->approved == 0){
				$eventdetails->event_description = json_encode($data['event_description']);
				$eventdetails->timing = $data['timing'];
				$eventdetails->contact = json_encode($data['contact']);
				$eventdetails->prize_money = json_encode($data['prize_money']);
				$eventdetails->approved = 0;
				$eventdetails->save();
				return 1;
				return Redirect::route('edit_event');
			}else{
				//cannot update an already approved event.
				return 0;	
				return Redirect::route('edit_event');
			}
		}else{
			return Redirect::route('root');
		}
	}

	public function logout(){
		\Auth::logout();
		return Redirect::back();
	}

}
