<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ArticleLike extends Model
{
	protected $table = 'article_likes';

	protected $fillable = ['article_id', 'ip',];
    //

    public function article() {
    	return $this->belongsTo(Article::class);
    }

    

}

