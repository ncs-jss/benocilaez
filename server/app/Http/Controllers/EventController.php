<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Event;
use Validator;
use App\Society;

class EventController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
            'title' => 'required|max:100',
            'description' => 'required',
            'winner1_amount' => 'required|numeric|min:1',
            'winner2_amount' => 'sometimes|nullable|numeric|min:1',
            'contact_name' => 'required|max:100',
            'contact_number' => 'required|numeric|max:9999999999|min:7000000000'
            ]
        );

        $event = new Event;
        $event->name = $input['title'];
        $event->description = $input['description'];
        $event->society_id = Auth::id();
        $event->winner1 = $input['winner1_amount'];
        if (!is_null($input['winner2_amount'])) {
            $event->winner2 = $input['winner2_amount'];
        }
        $event->contact_name = $input['contact_name'];
        $event->contact_no = $input['contact_number'];
        if (is_null($input['is_active'])) {
            $event->is_active = 0;
        } else {
            $event->is_active = 1;
        }
        $event->category_id = $request->category;
        $event->save();

        return back()->with(['msg' =>'Event added successfully.', 'class' => 'alert-success']);
    }

    public function index()
    {
        $events = Event::where('society_id', Auth::id())->get();
        return view('society.home', ['events'=>$events]);
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
            'title' => 'required|max:100',
            'description' => 'required',
            'winner1_amount' => 'required|numeric|min:1',
            'winner2_amount' => 'sometimes|nullable|numeric|min:1',
            'contact_name' => 'required|max:100',
            'contact_number' => 'required|numeric|max:9999999999|min:7000000000'
            ]
        );
        
        $event =Event::find($id);
        if (is_null($event)) {
            return back()->with(['msg' =>'Event does not exist anymore.', 'class' => 'alert-danger']);
        }
        $event->name = $request->title;
        $event->description = $request->description;
        $event->society_id = Auth::id();
        $event->winner1 = $request->winner1_amount;
        if (!is_null($request->winner2_amount)) {
            $event->winner2 = $request->winner2_amount;
        }
        $event->contact_name = $request->contact_name;
        $event->contact_no = $request->contact_number;
        $event->category_id = $request->category;
        if (is_null($request->is_active)) {
            $event->is_active = 0;
        } else {
            $event->is_active = 1;
        }
        $event->save();
        return back()->with(['msg' =>'Event edited successfully.', 'class' => 'alert-success']);
    }

    public function delete($id)
    {
        $event =Event::find($id);
        if (!is_null($event)) {
            $event->delete();
            return back()->with(['msg' =>'Event deleted successfully.', 'class' => 'alert-success']);
        }
    }

    public function summary()
    {
        $events = Event::all();
        $societies  = Society::all();
        return view('admin.summary', compact('societies', 'events'));
    }
        
}
