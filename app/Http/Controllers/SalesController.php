<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Auth;
USE App\Sale;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::Allproduct(); //scope method
    	$viewData = [
            "products"=> $products
        ];
    	return view('dashboard.salestlist', $viewData);
    }

    public function productSingle($id){
        $products = Product::find($id);
        $viewData = [
            "product"=> $products
        ];
    	return view('dashboard.productSingle', $viewData);
    }

    public function add_to_cart(Request $request){
        $product = Product::find(request()->product_id);

        // if($product->qty < request()->qty){
        //     dd('error');
        // }else{
        //     dd('good');
        // }
        $this->validate($request,[
            'qty'=>'required',
            'product_id'=>'unique:carts'
            
        ]);
        



        $cart = Cart::create([
            'product_id'=>$product->id,
            'product_name'=>$product->name,
            'product_qty'=>request()->qty,
            'product_price'=>$product->saling_price,
            'user_id'=>Auth::user()->id,
            'sub_total'=>request()->qty * $product->saling_price,
        ]);

        $id = $cart->product_id;
        $product_qty = request()->qty;
        
        //subtracting and updating product stock after adding to cart
        $product = Product::find($id);
        $product->stock = $product->stock - $product_qty;
    	$product->save();

       

       
        return redirect()->route('cart');
      
        
    }

    //display cart Item 
    public function cart(){
        
       
        $countData = Cart::where('user_id', Auth::user()->id)->get();
         
         $total = Cart::Total();
        
        $viewData = [
            "cartCount"=> $countData,
            'itemTotal'=>$total,
        ];

       
        
        return view('dashboard.cart', $viewData);

    }

    public function cart_delete($id){

        $cart = Cart::where('id', $id)->first();
        $product_id = $cart->product_id;
        $cart_qty = $cart->product_qty;
        
        
        
        
        // //subtracting and updating product stock after adding to cart
           $product = Product::find($product_id);
           $product->stock = $product->stock + $cart_qty;
           $product->save();
        
       
        $cart->forceDelete();

      \LogActivity::addToLog('Deleted Cart Item.'); //Activity Log  
      return back()->with('success', 'Item Removed Succesfully');
    }

    public function cartshow(Cart $cart){
        return view('dashboard.model', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
        //updating sales for History Keeping
        $countData = Cart::where('user_id', Auth::user()->id)
        ->select('product_id', 'product_name','product_qty','product_price','user_id','sub_total','buyer_id')
        ->get()->toArray();
            //dd($countData);
        
        foreach ($countData as $key => $value) {

            Sale::create($value);

           

        }

        $cart = Cart::where('user_id', Auth::user()->id);
        $cart->forceDelete();

        \LogActivity::addToLog('Purchased Made.'); //Activity LOg    
        return back()->with('success', 'Products Sold Successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view('dashboard.testing');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
