<?php
namespace App\Http\Controllers;
use Session;

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
}