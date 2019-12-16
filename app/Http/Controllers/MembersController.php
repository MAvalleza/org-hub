<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;

class MembersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::where('org_id', auth()->user()->id)->paginate(10);
        return view('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'contact_no' => 'nullable',
            'email' => 'nullable'
        ]);

        // Create Member
        $member = new Member;
        $member->name = $request->input('name');
        $member->org_id = auth()->user()->id;
        $member->course = $request->input('course');
        $member->year_level = $request->input('year_level');
        $member->contact_no = $request->input('contact_no');
        $member->email = $request->input('email');
        $member->save();

        return redirect('/members')->with('success', 'Member added!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);

        // Check for correct user
        if(auth()->user()->id !==$member->org_id) {
            return redirect('/members')->with('error', 'This person is not a member of your organization');
        }
        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'contact_no' => 'nullable',
            'email' => 'nullable'
        ]);

        // Update Member
        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->course = $request->input('course');
        $member->year_level = $request->input('year_level');
        $member->contact_no = $request->input('contact_no');
        $member->email = $request->input('email');
        $member->save();

        return redirect('/members')->with('success', 'Member updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        // Check for correct user
        if(auth()->user()->id !==$member->org_id) {
            return redirect('/members')->with('error', 'This person is not a member of your organization');
        }

        $member->delete();
        return redirect('/members')->with('success', 'Member removed');
    }
}
