<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable=['product_id','product_name','product_qty','product_price','user_id','sub_total'];


    public function scopeTotal($query){
            $countData = Cart::where('user_id', Auth::user()->id)->get();
            return  $query = $countData->sum('sub_total');
    }
    
}
