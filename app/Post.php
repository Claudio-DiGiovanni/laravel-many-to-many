<?php

namespace App;

use App\Traits\Slugger;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    protected $fillable = [
        'slug',
        'title',
        'image',
        'content',
        'excerpt',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
