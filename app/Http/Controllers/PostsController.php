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
            $category = $posts->category();
            
            $data = [
                'user' => $user,
                'posts' => $posts,
                'cotegory' => $category,
            ];
        }
        return view('categories.show', $data);
    }
    
    public function store(Request $request)
    {   
        
        $this->validate($request,[
            'name' => 'required|max:191',
            'content' => 'required|max:191',
        ]);
        
        $request->user()->category()->posts()->create([
            'name' => $request->name,
        ]);
        
        $request->user()->category()->posts()->create([
            'content' => $request->content,
        ]);
        
        return back();
    }
    
    public function edit($id)
    {  
        $post = Post::find($id);
        
        if ($post->user_id === \Auth::id()) {
        
        return view('posts.edit', [
            'task' => $task,
        ]);
        } else {
            return redirect('/');
        }
    }
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }
        
        return back();
    }
}
