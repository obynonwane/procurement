<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\User;
use App\Purchase;
use App\Product;
use App\vendor;
use App\Cart;
use App\Buyer;
use App\inventory;
use DB;

class TransactionsHistory extends Controller
{
    //


    public function index(){

       
        $salesHistory = DB::table('users')->join('sales', 'users.id', '=', 'sales.user_id')
                                       ->orderBy('sales.id', 'desc')
                                       ->get()->toArray();

    
                            $viewData = [
                                        "sales"=> $salesHistory,
                                        
                                    ];

                                  //  dd($viewData);

        return view('dashboard.saleshistory', $viewData);
    }
}
