<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;
use App\Post;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->user_posts()->withCount('favorites')->orderBy('created_at', 'desc')->paginate(20);
        $user_favorites = $user->favorites()->count();

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            'user_favorites' => $user_favorites,
        ]);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $categories = $user->followings();
        
        $data = [
            'user' => $user,
            'categories' => $categories,
        ];
        
        $data += $this->counts($user);
        
        return view('categories.follow', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $posts = $user->favorites()->withCount('favorites')->paginate(15);
        $user_favorites = $user->favorites()->count();
        
        $data = [
            'user' => $user,
            'posts' => $posts,
            'user_favorites' => $user_favorites,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
}
