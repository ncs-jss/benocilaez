<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Event;

class EventController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::all();
        return $this->sendResponse($events->toArray(), 'Events retrieved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'winner1' => 'required|numeric',
            'winner2' => 'required|numeric',
            'contact_name' => 'required',
            'contact_no' => 'required|numeric',
            'is_active' => 'required|boolean'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $event = Event::create(['name' => $input['name'], 'description' => $input['description'], 'society_id' => \Auth::id(), 'winner1' => $input['winner1'], 'winner2' => $input['winner2'], 'contact_name' => $input['contact_name'], 'contact_no' => $input['contact_no'], 'is_active' => $input['is_active']]);

        return $this->sendResponse($event->toArray(), 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $event = Event::find($id);

        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }

        return $this->sendResponse($event->toArray(), 'Event retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $event =Event::find($id);
        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'winner1' => 'required|numeric',
            'winner2' => 'required|numeric',
            'contact_name' => 'required',
            'contact_no' => 'required|numeric',
            'is_active' => 'required|boolean'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $event->name = $input['name'];
        $event->description = $input['description'];
        $event->winner1 = $input['winner1'];
        $event->winner2 = $input['winner2'];
        $event->contact_name = $input['contact_name'];
        $event->contact_no = $input['contact_no'];
        $event->is_active = $input['is_active'];
        $event->save();
        return $this->sendResponse($event->toArray(), 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event =Event::find($id);
        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }
        $event->delete();
        return $this->sendResponse($event->toArray(), 'Event deleted successfully.');
    }
}
