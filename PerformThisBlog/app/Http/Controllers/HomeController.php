<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\Storage;

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
        $article = new Article;
        return view ('compose',compact('tags','status','article'));
    }

    public function storeArticle(Request $request)
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

    }

     public function formSubmit(Request $request)
        {
            return response()->json([$request->all()]);
        }


    public function handleTags(Request $request, Article $article){

        //Once the article is saved we deal with the Tag
        $tagNames = $request->tags;

        //create all tags
        foreach ($tagNames as $value) {
           Tag::firstOrCreate(['name' => $value]);
        }

    }

    public function myArticles(){

        $userID = auth()->user()->id;
        $myarticles = Article::where('user_id', $userID)->get();
        return view('myarticles', compact('myarticles'));

    }
}

