<?php

namespace App\Http\Controllers;

use App\User;
use App\Events;
use App\EventDetails;

use Session;
use Validator;
use Redirect;
use Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends BaseController{

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function reg_society(){
		$data = Input::all();

		$rules = ['email'=>'required|unique:users',
		'password'=> 'required|min:4', 
		'society_name'=>'required'];

		$validate = Validator::make($data, $rules);

		if($validate->fails()){
			return Redirect::to('add_society')->withErrors($validate)->withInput();
		}else{
			$user = new User;
			$user->email = $data['email'];
			$user->password = \Hash::make($data['password']);
			$user->society = $data['society_name'];
			$user->priviliges = 2;
			if($user->save()){
				return 'a';
			}else
			return 'asa';


		}
	}

	public function login_society(){
		$data = Input::all();
		array_pop($data);

		$rules = ['email'=>'required',
		'password'=> 'required|min:4'];

		$validator = Validator::make($data, $rules);
		if($validator->fails()){
			return redirect()->route('root')
			->withErrors($validator->errors())
			->withInput();
		}else{

			if(\Auth::attempt($data)){
				session_unset();
				Session::put('email',$data['email']);
				Session::save();
				return Redirect::route('root');
			}else{
				Session::flash('err',"1");
				return Redirect::route('root');
			}
		}
	}

	public function create_event(){
		if(\Auth::check()){
			$user = User::where('email', Session::get('email'))->first();	
			$data = Input::all();
			array_pop($data);
	
			$rules = ['event_name'=>'required','attachment' => 'mimes:application/pdf'];
	
			$validator = Validator::make($data, $rules);
	
			if($validator->fails()){
				return Redirect::route('add_event')
				->withErrors($validator->errors())
				->withInput();
			}
			$event = new Events;
			$event->society_email = $user->email;
			$event_count = Events::all()->last()->id + 1;
			$event->event_id = strtolower(substr($user->society, 0, 4)).$event_count;
			$event->save();
	
			$eventdetails = new EventDetails;
			$eventdetails->event_id = $event->event_id;
			$eventdetails->event_name = $data['event_name'];

			$eventdetails->event_description = json_encode($data['event_description']);
			$eventdetails->timing = $data['timing'];
			$eventdetails->contact = json_encode($data['contact']);
			$eventdetails->prize_money = json_encode($data['prize_money']);
			$eventdetails->approved = 0;
			if (Input::file('attachment')->isValid()) {
    		  $destinationPath = 'uploads'; // upload path  
   	   		  $extension = Input::file('attachment')->getClientOriginalExtension(); // getting image extension
     	   		$fileName = rand(11111,99999).'.'.$extension; // renameing image
   		     Input::file('attachment')->move($destinationPath, $fileName); // uploading file to given path
				$eventdetails->attachment = $fileName;
				}			
			$eventdetails->save();
			Session::flash('success','1');
			return 1;
			
			return Redirect::route('add_event');
		}else{
			return Redirect::route('add_event');
		}
	}
}
