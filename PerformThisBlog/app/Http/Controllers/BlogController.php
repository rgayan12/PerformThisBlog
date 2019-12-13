<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
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
        $userID = auth()->user()->id;
        $myarticles = Article::where('user_id', $userID)->get();
        return view('myarticles', compact('myarticles'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $status = array('1'=>'Published', '2'=>'Draft', '3'=>'Unpublished');
        $article = new Article;
        return view ('compose',compact('tags','status','article'));
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
            'page_image' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
        ],
        [
            'page_image.mimes' => 'We only support JPEG, PNG , GIF and WebP',
            'page_image.max' => 'Allowed max size is 2MB'
        ]); 
 
 
         $file = $request->file('page_image');
 
         $path = $request->file('page_image')->storeAs('blog-images', $file->getClientOriginalName(), 's3');
 
         $article = Article::create($request->all());
         $article->page_image = $path;
         $article->save();
 
         $this->handleTags($request, $article);  
 
         return response()->json(['article' => $article, 'message' => 'Success'], 200);
        //
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
        $tags = Tag::all();
        $status = array('1'=>'Published', '2'=>'Draft', '3'=>'Unpublished');
        $article = Article::findOrFail($id);
        return view ('compose',compact('tags','status','article'));
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
        //
    }

    public function handleTags(Request $request, Article $article){

        //Once the article is saved we deal with the Tag
        $tagNames = $request->tags;

        //create all tags
        foreach ($tagNames as $value) {
           Tag::firstOrCreate(['name' => $value]);
        }

    }

}
