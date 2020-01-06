<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\CustomLibraries\Slug;

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
        $user = \Auth::User();

        $userID = $user->id;
        $myarticles = Article::where('user_id', $userID)->paginate(5);

        return view('article.index', compact('myarticles','user'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::User();

        $tags = Tag::tags();

        $status = array('1'=>'Published', '2'=>'Draft', '3'=>'Unpublished');
        
        if($user->role_id == 7){
           $status['4'] = 'Published by Moderator';
        }

        $article = new Article;

         
        
        return view ('article.create',compact('tags','status','article','user'));
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
        $user = \Auth::User();

        $request->validate([
            'page_image' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'content' => 'required'
        ],
        [
            'page_image.mimes' => 'We only support JPEG, PNG , GIF and WebP',
            'page_image.max' => 'Allowed max size is 2MB',
            'content.required' => 'This is a required field'
        ]); 

         if($request->hasFile('page_image')){
              $image_name = $this->processImages($request);
         }
         else{
             $image_name = null;
         }

         $base_url = "http://performthis.com";

         $slug = new Slug();   
         $article = Article::create($request->all());
         $article->slug =  $slug->createSlug($request->title, Article::class);

         $article->page_image = $image_name;
         $slugs = $article->slug;

         $article->last_user_id = $user->id;
         $article->canonical_link = $base_url."/article/".$slugs;
         $article->meta_title = $article->title;
         $article->meta_description = $request->summary;
         $article->save();
 
         $TagsToSave = $this->handleTags($request, $article);  

         $article->tags()->sync(array_filter((array)$TagsToSave));  

         return redirect()->route('article.index');
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

        $user = \Auth::User();

        $tags = Tag::tags();
        $status = array('1'=>'Published', '2'=>'Draft', '3'=>'Unpublished');
        if($user->role_id == 7){
           $status['4'] = 'Published by Moderator';
        }

        $article = Article::findOrFail($id);
        return view ('article.edit',compact('tags','status','article','user'));
   
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
        $article = Article::findOrFail($id);

        $article->update($request->except('user_id'));  

        $TagsToSave = $this->handleTags($request, $article);  
        $article->tags()->sync(array_filter((array)$TagsToSave));  

        if($request->hasFile('page_image')){
            $image_name = $this->processImages($request);
            $article->page_image = $image_name;
            $article->save();
        }

       

        return redirect()->route('article.index');

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

        $newtags = array();
        //create all tags
        foreach ($tagNames as $value) {
            
         if(!is_numeric($value))
            {
                $tt = Tag::firstOrCreate(['name' => $value]);
                $newtags[] = $tt->id;    
            }
         else{
                $newtags[] = $value;
         }

        }
        return $newtags;
    }


    public function processImages(Request $request){

            $file = $request->file('page_image');
            $date = date('Y-m-d H:i:s', time());
            $nfileName = $date.$file->getClientOriginalName(); 
            $thumbImage = Image::make($request->file('page_image'))->resize(300, null, function($constraint){
                $constraint->aspectRatio();
            });

            //Store the Thumbnail
            Storage::disk('s3')->put('blog-images/thumbnails/'.$nfileName,
                $thumbImage->stream(), 'public');

            //Store the actual Version
            Storage::disk('s3')->put('blog-images/'.$nfileName, file_get_contents($request->file('page_image')), 'public');
            //  $request->file('page_image')->storeAs('blog-images/', $nfileName, 's3','public');
                


//            $file = $request->file('page_image');

  //          $path = $request->file('page_image')->storeAs('blog-images/thumbnails/', $file->getClientOriginalName(), 's3');
        return $nfileName;

    }
}
