<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{
    public function store(ReserveRequest $request){
        $user_id = Auth::id();
        $form = [
            'user_id' => $user_id,
            'shop_id' => $request->shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'num' => $request->num
        ];
        Reserve::create($form);
        return view('shop.thanks');
    }

    public function update(ReserveRequest $request){
        $form = $request->all();
        unset($form['_token']);
        Reserve::find($request->id)->update($form);
        return back();
    }

    public function delete(Request $request){
        Reserve::find($request->id)->delete();
        return back();
    }
}
