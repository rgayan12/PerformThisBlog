<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class ArticleComment extends Model
{
	protected $table = "articlecomments";

	protected $fillable = ['article_id','name','email','ip','user_agent','uid','message','published'];

    //
    public function article(){
    	return $this->belongsTo(Article::class);

    }
}


