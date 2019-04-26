<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {   
        $categories = Category::orderBy( 'updated_at', 'desc')->get();
        
        return view('welcome', ['categories' => $categories,]);
    }
    
    public function show($id)
    {
        $category = Category::find($id);
        
        return view('categories.show',[
            'category' => $category,
        ]);
    }
}
