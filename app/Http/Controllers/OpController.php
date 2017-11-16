<?php
namespace App\Http\Controllers;
use Session;
use App\User;
use App\Status;
use App\Events;
use App\Members;
use App\EventDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class OpController extends BaseController{
    public function edit($id){
        $owner = Events::where('event_id', $id)->get()[0]->society_email;
        $status = Status::first();
        if((\Auth::check() &&(strcasecmp(Session::get('email') , $owner )) == 0) || \Auth::user()->priviliges == 1){
            $user = User::where('email', Session::get('email'))->first();
            $event = EventDetails::where('event_id',$id)->get();
            //dd($event[0]);
            $rules = ($event[0]->rules != "" && $event[0]->rules != null) ? $event[0]->rules : '[""]';
            $contacts = ($event[0]->contact != "" && $event[0]->contact != null) ? $event[0]->contact : '[{"name":"", "number":""},{"name":"", "number":""}]' ;
            $prize = ($event[0]->prize_money != "" && $event[0]->prize_money != null) ? $event[0]->prize_money : '["",""]';
            $category = ($event[0]->category != "" && $event[0]->category != null) ? $event[0]->category : '-';
            //dd(count($contacts));
            if(!($event[0]->approved == 0))
            return Redirect::route('view_event');
            $e = $event[0]->event_description;
            return view('add_event', array(
                'action'=>'Edit Event',
                'event_name'=>$event[0]->event_name,
                'err'=>'',
                'society'=>$user->society,
                'admin'=>$user->priviliges,
                'id'=>$id,
                'event_des'=>$e,
                'edit'=>1,
                'add_winners'=>$status->add_winners,
                'add_events'=>$status->add_events,
                'add_members'=>$status->add_members,
                'contacts'=>json_decode($contacts),
                'prizes'=>json_decode($prize),
                'category'=>$category,
                'attachment'=>$event[0]->attachment,
                'long_des'=>$event[0]->long_des,
                'rules'=>$rules,
                'timing'=>$event[0]->timing,
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
    public function add_winners(){
        if(\Auth::check()){
            $data = Input::all();
         //   dd(Events::where('event_id',$data['event_id'])->first()->society_email);
       /*     dd(\Auth::user()->email);
            dd(User::where('email',Events::where('event_id',$data['event_id'])->first()->society_email)->first());
       */     if(!strcmp(\Auth::user()->email, Events::where('event_id',$data['event_id'])->first()->society_email)){
                $eventdetails = EventDetails::where('event_id',$data['event_id'])->first();
                $eventdetails->first_place = json_encode($data['winnner']);
                $eventdetails->second_place = json_encode($data['runnnerup1']);
                $eventdetails->save();
                return Redirect::route('add_winners')->with('success',"Winners Successfully Added");          
            }
            return 0;
         }
         else{
            return 0;
         }
    }
    public function edit_event($id = null){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            $data = Input::all();
            
            $eventdetails = EventDetails::where('event_id', $id)->first();
// var_dump($data); die;
            $eventdetails['event_description'] = json_encode($data['short_des']);
            $eventdetails['long_des'] = json_encode($data['long_des']);
            $eventdetails['rules'] = json_encode($data['rules']);

            $eventdetails->category = $data['category'];

            $data['timing'] = $data['date'] . " " . $data['time'];
            $eventdetails->timing = $data['timing'];

            $data['contact'] = array(array("name" => $data['contact_name1'],"number" => $data['contact_number1']),
                                        array("name" => $data['contact_name2'],"number" => $data['contact_number2']));
            $eventdetails->contact = json_encode($data['contact']);

            $data['prize_money'] = array($data['prize_money1'],$data['prize_money2']);
            $eventdetails->prize_money = json_encode($data['prize_money']);

            $eventdetails->approved = 0;
            // dd($eventdetails);

            if (Input::file('file') != null && Input::file('file') -> isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('file') -> getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
                $eventdetails->attachment = $fileName;
            }

            $eventdetails->save();
            return Redirect::route('view_event');

        }else{
            return Redirect::route('root');
        }
    }
    public function approve($id){
        $admin = User::where('email', Session::get('email'))->first()->priviliges;
        if($id != null && \Auth::check() && $admin == 1){
            $event = EventDetails::where('event_id', $id)->first();
            $event->approved = ($event->approved == 0) ? 1 : 0;
            if($event->approved == 1)
                $event->edit_request = 0;
            $event->save();
            $mail = Events::select('society_email')->where('event_id',$id)->first();
            return Redirect::back()->with('mail', $mail);
        }
        return 0;
    }
    public function request($id){
        $user = User::where('email', Session::get('email'))->first();
        $soc_mail = Events::where('event_id', $id)->
        select('society_email')->first();
        $event = EventDetails::where('event_id', $id)->first();
        if($event->approved == 0)
        return 0;
        if($id != null && Session::get('email') == $soc_mail->society_email){
            $event->approved = 2;
            $event->save();
            return Redirect::back();
        }
        return 0;
    }
    public function logout(){
        \Auth::logout();
        return Redirect::back();
    }
    public function enable($what){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            if($user->priviliges == 1){
                $status = Status::first();
                if($what == 0){
                    $status->add_events = ($status->add_events) ? 0 : 1;
                    $status->save();
                    return $status->add_events;
                }else if($what == 1){
                    $status->add_winners = ($status->add_winners) ? 0 : 1;
                    $status->save();
                    return $status->add_winners;
                }else if($what == 2){
                    $status->add_members = ($status->add_members) ? 0 : 1;
                    $status->save();
                    return $status->add_members;
                 }else {
                    return 0;
                }
            }
        }
    }
    public function save_mem_details($type, Request $request){
        if(\Auth::check()){
            $data = $request->all();
            $member = new Members;
            $member->name = $_GET['name'];
            $member->type = $type;
            $member->phone = $_GET['phone'];
            $member->soc_id = Session::get('email');
            if($type == 4){
                $member->branch_yr = '';
            }else{
                if(isset($data['roll'])){
                    $member->roll_num = $data['roll'];
                }
                else{
                    $member->roll_num = 0;
                }
                if(isset($data['zeal'])){
                    $member->zeal_id = $data['zeal'];
                }else{
                    $member->zeal_id = "-";
                }
                if($type == 1){
                    $member->email = $_GET['email'];
                }
                else{
                    if(isset($data['events']))
                    $member->events = implode(',' ,$_GET['events']);
                }
            }
            $user = User::where('email',Session::get('email'))->first();
            $route = "/team/".$type;    
            if($member->save()){
                return Redirect::to($route);
            }
        }
        return Redirect::route($data['route']);
    }
    public function update_mem_details($id){
        if(\Auth::check()){
            $data = Input::all();
            $member = Members::where('id', $id);
            $updation = ['name'=> $data['name'],
            'phone' => $data['phone']];
            if(isset($data['roll'])){
                $updation['roll_num'] = $data['roll'];
            }else{
                $updation['roll_num'] = 0;
            }
            if(isset($data['zeal'])){
                $updation['zeal_id'] = $data['zeal'];
            }else{
                $updation['zeal_id'] = '-';
            }
            if($member->first()->type == 1){
                $updation['email'] = $data['email'];
            }
            if($member->first()->type == 2 || $member->first()->type == 3){
                //dd($data['events']);
                $updation['events'] = implode("," ,$data['events']);
            }
            if($member->update($updation)){
                return Redirect::back();
            }
        }
        return Redirect::back();
    }
    public function delete_mem_details($id){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            $member = Members::where('id', $id);
            // dd($member->first());
            if($member->first()->soc_id == Session::get('email')){
                if($member->delete()){
                    return Redirect::back();
                }
            }
        }
        return Redirect::back();
    }
    public function del_soc($id){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            if($user->priviliges == 1){
                $soc = User::where('id', $id)->first();
                $events = Events::where('society_email',$soc->email)->get();
                if($events){
                    foreach($events as $eve){
                        $event_details = EventDetails::where('event_id',$eve->event_id)->delete();
                        $eve->delete();
                    }
                }
            }
            if($soc->delete()){
                return Redirect::route('admin_panel');
            }
        }
        return Redirect::route('admin_panel');
    }
    public function edit_soc(){
        if(\Auth::check()){
            $data = Input::all();
            $update_arr = [];
            $user = User::where('email', Session::get('email'))->first();
            if($user->priviliges == 1){
                $soc = User::where('id', $data['socid'])->first();
                if($data['password'] != ''){
                    $update_arr['password'] = \Hash::make($data['password']);
                }
                if($data['name'] != ''){
                    $update_arr['society'] = $data['name'];
                }
                if($soc->update($update_arr)){
                    return ['status'=>'1', '_token'=> csrf_token()];
                }
            }
        }
        return ['status'=>'0', '_token'=> csrf_token()];
    }

    public function download($id, $event){
        $path = "uploads/$id";
        $extention = explode('.', $id)[1];
        $name = "$event.$extention";
        return response()->download($path, $name);
    }

    public function editRequest($id){
        $admin = User::where('email', Session::get('email'))->first()->priviliges;
        if($id != null && \Auth::check()){
            $event = EventDetails::where('event_id', $id)->first();
            $event->edit_request = ($event->edit_request == 0) ? 1 : 0;
            $event->save();
            $mail = Events::select('society_email')->where('event_id',$id)->first();
            return Redirect::back()->with('mail', $mail);
        }
        return 0;
    }
}
