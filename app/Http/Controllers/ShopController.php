<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;

class ShopController extends Controller
{
    public function index(Request $request){
        $shops = Shop::with('area', 'genre')->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('index', compact('shops','areas','genres'));
    }

    public function search(Request $request){

        $areas = Area::all();
        $genres = Genre::all();
        $query = Shop::query();

        if(!empty($request->area_id)){
            $query->where("area_id", $request->area_id);
        }

        if(!empty($request->genre_id)){
            $query->where("genre_id", $request->genre_id);
        }

        if(!empty($request->name)){
            $query->where("name", "like", "%$request->name%");
        }

        $shops = $query->get();
        return view('index', compact('shops','areas','genres'));

    }

    public function show($id, Request $request){

        $shop = Shop::find($id)->with(['area','genre'])->first();
        return view('shop.detail',compact('shop'));
    }
}
