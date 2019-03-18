<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Winner;
use Auth;

class WinnerController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
            'name' => 'required|max:100',
            'winner_contact' => 'required|numeric|max:9999999999|min:6000000000',
            'zeal_id' => 'required|max:100',
            'event' => 'required|numeric',
            'rank' => 'required|numeric|between:1,2'
            ]
        );

        $winner = new Winner;
        $winner->name = $input['name'];
        $winner->contact_no = $input['winner_contact'];
        $winner->zeal_id = $input['zeal_id'];
        $winner->event_id = $input['event'];
        $winner->rank = $input['rank'];
        $winner->year = date('Y');
        $winner->save();

        return back()->with(['msg' =>'Winner added successfully.', 'class' => 'alert-success']);
    }

    public function index()
    {
        $events = Event::where('society_id', Auth::id())->pluck('id')->toArray();
        $winners = Winner::whereIn('event_id', $events)->get();
        return view('society.home', ['winners'=>$winners]);
    }

    public function edit($id)
    {
        $event =Event::find($id);
        $category = Category::all();
        if (!is_null($event)) {
            return view('society.add-event', ['event' => $event, 'category' => $category]);
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
            'name' => 'required|max:100',
            'winner_contact' => 'required|numeric|max:9999999999|min:6000000000',
            'zeal_id' => 'required|max:100',
            'event' => 'required|numeric',
            'rank' => 'required|numeric|between:1,2'
            ]
        );
        
        $winner =Winner::find($id);
        if (is_null($winner)) {
            return back()->with(['msg' =>'Event does not exist anymore.', 'class' => 'alert-danger']);
        }
        $winner->name = $input['name'];
        $winner->contact_no = $input['winner_contact'];
        $winner->zeal_id = $input['zeal_id'];
        $winner->event_id = $input['event'];
        $winner->rank = $input['rank'];
        $winner->year = date('Y');
        $winner->save();
        return back()->with(['msg' =>'Winner edited successfully.', 'class' => 'alert-success']);
    }

    public function delete($id)
    {
        $winner =Winner::find($id);
        if (!is_null($winner)) {
            $winner->delete();
            return back()->with(['msg' =>'Winner deleted successfully.', 'class' => 'alert-success']);
        }
    }
}
