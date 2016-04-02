<?php
namespace App\Http\Controllers;
use Session;
use App\User;
use App\Status;
use App\Events;
use App\Members;
use App\Registration;
use App\EventDetails;
use DB;
use Validator;
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
		foreach($eventdetails as $eve){
			$eve->contacts = array(json_decode($eve->contact)[0]->name => json_decode($eve->contact)[0]->number);			
		}
		dd($eventdetails);
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

			return "Looks Like You Have Already Registeres With This Email ID";
		}
		else {
			$last = Registration::all()->last();
			if($last==null)
			{
				$last = 1;
			} 
			else{
				$last = $last->id;
			}
			$registrations = new Registration;
			$registrations->name = $data['name'];
			$registrations->email = $data['email'];
			$registrations->course = $data['course'];
			$registrations->branch = $data['branch'];
			$registrations->contact = $data['contact'];
			$registrations->college = $data['college'];
			$registrations->year = $data['year'];
			$registrations->zeal_id = "zeal_onl_".strval($last+1);
			$registrations->save();
			return strtoupper($registrations->zeal_id);
		}

	}
}
