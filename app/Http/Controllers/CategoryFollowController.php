<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryFollowController extends Controller
{
    public function store(Request $request, $category_id)
    {
        \Auth::user()->follow($category_id);
        return back();
    }
    
    public function destroy($category_id)
    {
        \Auth::user()->unfollow($category_id);
        return back();
    }
    
    public function feed_posts()
    {
        $follow_user_ids = $this->followings()->pluck('categories.id')->toArray();
        return Post::whereIn('category_id',$follow_user_ids); 
    }
}