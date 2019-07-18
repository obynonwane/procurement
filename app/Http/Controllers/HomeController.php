<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $inventory = DB::table('products')
        ->join('vendors', 'products.vendor_id', '=', 'vendors.id')
        ->get();
        //$sumProd = Product::all()->sum('total');
  
        //dd($total);
  
        $viewData = [
          'inventory'=>$inventory,
        ];
  
        return view('dashboard.dashboard', $viewData);
    }

     public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }
}
