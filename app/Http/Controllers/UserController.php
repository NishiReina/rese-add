<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class UserController extends Controller
{
    //

    public function index(Request $request){

        $user_id = Auth::id();
        $likes = Like::where('user_id', $user_id)->with('shop')->get();

        return view("mypage", compact('likes'));
    }
}
