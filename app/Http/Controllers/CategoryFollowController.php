<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryFollowController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::category()->follow($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::category()->unfollow($id);
        return back();
    }
}
