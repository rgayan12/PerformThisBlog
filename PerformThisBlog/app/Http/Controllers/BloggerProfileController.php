<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloggerProfile;
use App\Article;
use App\Tag;

class BloggerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = \Auth::user();

        if($user->blogger) {

            return redirect()->route('profile.edit', $user->blogger->id);
        }
        else{

            return redirect()->route('profile.create');
        }

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user  = \Auth::user();
        $tags = Tag::tags();
        return view('profile.create',compact('user','tags'));
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'twitter' => 'required'
        ],
        [
            'first_name.required' => 'first name is required',
            'last_name.required' => 'last name is required',
            'twitter.required' => 'twitter is required'
        ]); 

        BloggerProfile::create($request->all());

        return redirect()->route('profile.create');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user  = \Auth::user();

        $profile = BloggerProfile::where('slug',$slug)->get()->first();
        $myarticles = Article::where('user_id', $user->id)->get();
        return view('profile.show',compact('profile','myarticles','user'));
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
        $profile = BloggerProfile::findOrFail($id);
        $user  = \Auth::user();
        $tags = Tag::tags();
        return view('profile.edit',compact('profile','user','tags'));
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
         $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'twitter' => 'required'
        ],
        [
            'first_name.required' => 'first name is required',
            'last_name.required' => 'last name is required',
            'twitter.required' => 'twitter is required'
        ]); 

        $profile = BloggerProfile::findOrFail($id);

        $profile->update($request->all());
        return redirect()->route('profile.create');
        
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
        //
    }
}
