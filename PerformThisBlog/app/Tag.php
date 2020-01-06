<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    protected $base_table = 'tags';

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'tag_id');
    }


    public static function tags()
    {
        return static::pluck('name', 'id');
    }
}
