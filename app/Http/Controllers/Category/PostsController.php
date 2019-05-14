<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index($category_id)
    {
        $data = [];
        if (\Auth::check()) {
            $category = Category::find($category_id);
            $posts = Post::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(20);
            
            $data = [
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
            'content' => 'required|max:500',
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
        $form = $this->validate($request,[
            'name' => 'required|max:191',
            'content' => 'required|max:191',
        ]);
        
        // ログインしているユーザー
        $user = $request->user();
        // ログインユーザーの指定されたIDの投稿を取得
        $post = $user->posts()->find($post_id);
        // フォームの値を元にpostの値を変更
        $post->fill($form);
        // 投稿を保存
        $post->save();

        return redirect()->route('category.posts.index',['category_id' => $post->category->id]);
    }
    
}


