<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){

        if (!Auth::guest()) {
            return redirect('/dashboard')->with('success', 'User already logged in');
        } else {
            $title = 'Welcome to The Org Hub!';
            // return view('pages.index', compact('title'));
            return view('pages.index')->with('title', $title);
        }
    }

    public function profile(){
        return view('pages.profile');
    }
    // public function about(){
    //     $title = 'About Us';

    //     return view('pages.about')->with('title', $title);
    // }
    // public function services(){
    //     $data = array(
    //         'title' => 'Services',
    //         'services' => ['Web Design', 'Programming', 'SEO']
    //     );
    //     return view('pages.services')->with($data);
    // }
}
