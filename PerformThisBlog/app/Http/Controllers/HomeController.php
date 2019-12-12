<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Article;

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
        $status = array('1'=>'Published', '2'=>'Draft', '3'=>'Unpublished');
        return view ('compose',compact('tags','status'));
    }

    public function storeArticle(Request $request)
    {

        $article = Article::create($request->all());


        return response()->json(['article' => $article, 'message' => 'Success'], 200);

    }

     public function formSubmit(Request $request)
    {
        return response()->json([$request->all()]);
    }


    public function handleTags(Request $request, Article $article){
        //Once the article is saved we deal with the Tag

        $tagNames = explode(',', $request->get('tags'));

        //create all tags
        foreach ($tagNames as $value) {
           Tag::firstOrCreate(['name' => $value]);
        }

    }
}

