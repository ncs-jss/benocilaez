<?php
namespace App\Http\Controllers;
use Session;
use App\User;
use App\Status;
use App\Events;
use App\Members;
use App\EventDetails;
use DB;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ZealController extends BaseController{
	public function root(){
		$events = Events::all();
		$eventdetails = EventDetails::all();
		return View::make('zeal',['events' => $events,'eventdetails' => $eventdetails]);
	}
	public function register()
	{
		$data = Input::all();
		$rules=array(
			'name'=>'min:2',
			'email'=>'required|unique:registrations',
			'course'=>'required',
			'branch'=>'required',
			'contact'=>'required',
			'college'=>'required',
			'year'=>'required'
			);
		$validator = Validator::make($data, $rules);
		if($validator->fails()){

    // send back to the page with the input data and errors

			return json_encode($validator->errors());
		}
		else {
		}
	}
}
