<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CTC;

class CtcController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
            'name' => 'required|max:100',
            ]
        );

        $ctc = new CTC;
        $ctc->name = $input['name'];
        $ctc->society_id = Auth::user()->id;
        $ctc->year = date('Y');
        $ctc->save();

        return back()->with(['msg' =>'CTC added successfully.', 'class' => 'alert-success']);
    }

    public function index()
    {
        $ctcs = CTC::where('society_id', Auth::id())->get();
        return view('society.home', ['ctcs'=>$ctcs]);
    }

    public function edit($id)
    {
        $ctc =CTC::find($id);
        if (!is_null($ctc)) {
            return view('society.add-ctc', ['ctc' => $ctc]);
        }
    }
}
