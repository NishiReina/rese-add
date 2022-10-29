<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request){
        
        $user_id = Auth::id();
        $form = [
            "user_id" => $user_id,
            "shop_id" => $request->shop_id
        ];
        Like::create($form);
        return back();
    }

    public function delete(Request $request){
        $user_id = Auth::id();
        $like = Like::where('user_id', $user_id)->where('shop_id', $request->shop_id)->first();
        $like->delete();
        return back();
    }
    
}
