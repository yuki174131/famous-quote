<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;

class Category extends Model
{   
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function followed_user()
    {
        return $this->belongsTomany(User::class, 'category_follow', 'category_id', 'user_id')->withTimestamps();
    }
}