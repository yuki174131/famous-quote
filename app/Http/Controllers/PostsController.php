<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = Post::orderBy('created_at', 'desc')->paginate(20);
            
        }
        $data = [
                'user' => $user,
                'posts' => $posts,
            ];
            
        return view('posts.index', $data);
    }
    
    public function follow_index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(20);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
        return view('users.follow', $data);
    }
    
    public function ranking_index()
    {   
        $posts = orderBy('count_posts_favorites', 'desc')->paginate(20);
        
        return view('ranking.index', $posts);
    }
}
