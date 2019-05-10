<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Category;

class Post extends Model
{
    protected $fillable = ['category_id', 'user_id', 'name', 'content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function favorite_user()
    {
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id')->withTimestamps();;
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
