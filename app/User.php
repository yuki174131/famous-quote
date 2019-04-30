<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function followings()
    {
        return $this->belongsTomany(Category::class, 'category_follow', 'user_id', 'category_id')->withTimestamps();
    }
    
    public function is_following($categoryId)
    {
        return $this->followings()->where('category_id', $categoryId)->exists();
    }
    
    public function follow($categoryId)
    {
        //既にフォローしているかの確認
        $exist = $this->is_following($categoryId);
        
        if($exist) {
            //既にフォローしていれば何もしない
            return false;
        } else {
            //フォローしてなければする
            $this->followings()->attach($categoryId);
            return true;
        }
    }
    
    public function unfollow($categoryId)
    {
        //既にフォローしているかの確認
        $exist = $this->is_following($categoryId);
        
        if($exist) {
            //既にフォローしていれば外す
            $this->followings()->detach($categoryId);
            return true;
        } else {
            //お気に入りしてなければ何もしない
            return false;
        }
    }
}
