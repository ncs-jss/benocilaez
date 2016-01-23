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
			$user->save();


			//Authenticate the user...

			if(\Auth::attempt($user->email, $user->password)){
				Session::put('email', $user->email);
				Session::save();
				return Redirect::to('/');
			}else{
				return Redirect::to('/');
			}

		}
	}

	public function login_society(){
		$data = Input::all();
		array_pop($data);

		$rules = ['email'=>'required',
		'password'=> 'required|min:4'];

		$validator = Validator::make($data, $rules);
		if($validator->fails()){
			//return $validator->errors();
			return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
		}else{

			if(\Auth::attempt($data)){
				return 'x';
				/*Session::put('email',$data['email']);
				Session::save();
				return Redirect::to('add_society');*/
			}else{
				return 'y';
				/*Session::put('error',"Ops! Credentials do not match");
				return Redirect::to('/')->withInput();*/
			}
		}
	}
}
