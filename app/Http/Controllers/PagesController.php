<?php
namespace App\Http\Controllers;
use Session;
use App\User;
use App\Status;
use App\Events;
use App\Members;
use App\EventDetails;

use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends BaseController{
    public function root(){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            return Redirect::route('add_event');
        }else{
            if(Session::get('err') == '1'){
                return view('back_office_login',
                ['err'=>"Email and password don't match."]);
            }else{
                return view('back_office_login',
                ['err'=>'']);
            }
        }
    }

    public function add_society(){
        $user = User::where('email', Session::get('email'))->first();
        $status = Status::first();
        if( \Auth::check() && $user->priviliges == 1){
            return view('add_society', array('admin'=> 1,
            'add_winners'=>$status->add_winners,
            'society'=>$user->society, 'action'=> 'Add Society'));
        }else{
            return Redirect::route('root');
        }
    }


    public function add_event(){
        if(\Auth::check()){
            $status = Status::first();
            $user = User::where('email', Session::get('email'))->first();
            if(Session::get('success') == 1){
                return view('add_event', array('society'=>$user->society,
                'admin'=>$user->priviliges, 'action'=>'Add Event',
                'add_winners'=>$status->add_winners,
                'add_events'=>$status->add_events,
                'err'=>'Event created Successfully!!', 'edit'=>0));
            }else{
                return view('add_event', array('society'=>$user->society,
                'admin'=>$user->priviliges, 'action'=>'Add Event',
                'add_winners'=>$status->add_winners,
                'add_events'=>$status->add_events,
                'err'=>'', 'edit'=>0));
            }
        }else{
            return Redirect::route('root');
        }
    }

    public function view_events($soc_id = null){
        if( \Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            if ($user->priviliges == 1){
                if($soc_id == null )
                return self::view_event($user, 1, $user->society, $user->id,
                (($soc_id == null) ? 1 : 0) );
                else{
                    $soc2 = User::where('id',$soc_id)->first()->society;
                    return self::view_event($soc2, 1, $user->society, $soc_id, 0);
                }
            }else{
                return self::view_event($user, 0, $user->society, $user->id, 0);
            }
        }else{
            return Redirect::route('root');
        }
    }


    public function view_event($user, $admin, $accessor, $soc_id, $re_draw){
        $status = Status::first();
        if($admin == 1)
        $societies = User::select('id','society')->get();

        $event_des = User::where('users.id', $soc_id)
        ->join('events','events.society_email', '=', 'users.email')
        ->leftjoin('event_details', 'events.event_id', '=', 'event_details.event_id')
        ->select('users.society', 'events.event_id',
        'event_details.event_name', 'event_details.event_description',
        'event_details.prize_money', 'event_details.contact', 'event_details.timing',
        'event_details.approved')
        ->get();

        for ($i=0; $i < count($event_des) ; $i++) {
            $x = $event_des[$i]['event_description'];
            $event_des[$i]['event_description'] = json_decode($x);

        }
        if($admin == 1){
            if($re_draw == 1)
            return \View::make('view_event', array('society'=>$user->society,
            'society_events'=>$event_des, 'action'=>'View Events',
            'add_winners'=>$status->add_winners,
            'societies'=> $societies, 'accessor'=> $accessor, 'admin'=> $admin));
            else
            return \View::make('table', array('society'=>$user,
            'add_winners'=>$status->add_winners,
            'society_events'=>$event_des, 'accessor'=> $accessor, 'admin'=> $admin));
        }else{
            return \View::make('view_event', array('society'=>$user->society,
            'society_events'=>$event_des, 'action'=>'View Events',
            'add_winners'=>$status->add_winners,
            'societies'=> null, 'accessor'=> $accessor , 'admin'=> $admin));
        }

    }

    public function add_winners()
    {
        $status = Status::first();
        if (\Auth::check()) {
            $user = User::where('email', Session::get('email'))->first();
            $events = Events::where('society_email', Session::get('email'))
            ->select('event_id')->get();
            $event_name = [];
            foreach ($events as $value) {
                $name = EventDetails::where('event_id', $value->event_id)
                ->select('event_name')->get()->first();
                if($name == null)
                continue;

                array_push($event_name, ['event_id'=> $value->event_id,
                'event_name'=> $name->event_name]);
            }
            return view('add_winners', array('society'=>$user->society,
            'add_winners'=>$status->add_winners,
            'action'=> 'Add Winners', '`'=> $user->priviliges,
            'events'=> $event_name));
        }else{
            return Redirect::route('root');
        }
    }

    public function admin(){
        $status = Status::first();
        if (\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            if($user->priviliges == 1){
                /*$users = Members::select(DB::raw('count(*) as count, soc_id'))
                     ->groupBy('soc_id','type')
                     ->get();
                */
                     $ema= array();
                     $emails = Members::select('soc_id')->distinct()->pluck('soc_id');
                     foreach ($emails as $em) {
                         $ema[] = $em;
                     }
                $details = array();
                foreach ($ema as $mails) {
                    $s_name = User::where('email',$mails)->first();
                    $details[] = array("society"=>$s_name['society'],"ctc"=>count(Members::where('soc_id',$mails)->where('type',1)->get()),"coordinator"=>count(Members::where('soc_id',$mails)->where('type',2)->get()),"volunteer"=>count(Members::where('soc_id',$mails)->where('type',3)->get()));
                }
                return \View::make('admin_panel', array('society'=>$user->society,
                'add_winners'=>$status->add_winners,
                'add_events'=>$status->add_events,
                'action'=>'Admin Panel', 'admin'=> 1,'details'=>$details));
            }
            return Redirect::back();
        }
        return Redirect::route('root');
    }

    public function add_soc_details($id = -1, $redraw = 0){
        $status = Status::first();
        if (\Auth::check()){
            $societies = User::select('id','society', 'email')->get();
            $mapping = [];
            foreach ($societies as $value) {
                $events_ids = Events::where('society_email',
                $value->email)->get()->toArray();
                $a = [];
                foreach ($events_ids as $event) {
                    $event_name = EventDetails::where('event_id',
                    $event['event_id'])->pluck('event_name')
                    ->toArray();
                    array_push($a, ['event_id'=>$event['event_id'],
                    'event_name'=>$event_name[0]]);
                }
                $mapping[$value->society] = $a;
            }

            $mapping = htmlspecialchars_decode(json_encode($mapping));

            $user = User::where('email', Session::get('email'))->first();
            $members = Members::where('soc_id', Session::get('email'))->get();
            $members = $members->toArray();

            //yahan par event id ki jagh event name return karna hai...

            if($user->priviliges == 1){
                if($id == -1){
                    return \View::make('add_soc_details',   array('society'=>$user->society,
                    'add_winners'=>$status->add_winners,
                    'societies'=>$societies,
                    'members'=>$members,
                    'event_map'=>$mapping,
                    'action'=>'Member Details', 'admin'=> 1));
                }
                else
                return get_soc_mem_details($id, $redraw);
            }else{
                return \View::make('add_soc_details',   array('society'=>$user->society,
                'add_winners'=>$status->add_winners,
                'societies'=>$societies,
                'members'=>$members,
                'event_map'=>$mapping,
                'accessor'=>$user->email,
                'action'=>'Member Details', 'admin'=> 0));
            }
            return Redirect::back();
        }
        return Redirect::route('root');
    }

    public function get_soc_mem_details($id, $redraw){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            if($user->priviliges == 1){

            }
        }
    }

}
