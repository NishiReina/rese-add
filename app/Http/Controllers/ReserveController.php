<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function store(Request $request){
        $user_id = Auth::id();
        $form = [
            'user_id' => $user_id,
            'shop_id' => $request->shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'num' => $request->num
        ];
        Reserve::create($form);
        return back();
    }

    public function delete(Request $request){
    
        return back();
    }
}
