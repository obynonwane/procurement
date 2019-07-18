<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Vendor;
use App\Purchase;
use DB;

class ProductsController extends Controller
{
    //
    public function index(){

    	$products = Product::Allproduct(); //scope method
    	$viewData = [
            "products"=> $products
        ];
    	return view('dashboard.productlist', $viewData);
    }

	//This Method is used to return the view to add product
	     public function addMoreProduct()
     {
        $vendors = Vendor::AllVendor(); //scope method
          $viewData = [
                "vendors"=> $vendors
            ];
        return view("dashboard.addMoreproducts",$viewData);
     }


      public function submitMoreProduct(Request $request)

    {

        $request->validate([

            'product.*.name' => 'required',

            'product.*.description' => 'required',

            'product.*.vendor_id'=>'required',

            'product.*.stock'=>'required',


        ]);

    

        foreach ($request->product as $key => $value) {

            Product::create($value);

        }

		\LogActivity::addToLog('Created Products.'); //Activity LOg    
        return back()->with('success', 'Record Created Successfully.');

    }

    //function to trash soft delete
     public function destroy($id){

    	$product = Product::find($id);
    	$product->delete();

      \LogActivity::addToLog('Trashed a Product'); //Activity LOg    
    	return back()->with('success', 'Product Deleted.');

    }


    //funtion to load the edit page and populate 
    public function edit($id){

    	$products = Product::find($id);
      $vendor = Product::find($id)->vendor;
      $vendor2  = Vendor::all();
      //dd($vendor2);
        $viewData = [
          'product'=>$products,
          'vendor'=>$vendor,
          'vendor2'=>$vendor2
        ];

    	return view('dashboard.editproduct',$viewData);
    }

    //method to to the update
    public function update(Request $request, $id){


    	$this->validate($request,[
    		'name'=>'required',
    		'description'=>'required',
        'vendor_id' =>'required',
        'stock' =>'required'
    	]);

    	$product = Product::find($id);
    	
    	$product->name = $request->name;
    	$product->description = $request->description;
      $product->vendor_id = $request->vendor_id;
      $product->stock = $request->stock;
    	$product->save();

      \LogActivity::addToLog('Updated A Product.'); //Activity Log    
   	  return back()->with('success', 'Product updated succesfully');
    }

    //function to return trashed data to view
    public function trashed(){
      $products = Product::onlyTrashed()->get();
      return view('dashboard.trashedproducts')->with('products', $products);
    }

    //this function permanently delete the product
    public function kill($id){
      $product = Product::withTrashed()->where('id', $id)->first();
      $product->forceDelete();

      \LogActivity::addToLog('Permanently Deleted A Product.'); //Activity Log  
      return back()->with('success', 'Product Permanently Deleted');
    }

    //function to restore trashed post
    public function restore($id){
      //query builder to get post both trashed and untrashed
      $product = Product::withTrashed()->where('id', $id)->first();
      $product->restore();

      \LogActivity::addToLog('Restored A Product.'); //Activity Log  
      return back()->with('success', 'Product Restored Back');
      
    }

    public function viewPrices(){
      $products = Product::Allproduct(); //scope method
    	$viewData = [
            "products"=> $products
        ];
    	return view('dashboard.productlistwithprices', $viewData);
    }

    public function priceUpdate($id){
      $products = Product::find($id);

    	return view('dashboard.editprice')->with('product', $products);
    }

    //method to to the update
    public function updateSalesPrice(Request $request, $id){


    	$this->validate($request,[
    		'saling_price'=>'required|numeric',
    	]);

    	$product = Product::find($id);
    	
    	$product->saling_price = $request->saling_price;
    	$product->save();

      \LogActivity::addToLog('Updated A Product Selling Price.'); //Activity Log    
   	  return back()->with('success', 'Price updated succesfully');
    }

    public function viewInventory(){

     

      $inventory = DB::table('products')
      ->join('vendors', 'products.vendor_id', '=', 'vendors.id')
      ->get();
      //$sumProd = Product::all()->sum('total');

      //dd($total);

      $viewData = [
        'inventory'=>$inventory,
      ];

      
      // dd($inventory);
     
      return  view('dashboard.viewInventory', $viewData);
    }
}
