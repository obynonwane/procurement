<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Buyer;
use DB;

class CheckoutController extends Controller
{
    
    public function index(){

    	$customers = Buyer::all();

    	 $countData = Cart::where('user_id', Auth::user()->id)->get();

    	          
         $total = Cart::Total();
        
        $viewData = [
            "cartCount"=> $countData,
            'itemTotal'=>$total,
            "customers"=>$customers,
        ];
    	return view('dashboard.checkout', $viewData);
    }

    public function customer(){
       
    	$customers = Buyer::all();

        $countData = Cart::where('user_id', Auth::user()->id)->get();

                 
        $total = Cart::Total();
       
       $viewData = [
           "cartCount"=> $countData,
           'itemTotal'=>$total,
           "customers"=>$customers,
       ];
       return view('dashboard.selectcustomers', $viewData);
    }

    public function updatecart(Request $request){
        $user = Cart::where('user_id', Auth::user()->id)->first();
       
        $id = $user->id;

        $cart = Cart::find($id);
       // dd($cart);
    	
    	$cart->buyer_id = $request->buyer_id;
        $cart->save();
        
       // DB::table('carts')->where('user_id', $user->user_id)->update(['buyer_id'=>  $request->buyer_id]);

        return redirect()->route('cart.checkout');
    }
}

