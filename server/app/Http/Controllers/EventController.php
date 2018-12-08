<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use Validator;

class EventController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required',
            'winner1_amount' => 'required|numeric|min:1',
            'winner2_amount' => 'sometimes|nullable|numeric|min:1',
            'contact_name' => 'required|max:100',
            'contact_number' => 'required|numeric|max:9999999999|min:7000000000'
        ]);

        $event = new Event;
        $event->name = $input['title'];
        $event->description = $input['description'];
        $event->society_id = Auth::id();
        $event->winner1 = $input['winner1_amount'];
        if (!is_null($input['winner2_amount']))
        	$event->winner2 = $input['winner2_amount'];
        $event->contact_name = $input['contact_name'];
        $event->contact_no = $input['contact_number'];
        if (is_null($input['is_active']))
            $event->is_active = 0;
        else
            $event->is_active = 1;
        $event->save();

        return back()->with(['msg' =>'Event added successfully.', 'class' => 'alert-success']);
    }
}
