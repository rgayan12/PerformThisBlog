<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile(){
        return view('profile');
    }

    public function compose(){
        $tags = Tag::all();

       // dd($tags);
        return view ('compose',compact('tags'));
    }
}
