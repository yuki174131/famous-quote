<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Favorite;

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
    
    public function followIndex()
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
    
    public function rankingIndex()
    {   
        $posts = Post::withCount('favorites')->orderBy('favorites_count', 'desc')->paginate(20);       
        
        return view('ranking.index', ['posts' => $posts]);
    }
    
    public function search(Request $request)
    {   
        $data =[];
        $posts = Post::where('name', 'like',"%{$request->search}%")
                ->orWhere('content', 'like',"%{$request->search}%")
                ->withCount('favorites')
                ->orderBy('favorites_count', 'desc')
                ->paginate(20);
        
        $search_result = $request->search . 'の検索結果' .$posts->total() . '件';
        
        $data = [
            'posts' => $posts,
            'search_result' => $search_result,
            ];
        
        return view('ranking.index', $data);
    } 
}
