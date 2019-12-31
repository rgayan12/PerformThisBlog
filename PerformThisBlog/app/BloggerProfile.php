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
}
