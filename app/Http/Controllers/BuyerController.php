<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::AllBuyer();

        $viewData = [
            'buyers'=>$buyers
        ];

        return view('dashboard.allbuyers', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.addbuyer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'buyer_sname' => 'required',
            'buyer_fname' => 'required',
            // 'email' => 'unique:vendors',
            'buyer_phone'=>'required|unique:buyers',
            'buyer_address'=>'required',
          ]);
       
          $buyers = Buyer::create([
            'buyer_sname'=>$request->buyer_sname,
            'buyer_fname'=>$request->buyer_fname,
            'buyer_email'=>$request->buyer_email,
            'buyer_phone'=>$request->buyer_phone,
            'buyer_address'=>$request->buyer_address,
          ]);

        
          \LogActivity::addToLog('Added A new Customer.'); //Activity Log
        return redirect()->back()->with('success','New Customer Added Succesfully.');
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
        
        $buyers = Buyer::find($id);

        return view('dashboard.editbuyer')->with('buyers', $buyers);
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
         $this->validate($request,[
            'buyer_sname' => 'required',
            'buyer_fname' => 'required',
            // 'email' => 'unique:vendors',
            'buyer_phone'=>'required|unique:buyers',
            'buyer_address'=>'required',
          ]);


        $buyer = Buyer::find($id);
        
        $buyer->buyer_sname = $request->buyer_sname;
        $buyer->buyer_fname = $request->buyer_fname;
        $buyer->buyer_email = $request->buyer_email;
        $buyer->buyer_phone = $request->buyer_phone;
        $buyer->buyer_address = $request->buyer_address;
        $buyer->save();

      \LogActivity::addToLog('Updated A Customer.'); //Activity Log    
      return back()->with('success', 'Customer updated succesfully');
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
        $buyer = Buyer::find($id);
        $buyer->delete();

        \LogActivity::addToLog('Trashed a Customer'); //Activity LOg  
        return back()->with('success', 'Customer Deleted.');
     
    }

    //function to return trashed data to view
    public function trashed(){
      $buyers = Buyer::onlyTrashed()->get();
      return view('dashboard.trashedbuyers')->with('buyers', $buyers);
    }

     //this function permanently delete the Customer
      public function kill($id){
        $vendor = Buyer::withTrashed()->where('id', $id)->first();
        $vendor->forceDelete();
  
        \LogActivity::addToLog('Permanently Deleted A Customer.'); //Activity Log  
        return back()->with('success', 'Customer Permanently Deleted');
      }
  
      //function to restore trashed post
      public function restore($id){
        
        $vendor = Buyer::withTrashed()->where('id', $id)->first();
        $vendor->restore();
  
        \LogActivity::addToLog('Restored A Customer.'); //Activity Log  
        return back()->with('success', 'Customer Restored Back');
        
      }
}
