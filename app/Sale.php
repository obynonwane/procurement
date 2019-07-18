<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $fillable=['product_id','product_name','product_qty','product_price','user_id','sub_total','buyer_id'];
    //A sale Histor belongs to a Buyer

    public function buyer(){
    	return $this->belongsTo('App\Buyer');
    }

}
