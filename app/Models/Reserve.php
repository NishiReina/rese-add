<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reserve extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

}
