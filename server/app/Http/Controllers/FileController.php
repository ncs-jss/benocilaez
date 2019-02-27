<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Event;
use Validator;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
            'event' => 'required|numeric',
            ]
        );

        $f = new File;
        $f->event_id = $input['event'];
        $file = Input::file('file');
        if ($file != null) {
            $file_name = uniqid().$file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();

            if (!in_array($file_ex, array('pdf'))) {
                return back()->withErrors('Invalid filetype. Please upload only pdfs.');
            }

            $newname = $file_name;
            $f->location = $newname;
            $file->move('uploads', $newname);
        }
        $f->save();

        return back()->with(['msg' =>'File added successfully.', 'class' => 'alert-success']);
    }

    public function index()
    {
        $events = Event::select('id', 'name')->where('society_id', Auth::id())->get();
        return view('society.add-file', ['events'=>$events]);
    }

    public function all()
    {
        $events = Event::where('society_id', Auth::id())->pluck('id')->toArray();
        $files = File::select('id', 'location')->whereIn('event_id', $events)->get();
        return view('society.home', ['files'=>$files]);
    }

    public function delete($id)
    {
        $f = File::select('location')->where('id', $id)->first();
        Storage::delete('uploads/'.$f->location);
        $f = File::find($id)->delete();
        return back()->with(['msg' =>'File deleted successfully.', 'class' => 'alert-success']);
    }
}
