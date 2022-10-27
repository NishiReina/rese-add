<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "image_url", "area_id", "genre_id"];

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }

    public function getLiked(){
        
        $user_id = Auth::id();
        $like = Like::where('user_id', $user_id)
            ->where('shop_id', $this->id)
            ->first();

        if($like){
            return true;
        }else{
            return false;
        }
        
    }
}
