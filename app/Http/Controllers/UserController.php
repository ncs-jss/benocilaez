<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Auth;
use Validator;
use Redirect;
use App\Users;
use App\UserDetails;
use Session;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
      if(\Auth::check())
      {
      return \View::make('user_dashboard');
      }
      else 
      {
      return \View::make('user_login');
      }
    }
    public function ulogin()
    {
      if(\Auth::check())
      {
        return \Veiw::make('user_dashboard');
      }
      else
      {
      return \Veiw::make('user_login');
      }
    }
    public function usignup()
    {
      if(\Auth::check())
      {
      return \Veiw::make('user_dashboard');
      }
      else
      {
      return \View::make('user_signup');
      }
    }

    public function userlogin()
    {
     $user=array(
        "email"=>Input::get('email'),
        "password"=>Input::get('password')
        );
     	   $rules = array('email' => 'required|unique:users','password' => 'required');
      $validator = Validator::make($user, $rules);
  if ($validator->fails()) {
    // send back to the page with the input data and errors
    return Redirect::to('/')->withInput()->withErrors($validator);
  }
  else 
  {
 	   if(\Auth::attempt($user))
    {
      Session::put('email', $user['email']);

      return Redirect::to('home');
    }

    else
    {
       Session::put('error',"Ops! Credentials do not match");
      return Redirect::to('login')->withInput();
    }
 	}
    	 
    }


  public function usersignup()
  {
    $data = Input::all(); 

$rules=array(
'name'=>'min:2|alpha_dash',
'email'=>'required|unique:users',
'password'=>'required|min:4|confirmed',
'password_confirmation'=>'required|min:4'



);
   $validator = Validator::make($data, $rules);


if($validator->fails()){
  
    return Redirect::to('signup')->withInput()->withErrors($validator);
  }
  else {
              $user = new Users;
              $user->email=$data['email'];
              $user->password=\Hash::make($data['password']);
              $user->priviliges=3;
              $user->save();
              $id=$user->id;
              Session::put('email',$user->email);
              $user_detail = new UserDetails;
              $user_detail->name=$data['name'];
              $user_detail->email=$data['email'];
              $user_detail->contact=$data['contact'];
              $user_detail->id=$id;
              $user_detail->save();
              $user=array("email"=>$data['email'],
              "password"=>$data['password']
              );
             if(\Auth::attempt($user))
             {
                Session::put('email',$user['email']);
                Session::save();
             }
             else
             {
             
              return Redirect::to('/'); 
             }
            }
 }
}
