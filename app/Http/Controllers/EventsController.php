<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Event;

class EventsController extends Controller
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
        $events = Event::where('org_id', auth()->user()->id)->paginate(10);
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'title' => 'required',
            'description' => 'required',
            'venue' => 'required',
            'occursAt' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        // Handle file upload

        if($request->hasFile('cover_image')) {
            // Get file name with the extension
            // getClientOriginalImage() - gets whole file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/images/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Event
        $event = new Event;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->org_id = auth()->user()->id;
        $event->cover_image = $fileNameToStore;
        $event->venue = $request->input('venue');
        $event->occursAt = $request->input('occursAt');
        $event->save();

        return redirect('/events')->with('success', 'Event Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        // Check for correct user
        if(auth()->user()->id !==$event->org_id) {
            return redirect('/events')->with('error', 'Unauthorized action');
        }

        if($event->cover_image != 'noimage.jpg'){
            // Delete image
            Storage::delete('public/images/cover_images/'.$event->cover_image);
        }

        $event->delete();
        return redirect('/events')->with('success', 'Event Removed');
    }
}
