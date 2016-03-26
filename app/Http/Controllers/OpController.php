<?php
namespace App\Http\Controllers;
use Session;
use App\User;
use App\Status;
use App\Events;
use App\Members;
use App\EventDetails;
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
        if(\Auth::check() &&(strcasecmp(Session::get('email') , $owner )) == 0){
            $user = User::where('email', Session::get('email'))->first();
            $event = EventDetails::where('event_id',$id)->get();
            //dd($event[0]);
            $rules = ($event[0]->rules != "" && $event[0]->rules != null) ? $event[0]->rules : '[""]';
            $contacts = ($event[0]->contact != "" && $event[0]->contact != null) ? $event[0]->contact : '[{"name":"", "number":""},{"name":"", "number":""}]' ;
            $prize = ($event[0]->prize_money != "" && $event[0]->prize_money != null) ? $event[0]->prize_money : '["",""]';
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
                'contacts'=>json_decode($contacts),
                'prizes'=>json_decode($prize),
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
        return "abhay";
    }
    public function edit_event($id = null){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            $data = Input::all();
            $eventdetails = EventDetails::where('event_id', $id)->first();

            $eventdetails['event_description'] = json_encode($data['short_des']);
            if(isset($data['timing'])){
                $eventdetails->timing = $data['timing'];
            }
            if(isset($data['contact'])){
                $eventdetails->contact = json_encode($data['contact']);
            }
            if(isset($data['contact'])){
                $eventdetails->prize_money = json_encode($data['prize_money']);
            }
            $eventdetails->approved = 0;
            $eventdetails->save();
            return Redirect::route('view_event');

        }else{
            return Redirect::route('root');
        }
    }
    public function approve($id = null){
        $admin = User::where('email', Session::get('email'))->
        first()->priviliges;
        if($id != null && \Auth::check() && $admin == 1){
            $event = EventDetails::where('event_id', $id)->first();
            $event->approved = ($event->approved == 0) ? 1 : 0;
            $event->save();
            return 1;
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
            return 1;
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
                }else {
                    return 0;
                }
            }
        }
    }
    public function save_mem_details($type){
        if(\Auth::check()){
            $data = Input::all();
            $member = new Members;
            $member->name = $data['name'];
            $member->type = $type;
            $member->phone = $data['phone'];
            $member->soc_id = Session::get('email');
            if($type == 4){
                $member->branch_yr = '';
            }else{
                if(isset($data['branch'])){
                    $member->branch_yr = $data['branch'];
                }
                else{
                    $member->branch_yr = '-';
                }
                if(isset($data['year'])){
                    $member->branch_yr .= " ".$data['year'];
                }else{
                    $member->branch_yr .= " 1";
                }
                if($type == 1){
                    $member->email = $data['email'];
                }
                else{
                    if(isset($data['events']))
                    $member->events = implode(',' ,$data['events']);
                }
            }
            $user = User::where('email',Session::get('email'))->first();
            $route = "/team/".$type;
            if($member->save()){
                return Redirect::to($route);
            }
        }
        return Redirect::route($data['route']);;
    }
    public function update_mem_details($id){
        if(\Auth::check()){
            $data = Input::all();
            $member = Members::where('id', $id);
            $updation = ['name'=> $data['name'],
            'phone' => $data['phone'],];
            if(isset($data['branch'])){
                $updation['branch_yr'] = $data['branch'];
            }else{
                $updation['branch_yr'] = '-';
            }
            if(isset($data['year'])){
                $updation['branch_yr'] .= ' '.$data['year'];
            }else{
                $updation['branch_yr'] = ' 1';
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
}
