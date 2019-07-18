<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Purchase extends Model
{
    //
    protected $fillable = [
        'product_id','vendor_id','qty','unit_price','total_price','date_ordered','date_expected','order_completed','order_canceled',
    ];

    //Inverse of One to One
    public function product(){
    	return $this->belongsTo('App\Product');
    }

    //Inverse of hasMany One to Many 
    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }

    //This method returns all the products 
    public function scopeAllVendor($query){
    	return $query = Vendor::all();
    }

    //this method return purchases not closed or canceld 
    public function scopeAllPurchases($query){
        return $purchases = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')
                                                ->where('order_completed', '=', NULL)
                                                ->where('order_canceled', '=', NULL)
                                                ->orderBy('purchases.id', 'desc')
                                                ->get();
    }


    //This Method Sum ALL purchases 
    public function scopeAllPurchaseSum($query){
        return $purchases = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')
                                                ->where('order_completed', '=', NULL)
                                                ->where('order_canceled', '=', NULL)
                                                ->sum('total_price');
    }

    //this funtion returns canceled orders 
    public function scopeAllPurchasesCanceled($query){

        return $query = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')
                                                ->where('order_canceled', '!=', NULL)
                                                ->orderBy('purchases.id', 'desc')
                                                ->get();
        
    }
}
