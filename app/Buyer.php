<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{

	use SoftDeletes;
    //
    protected $fillable = ['buyer_sname','buyer_fname','buyer_email','buyer_phone','buyer_address','buyer_id'];


    public function sales(){
    	return $this->hasMany('App\Sale');
    }

    //return all vendors 
    public function scopeAllBuyer($query){
    	return $query = Buyer::all();
    }
}
