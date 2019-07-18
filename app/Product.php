<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Vendor;

class Product extends Model
{
	 use SoftDeletes;
    //
	protected $dates = ['deleted_at'];
    public $table = "products";
    public $fillable = ['name','description','stock','saling_price','vendor_id',];


    //relationship with the Purchase Model
    public function purchases(){
    	return $this->hasOne('App\Purchase');
    }

    public function vendor(){
        return $this->belongsTo('App\Vendor');
    }


    //This method returns all the products 
    public function scopeAllProduct($query){
    	return $query = Product::all();
    }


}
