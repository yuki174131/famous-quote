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

        return view('users.show', [
            'user' => $user,
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
        $posts = $user->favorites()->paginate(15);
        
        $data = [
            'user' => $user,
            'posts' => $posts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
}
