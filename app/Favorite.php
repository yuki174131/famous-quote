<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
        public function users()
    {
        return $this->hasMany(User::class);
    }
}
