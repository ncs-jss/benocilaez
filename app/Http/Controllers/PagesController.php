<?php
namespace App\Http\Controllers;
use Session;
use App\User;

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

		if( \Auth::check() && $user->priviliges == 1){
			return view('event_approval');
		}else{
			return redirect('/');
		}
	}



}