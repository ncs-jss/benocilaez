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

        if(\Auth::check() && Session::get('email') == $owner){
            $user = User::where('email', Session::get('email'))->first();

            $event = EventDetails::where('event_id',$id)->get();

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
                'event_des'=>json_encode($e),
                'edit'=>1,
                'add_winners'=>$status->add_winners,
                'add_events'=>$status->add_events,
                'contacts'=>$event[0]->contact,
                'prizes'=>$event[0]->prize_money,
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

            if($eventdetails->approved == 0){
                $eventdetails->event_description = json_encode($data['event_description']);
                $eventdetails->timing = $data['timing'];
                $eventdetails->contact = json_encode($data['contact']);
                $eventdetails->prize_money = json_encode($data['prize_money']);
                $eventdetails->approved = 0;
                $eventdetails->save();
                return 1;
                return Redirect::route('edit_event');
            }else{
                return 0;
                return Redirect::route('edit_event');
            }
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

    public function save_mem_details(){
        if(\Auth::check()){
            $member = new Members;
            $data = Input::all();
            $member->name = $data['name'];
            $member->type = $data['type'];
            $member->phone = $data['phone'];
            $member->roll_num = $data['rollno'];
            $member->soc_id = Session::get('email');
            $member->branch_yr = $data['branch_yr'];
            $member->events = $data['events'];
            if($member->save()){
                return ['status'=>'1','id'=>$member->id];
            }
        }
        return 0;
    }

    public function update_mem_details($id){
        if(\Auth::check()){
            $data = Input::all();
            if($id == 'teach'){
                $member = new Members;
                $member->name = $data['name'];
                $member->phone = $data['phone'];
                $member->type = 4;
                $member->soc_id = Session::get('email');
                if($member->save()){
                    return ['status'=>'1', 'id'=>$member->id];
                }
                return 0;
            }
            $member = Members::where('id', $id);
            $updation = ['name'=> $data['name'],
                        'type' => $data['type'],
                        'phone' => $data['phone'],
                        'roll_num' => $data['rollno'],
                        'soc_id' => Session::get('email'),
                        'branch_yr' => $data['branch_yr'],
                        'events' => $data['events_name'] ];
            if($member->update($updation)){
                return ['status'=>'1','id'=>$id];
            }
        }
        return 0;
    }

    public function delete_mem_details($id){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            $member = Members::where('id', $id);
            if($member->first()->soc_id == Session::get('email')){
                if($member->delete()){
                    return ['status'=>1];
                }
            }
        }
        return ['status'=>0];
    }

}
