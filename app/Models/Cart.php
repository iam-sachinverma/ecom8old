<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public static function userCartItems(){
        if(Auth::check()){
            $userCartItems = Cart::with(['product'=>function($query){
                $query->select('id','product_name','product_code','main_image');
            }])->where('user_id',Auth::user()->id)
            ->get()->toArray();   
        }else{
            $userCartItems = Cart::with(['product'=>function($query){
                $query->select('id','product_name','product_code','main_image');
            }])->where('session_id',Session::get('session_id'))
            ->get()->toArray();
        }
        return $userCartItems;
    }
}
