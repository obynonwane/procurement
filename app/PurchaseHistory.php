<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    //
    public $fillable = ['product_id','vendor_id','qty','unit_price','total','received_date'];
   
        
}
