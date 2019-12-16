<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class NewsfeedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at')->paginate(10);
        return view('pages.newsfeed')->with('events', $events);
    }
}
