<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Product;
use App\Purchase;
use App\PurchaseHistory;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view all purchases not completed or not canceled
        $purchase = Purchase::AllPurchases(); //scope method
        $purchasesum = Purchase::AllPurchaseSum();
        
        $viewData =[
            "purchases" => $purchase,
            "sum_total" =>$purchasesum
        ];
        return view('dashboard.vieworders', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::AllVendor();
        $products = Product::AllProduct(); //scope method
    	$viewData = [
            "vendors"=> $vendors,
            "products"=>$products,
        ];
        
        return view('dashboard.makeorders', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'product.*.product_id' => 'required',
            'product.*.vendor_id' => 'required',
            'product.*.qty' => 'required',
            'product.*.unit_price' => 'required',
            'product.*.total_price' => 'required',
            'product.*.date_ordered' => 'required',
            'product.*.date_expected' => 'required',


        ]);

    

        foreach ($request->product as $key => $value) {

            Purchase::create($value);

        }

		\LogActivity::addToLog('Placed Order.'); //Activity LOg    
        return back()->with('success', 'Purchased made Succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    public function complete(Request $request, $id){

        
        $purchase = Purchase::find($id)
                ->where('order_completed', '=', NULL)
                ->where('order_canceled', '=', NULL)
                ->first();
    	
    	$purchase->order_completed = NOW();
    	
        $purchase->save();


        //updating product stock
        $product = Product::find($purchase->product_id)->first();
        $product->stock = $purchase->qty + $product->stock;
        $product->save();


       

        //create purchase History
        $puchasehistory = PurchaseHistory::create([
            'product_id'=>$purchase->product_id,
            'vendor_id'=>$purchase->vendor_id,
            'qty'=>$purchase->qty,
            'unit_price'=>$purchase->unit_price,
            'total'=>$purchase->total_price,   
            'received_date'=>NOW(),            
          ]);


        
       

      \LogActivity::addToLog('Product received in good faith.'); //Activity Log    
   	  return back()->with('success', 'Order Completed');

    }

    public function cancel(Request $request, $id){

        
        $purchase = Purchase::find($id)
                ->where('order_completed', '=', NULL)
                ->where('order_canceled', '=', NULL)
                ->first();
    	
    	$purchase->order_canceled = NOW();
    	
    	$purchase->save();

      \LogActivity::addToLog('Product Purchase Canceled.'); //Activity Log    
   	  return back()->with('success', 'Order Canceled');

    }

    //return orders canceled 
    public function purchase_canceled(){
        //view all purchases  canceled
        $purchase = Purchase::AllPurchasesCanceled(); //scope method


        $viewData =[
            "purchases" => $purchase
        ];
        return view('dashboard.canceledorders', $viewData);
    }
     //this function permanently delete the product
     public function kill($id){
        $purchase = Purchase::where('id', $id)->first();
        $purchase->forceDelete();
  
        \LogActivity::addToLog('Permanently Deleted A Canceled Order.'); //Activity Log  
        return back()->with('success', 'Order Permanently Deleted');
      }
  

}
