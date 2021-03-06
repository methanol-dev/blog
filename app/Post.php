<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->hasMany('App\Tag', 'postID', 'id');
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }
}
