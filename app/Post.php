<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['tag_id', 'image'];
    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        return $this->image ? asset("storage/{$this->image}") : null;
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
