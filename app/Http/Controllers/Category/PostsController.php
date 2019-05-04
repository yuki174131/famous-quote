<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;

class PostsController extends Controller
{
    public function index($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(20);
            $category = Category::find($id);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
                'category' => $category,
            ];
        }
        return view('categories.show', $data);
    }
    
    public function store($id,Request $request)
    {   
        $category = Category::find($id);
        
        $this->validate($request,[
            'name' => 'required|max:191',
            'content' => 'required|max:191',
        ]);
        
        $request->user()->posts()->create([
            'name' => $request->name,
            'content' => $request->content,
            'category_id' => $category->id,
        ]);

        return back() ;
    }
    
    public function destroy($id)
    {   
        $post = Post::find($id);
        
        if (\Auth::id() === $post->user_id) {
        $post->delete();
        }

        return back() ;
    }
    
    public function edit($id)
    {   
        $post = Post::find($id);
        $category = Category::find($id);
        
        if (\Auth::id() === $post->user_id) {
            return view('posts.edit',['post' => $post, 'category' => $category]);
        }
    }
    
    public function update($post_id, Request $request)
    {   
        
        $post = Post::find($post_id);
        
        $this->validate($request,[
            'name' => 'required|max:191',
            'content' => 'required|max:191',
        ]);
        
        // ログインしているユーザー
        $user = $request->user();
        // ログインユーザーの指定されたIDの投稿を取得
        $post = $user->posts()->find($post_id);
        // フォームの値を元にpostの値を変更
        $post->fill($request->all());
        // 投稿を保存
        $post->save();

        return redirect()->route('category.posts.index',['post' => $post]);
    }
    
}


