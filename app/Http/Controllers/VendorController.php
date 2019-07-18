<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    //
    public function index(){


    	$vendors = Vendor::AllVendor();

    	$viewData = [
    		'vendors'=>$vendors
    	];

    	return view('dashboard.allvendors', $viewData);
    }

    public function addvendor(){
    	return view('dashboard.addvendor');
    }

    public function submitvendor(Request $request){

        $this->validate($request,[
            'vendor_name' => 'required',
            // 'email' => 'required|unique:vendors',
            'phone'=>'required|unique:vendors',
            'address'=>'required',
          ]);
       
          $vendors = Vendor::create([
            'vendor_name'=>$request->vendor_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            
          ]);

        
        \LogActivity::addToLog('Added A new Vendor.'); //Activity Log
        return redirect()->back()->with('success','New Vendor Added Succesfully.');
    }

    public function edit($id){

    	$vendors = Vendor::find($id);

    	return view('dashboard.editvendor')->with('vendors', $vendors);
    }

    //method to to the update
    public function update(Request $request, $id){


    	$this->validate($request,[
    		'vendor_name' => 'required',
            'email' => 'required',
            'phone'=>'required',
            'address'=>'required',
    	]);

    	$vendor = Vendor::find($id);
    	
        $vendor->vendor_name = $request->vendor_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
    	$vendor->save();

      \LogActivity::addToLog('Updated A Vendor.'); //Activity Log    
   	  return back()->with('success', 'Vendor updated succesfully');
    }

     //function to trash soft delete
     public function destroy($id){

    	$vendor = Vendor::find($id);
    	$vendor->delete();

      \LogActivity::addToLog('Trashed a vendor'); //Activity LOg    
    	return back()->with('success', 'Vendor Deleted.');

    }

    //function to return trashed data to view
    public function trashed(){
      $vendors = Vendor::onlyTrashed()->get();
      return view('dashboard.trashedvendors')->with('vendors', $vendors);
    }

      //this function permanently delete the product
      public function kill($id){
        $vendor = Vendor::withTrashed()->where('id', $id)->first();
        $vendor->forceDelete();
  
        \LogActivity::addToLog('Permanently Deleted A Vendor.'); //Activity Log  
        return back()->with('success', 'vendor Permanently Deleted');
      }
  
      //function to restore trashed post
      public function restore($id){
        //query builder to get post both trashed and untrashed
        $vendor = Vendor::withTrashed()->where('id', $id)->first();
        $vendor->restore();
  
        \LogActivity::addToLog('Restored A Vendor.'); //Activity Log  
        return back()->with('success', 'Vendor Restored Back');
        
      }

      public function vendor_view($id){

        $vendors = Vendor::SingleVendor($id);
        
        $viewData = [
          'vendor'=>$vendors
        ];
  
        return view('dashboard.singlevendor', $viewData);
      }
}
