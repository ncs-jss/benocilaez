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
            return Redirect::route('view_event');
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
                'add_events'=>$status->add_events,
                'add_members'=>$status->add_members,
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
                    'add_members'=>$status->add_members,
                    'err'=>'Event created Successfully!!', 'edit'=>0));
            }else{
                return view('add_event', array('society'=>$user->society,
                    'admin'=>$user->priviliges, 'action'=>'Add Event',
                    'add_winners'=>$status->add_winners,
                    'add_events'=>$status->add_events,
                    'add_members'=>$status->add_members,
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
            'event_details.approved', 'event_details.edit_request')
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
                    'add_events'=>$status->add_events,
                    'add_members'=>$status->add_members,
                    'societies'=> $societies, 'accessor'=> $accessor, 'admin'=> $admin, 'mail'=>''));
            else
                return \View::make('table', array('society'=>$user,
                    'add_winners'=>$status->add_winners,
                    'add_events'=>$status->add_events,
                    'add_members'=>$status->add_members,
                    'society_events'=>$event_des, 'accessor'=> $accessor, 'admin'=> $admin, 'mail'=>''));
        }else{
            return \View::make('view_event', array('society'=>$user->society,
                'society_events'=>$event_des, 'action'=>'View Events',
                'add_winners'=>$status->add_winners,
                'add_events'=>$status->add_events,
                'add_members'=>$status->add_members,
                'societies'=> null, 'accessor'=> $accessor , 'admin'=> $admin, 'mail'=>''));
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
                // echo $value; die();
                $name = EventDetails::where('event_id', $value->event_id)
                ->select('event_id','event_name', 'first_place')->get()->first();
                // echo $name;
                if($name['event_name'] == null || $name['first_place'] != null) {
                continue;
            }
            array_push($event_name, ['event_id'=> $name['event_id'],
                    'event_name'=> $name['event_name']]);
            }
            // var_dump($event_name); die();
            return view('add_winners', array('society'=>$user->society,
                'add_winners'=>$status->add_winners,
                'add_events'=>$status->add_events,
                'add_members'=>$status->add_members,
                'admin'=>$user->priviliges,
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
                $ema= array();
                $emails = User::select('email')->distinct()->pluck('email');
                foreach ($emails as $em) {
                    $ema[] = $em;
                }
                $details = array();
                foreach ($ema as $mails) {
                    if(User::where('email',$mails)->first()){
                        $s_name = User::where('email',$mails)->first();
                        $details[] = array("society"=>$s_name['society'],
                            "ctc"=>count(Members::where('soc_id',$mails)
                                ->where('type',1)->get()),
                            "coordinator"=>count(Members::where('soc_id',$mails)->where('type',2)->get()),
                            "volunteer"=>count(Members::where('soc_id',$mails)->where('type',3)->get()),
                            "soc_id"=>User::where('email',$mails)->first()->id,);
                    }else{
                        $details[] = array("society"=>$s_name['society'],
                            "ctc"=>0,
                            "coordinator"=>0,
                            "volunteer"=>0,
                            "sic_id"=>null);
                    }
                }
                //dd($details);
                return \View::make('admin_panel', array('society'=>$user->society,
                    'add_winners'=>$status->add_winners,
                    'add_events'=>$status->add_events,
                    'add_members'=>$status->add_members,
                    'action'=>'Admin Panel', 'admin'=> 1,'details'=>$details));
            }
            return Redirect::back();
        }
        return Redirect::route('root');
    }

    public function add_soc_details( $team, $id = -1, $redraw = 0){
        $status = Status::first();
        if (\Auth::check()){
            $societies = User::select('id','society', 'email')->get();


            $user = User::where('email', Session::get('email'))->first();
            $members = Members::where('soc_id', Session::get('email'))
            ->where('type', $team)->get();
            $members = $members->toArray();
            // var_dump($members); die();
            foreach ($members as $key => $field) {
                // var_dump($members[$key]['events']); die();
                if($members[$key]['events'] != '' && $members[$key]['events'] != null && $members[$key]['events'] != 'null'){
                    $x = EventDetails::where('event_id', $members[$key]['events'])->first();
                    // var_dump($x); die();
                    // if($x != ''){
                        // var_dump($members[$key]); die();
                        $events = explode(",",$members[$key]['events']);
                        $members[$key]['event'] = '';
                        foreach ($events as $event){
                            if($members[$key]['event'] <> ''){
                                $members[$key]['event'] = $members[$key]['event'].", ".(EventDetails::where('event_id', $event)->first()->event_name);
                            }else{
                                $members[$key]['event'] = $members[$key]['event'].(EventDetails::where('event_id', $event)->first()->event_name);
                            }
                        }
                        // else{
                    //     $members[$key]['events'] = '';
                    // }

                }
            }
            $disp_events = Events::where('society_email',Session::get('email'))
            ->get()->pluck('event_id');
            $disp_event_details = array();
            // var_dump($members);die();
            foreach($disp_events as $disp){
                $disp_event_details[] = EventDetails::where('event_id',
                    $disp)->first();
            }
            var_dump($disp_events);
            if($user->priviliges == 1){
                if($id == -1){
                    return \View::make('core_team',array('society'=>$user->society,
                        'add_winners'=>$status->add_winners,
                        'add_events'=>$status->add_events,
                        'add_members'=>$status->add_members,
                        'societies'=>$societies,
                        'members'=>$members,
                        'type'=>$team,
                        'disp_events'=>$disp_event_details,
                        'action'=>'Member Details', 'admin'=> 1));
                }
                else
                    return Self::get_soc_mem_details($team, $id);
            }else{
                return \View::make('core_team',   array('society'=>$user->society,
                    'add_winners'=>$status->add_winners,
                    'add_events'=>$status->add_events,
                    'add_members'=>$status->add_members,
                    'societies'=>$societies,
                    'members'=>$members,
                    'type'=>$team,
                    'disp_events'=>$disp_event_details,
                    'accessor'=>$user->email,
                    'action'=>'Member Details', 'admin'=> 0));
            }
            return Redirect::back();
        }
        return Redirect::route('root');
    }
    public function get_soc_mem_details($type, $id){
        if(\Auth::check()){
            $user = User::where('email', Session::get('email'))->first();
            if($user->priviliges == 1){
                $soc = User::where('id', $id)->get()->first();
                $members = Members::where('soc_id', $soc['email'])
                ->where('type', $type)->get();
                $members = $members->toArray();
                foreach ($members as $key => $field) {
                    if($members[$key]['events'] != '' && $members[$key]['events'] != null && $members[$key]['events'] != 'null'){
                        $x = EventDetails::where('event_id', $members[$key]['events'])->first();
                        if($x != ''){
                            $members[$key]['events'] = EventDetails::where('event_id', $members[$key]['events'])->first()->event_name;
                        }else{
                            $members[$key]['events'] = '';
                        }

                    }
                }

                $disp_events = Events::where('society_email',$soc->email)
                ->get()->pluck('event_id');
                $disp_event_details = array();
                foreach($disp_events as $disp){
                    $disp_event_details[] = EventDetails::where('event_id',
                        $disp)->first();
                }

                return \View::make('team_table', array(
                    'members'=>$members,
                    'type'=> $type,
                    'disp_events'=>$disp_event_details,
                    ));
            }
        }
        return Route::back();
    }
    public function core_team($id = -1){

    }
}
