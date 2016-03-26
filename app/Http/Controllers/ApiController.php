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
class ApiController extends BaseController{
    public function get_events($id = null){
        if(\Auth::check()){
            $accessor = Session::get('email');
            $user = User::where('email', $accessor)->first();
            if ($id == null)
                $id = Session::get('email');
            if($user->priviliges == 1 || $accessor == $id){
                $events = Events::where('society_email', $id)
                            ->pluck('event_id')->toArray();
                $details = [];
                foreach ($events as $value) {
                    $name = EventDetails::where('event_id', $value)
                            ->pluck('event_name')->first();

                    array_push($details, ['id'=>$value,
                                'name'=>$name]);
                }
                return $details;
            }
            return 0;
        }
    }

    public function get_events_by_category($cat){
        if($cat > 6)
            abort(404);
        $status = Status::first();
        if($status->add_winners == 0)
            return EventDetails::where('grp', $cat)->select('event_name', 'event_description')->get()->toArray();
        else
            return EventDetails::where('grp', $cat)->get()->toArray();
    }

    public function get_events_by_soc(){}
}
