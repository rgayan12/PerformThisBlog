<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloggerProfile extends Model
{
	 protected $table = 'blogger_profile';

	 protected $fillable = ['user_id','first_name','last_name','avatar','summary','twitter','linkedin'];


	  public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class, 'blogger_tags');
        //return $this->belongsToMany(Category::class, 'audition_category')->withTrashed();
    }

}
