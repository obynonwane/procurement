<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Purchase;

class Vendor extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'vendor_name','phone', 'email', 'address',
    ];

    //has many purchases
    public function purchase(){
    	return $this->hasMany('App\Purchase');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    //return all vendors 
    public function scopeAllVendor($query){
    	return $query = Vendor::all();
    }

    public function scopeSingleVendor($query, $id){
        return $query = Vendor::find($id);
    }
}
