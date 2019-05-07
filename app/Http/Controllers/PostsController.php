<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(20);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
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
    
    public function user_index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->user_posts()->orderBy('created_at', 'desc')->paginate(20);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
        return view('users.posts.index', $data);
    }
}
