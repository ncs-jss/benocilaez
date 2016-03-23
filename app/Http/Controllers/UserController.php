<?php

namespace App\Http\Controllers;

use App\User;
use App\Events;
use App\Status;
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
            return ['status'=>'b', '_token'=> csrf_token(),
            'error'=> $validate->errors()];
        }else{
            $user = new User;
            $user->email = $data['email'];
            $user->password = \Hash::make($data['password']);
            $user->society = $data['society_name'];
            $user->priviliges = 2;
            if($user->save()){
                return Redirect::route('admin_panel');
            }else
            return Redirect::route('admin_panel');
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
    public function upload_add_event(){
        $data = Input::all();

        if (Input::file('files') != null && Input::file('files') -> isValid()) {
            $destinationPath = 'uploads'; // upload path
            $extension = Input::file('files') -> getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            Input::file('files')->move($destinationPath, $fileName); // uploading file to given path
            Session::put('attachment',$fileName);
            $response = array("files"=>array("url"=>"http://localhost/benocilaez/public/uploads/"
                .$fileName,"thumbnailUrl"=>"http://localhost/benocilaez/public/uploads/"
                .$fileName,"name" => $fileName, "type"=> $extension, "size" =>Input::file('files')->getClientSize()));

            return json_encode($response);
        }
        $response = array("files"=>array("error"=>"Can't upload file right now..." ));

        return $response;
    }
    public function create_event(){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            $data = Input::all();
            array_pop($data);
            $rules = ['event_name'=>'required','file'=>'mimes:application/pdf'];
            $validator = Validator::make($data, $rules);

            if($validator->fails()){
                return Redirect::route('add_event')
                ->withErrors($validator->errors())
                ->withInput();
            }
            $event = new Events;
            $event->society_email = $user->email;
            if(sizeof(Events::all()) != 0){
                $event_count = Events::all()->last()->id + 1;
            }
            else

                $event_count = 0;
            $event->event_id = strtolower(substr($user->society, 0, 4)).$event_count;

            $eventdetails = new EventDetails;
            $eventdetails->event_id = $event->event_id;
            $eventdetails->event_name = $data['event_name'];

            $eventdetails->event_description = json_encode($data['short_des']);
            // rules n long des ke columns banenge
            // n vo yahan par se vahan jayenge


            if(Status::first()->add_events == 1){
             $data['timing'] = $data['date'] . " " . $data['time'];
             $data['contact'] = array(array("name" => $data['contact_name1'],"number" => $data['contact_number1']),array("name" => $data['contact_name2'],"number" => $data['contact_number2']));
             $data['prize_money'] = array($data['prize_money1'],$data['prize_money2']); 
             if(rtrim($data['timing']) != '' &&
                strpos($data['timing'], 'undefined') === false){
                $tv = preg_split('/[- :]/', $data['timing']);
            $d = mktime($tv[3], $tv[4], 0, $tv[1], $tv[2], $tv[0]);
            $timestamp = date("Y-m-d h:i:s", $d);
            $eventdetails->timing = $timestamp;
        }

        $eventdetails->contact = json_encode($data['contact']);
        $eventdetails->prize_money = json_encode($data['prize_money']);
        $eventdetails->approved = 0;
        if (Input::file('files') != null && Input::file('files') -> isValid()) {
            $destinationPath = 'uploads'; // upload path
            $extension = Input::file('files') -> getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            Input::file('files')->move($destinationPath, $fileName); // uploading file to given path
            $eventdetails->attachment = $fileName;
        }
    }
    $event->save();
    if($eventdetails->save()){
        return Redirect::route('view_event');
    }else{
        Session::flash('success','0');
        return Redirect::back();
    }
}else{
    return Redirect::route('root');
}
}
}
