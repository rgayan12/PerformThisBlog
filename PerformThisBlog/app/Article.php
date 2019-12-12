<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    protected $fillable = [

        'title',
        'slug',
        'page_image',
        'content',
        'meta_title',
        'meta_keyword',
        'canonical_link',
        'meta_description',
        'status',
        'author',
        'published_at',
        'user_id',
        'last_user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category');
        //return $this->belongsToMany(Category::class, 'audition_category')->withTrashed();
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'article_tag');
        //return $this->belongsToMany(Category::class, 'audition_category')->withTrashed();
    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function likes(){
        return $this->hasMany(\App\Models\ArticleLike::class);
    }

    public function totalLikesByIp(){
        return $this->likes()->where('article_id', $this->id)->distinct('ip')->get();
    }

    public function comments(){
        return $this->hasMany(\App\Models\ArticleComment::class);
    }

    
 

}
