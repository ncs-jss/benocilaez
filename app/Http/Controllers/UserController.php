<?php

namespace App\Http\Controllers;

use App\User;
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
			->withErrors($validator)
			->withInput();
		}else{

			if(\Auth::attempt($data)){
				session_unset();
				Session::put('email',$data['email']);
				Session::save();
				return redirect()->route('root');
			}else{
				Session::flash('err',"1");
				return redirect()->route('root');
			}
		}
	}
}
