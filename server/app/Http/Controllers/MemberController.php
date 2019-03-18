<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Member;
use App\Branch;
use App\MemberType;

class MemberController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
            'name' => 'required|max:100',
            'year' => 'required|numeric',
            'branch' => 'required|numeric',
            'email' => 'required|email',
            'contact' => 'required|numeric|min:6000000000|max:9999999999',
            'category' => 'required|numeric',
            'zeal' => 'required|max:10',
            ]
        );

        $member = new Member;
        $member->name = $input['name'];
        $member->society_id = Auth::user()->id;
        $member->year = date('Y');
        $member->yr = $input['year'];
        $member->branch_id = $input['branch'];
        $member->email = $input['email'];
        $member->contact = $input['contact'];
        $member->member_type_id = $input['category'];
        $member->zeal_id = $input['zeal'];
        $member->save();

        return back()->with(['msg' =>'Member added successfully.', 'class' => 'alert-success']);
    }

    public function index()
    {
        $members = Member::where('society_id', Auth::id())->get();
        $branch = Branch::all();
        $member_type = MemberType::all();
        return view('society.home', ['members'=>$members]);
    }

    public function edit($id)
    {
        $member =Member::find($id);
        $members = Member::where('society_id', Auth::id())->get();
        $branch = Branch::all();
        $member_type = MemberType::all();
        if (!is_null($member)) {
            return view(
                'society.add-member',
                [
                    'member' => $member,
                    'branch' => $branch,
                    'member_type' => $member_type
                ]
            );
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
            'name' => 'required|max:100',
            'year' => 'required|numeric',
            'branch' => 'required|numeric',
            'email' => 'required|email',
            'contact' => 'required|numeric|min:6000000000|max:9999999999',
            'category' => 'required|numeric',
            'zeal' => 'required|max:10',
            ]
        );

        $member =Member::find($id);
        if (is_null($member)) {
            return back()->with(['msg' =>'Member does not exist anymore.', 'class' => 'alert-danger']);
        }
        $member->name = $input['name'];
        $member->society_id = Auth::user()->id;
        $member->year = date('Y');
        $member->yr = $input['year'];
        $member->branch_id = $input['branch'];
        $member->email = $input['email'];
        $member->contact = $input['contact'];
        $member->member_type_id = $input['category'];
        $member->zeal_id = $input['zeal'];
        $member->save();

        return back()->with(['msg' =>'Member edited successfully.', 'class' => 'alert-success']);
    }

    public function delete($id)
    {
        $member =Member::find($id);
        if (!is_null($member)) {
            $member->delete();
            return back()->with(['msg' =>'Member deleted successfully.', 'class' => 'alert-success']);
        }
    }
}
