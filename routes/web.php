<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

//route to dashboard
Route::get('/home', 'HomeController@index')->name('home');

//Route for Admin  to see Activities
Route::get('logActivity', 'HomeController@logActivity');

//View All Products 
Route::get("addMoreProduct","ProductsController@index");
//routes to add product
Route::get("addMoreProduct","ProductsController@addMoreProduct");
Route::post("addMoreProduct","ProductsController@submitMoreProduct")->name('submitMoreProduct');

//Route to view productlis
Route::get('/productlist','ProductsController@index');

//trash product
Route::get('/trash_product/{id}',[
	'uses'=>'ProductsController@destroy',
	'as'=>'product.destroy'
]);


Route::get('/edit_product/{id}',[
	'uses'=>'ProductsController@edit',
	'as'=>'products.edit'
]);
//route to to do the actual edit update
Route::post('/update_product/{id}',[
	'uses'=>'ProductsController@update',
	'as'=>'product.update'
]);

//this route returns the product that was trashed 
Route::get('/trashed','ProductsController@trashed')->name('product.trashed');

//this route delete trashed products 
Route::get('/forcedproductdelete/{id}', [
	'uses'=>'ProductsController@kill',
	'as'=>'product.delete'
]);

//this route restore deleted products 
Route::get('/productRestore/{id}', [
	'uses'=>'ProductsController@restore',
	'as'=>'product.restore'
]);



//return all vendors
Route::get('/vendors', [
	'uses'=>'VendorController@index',
	'as'=>'vendors.all'
]);

//rout to load add vendor page
Route::get('/addvendor',[
	'uses'=>'VendorController@addvendor',
	'as'=>'vendors.add'
]);

Route::post("addVendor","VendorController@submitvendor");

//Load edit vendor Page
Route::get('/edit_vendor/{id}',[
	'uses'=>'VendorController@edit',
	'as'=>'vendor.edit'
]);

//route to to do the actual edit update
Route::post('/update_vendor/{id}',[
	'uses'=>'VendorController@update',
	'as'=>'vendor.update'
]);

//trash vendor
Route::get('/trash_vendor/{id}',[
	'uses'=>'VendorController@destroy',
	'as'=>'vendor.destroy'
]);

//
//this route returns the vendors that was trashed 
Route::get('/trashed_vendor','VendorController@trashed');

//this route delete trashed vendors 
Route::get('/forcedelete/{id}', [
	'uses'=>'VendorController@kill',
	'as'=>'vendor.delete'
]);

//this route restore deleted vendors 
Route::get('/vendorRestore/{id}', [
	'uses'=>'VendorController@restore',
	'as'=>'vendor.restore'
]);

//Route to load make orders page 
Route::get('/make-order',[
	'uses'=>'PurchaseController@create',
	'as'=>'make.order'
]);
//submit purchases 
Route::post("addMorePurchase","PurchaseController@store")->name('submitMorePurchase');

//view purchases 
Route::get('/view-orders','PurchaseController@index');

//complete a purchase 
Route::get('/purchase-complete/{id}','PurchaseController@complete')->name('purchase.complete');

//cancel a purchase 
Route::get('/purchase-cancel/{id}','PurchaseController@cancel')->name('purchase.cancel');

//view canceled purchases
Route::get('/orders-canceled','PurchaseController@purchase_canceled')->name('orders.cancel');


//this route delete canceled orders 
Route::get('/forcedordersdelete/{id}', [
	'uses'=>'PurchaseController@kill',
	'as'=>'purchase.delete'
]);

//This Route helps you to view a particular vendor
Route::get('/view_vendor/{id}', [
	'uses'=>'VendorController@vendor_view',
	'as'=>'vendor.view'
]);

//load products to assign saling prices 
Route::get('/assign_saling_price','ProductsController@viewPrices');

//Load Page to Edit Price
Route::get('/price_update/{id}', [
	'uses'=>'ProductsController@priceUpdate',
	'as'=>'products.editprice'
]);

//Update the Product Price
Route::post('/update_product_sales_price/{id}',[
	'uses'=>'ProductsController@updateSalesPrice',
	'as'=>'product.updatePrice'
]);


//view Inventory
Route::get('/inventory_quantity','ProductsController@viewInventory');


//sales 
Route::get('sales-product','SalesController@index');

//sales product single
Route::get('product-details/{id}',[
	'uses'=>'SalesController@productSingle',
	'as'=>'product.single'
]);

//Add to Cart
Route::post('/cart/add',[
	'uses'=>'SalesController@add_to_cart',
	'as'=>'cart.add'
]);

//show Cart
Route::get('/cart',[
	'uses'=>'SalesController@cart',
	'as'=>'cart'
]);

//delete cart Item
Route::get('/cart_delete/{id}',[
	'uses'=>'SalesController@cart_delete',
	'as'=>'cart.delete'
]);







//Buyer Route
//rout to load add Buyer page
Route::get('/addbuyer',[
	'uses'=>'BuyerController@create',
	'as'=>'vendors.add'
]);

//submit a buyer
Route::post("submit_buyer","BuyerController@store");

//return all buyers
Route::get('/buyers', [
	'uses'=>'BuyerController@index',
	'as'=>'buyers.all'
]);

//Load edit buyer Page
Route::get('/edit_buyer/{id}',[
	'uses'=>'BuyerController@edit',
	'as'=>'buyer.edit'
]);

//route to to do the actual edit update
Route::post('/update_buyer/{id}',[
	'uses'=>'BuyerController@update',
	'as'=>'buyer.update'
]);

//trash buyer
Route::get('/trash_buyer/{id}',[
	'uses'=>'BuyerController@destroy',
	'as'=>'buyer.destroy'
]);

//this route returns the vendors that was trashed 
Route::get('/trashed_buyer','BuyerController@trashed');


//this route delete trashed Buyer
Route::get('/forcedeletebuyer/{id}', [
	'uses'=>'BuyerController@kill',
	'as'=>'buyer.delete'
]);

//this route restore deleted Buyer 
Route::get('/buyerRestore/{id}', [
	'uses'=>'BuyerController@restore',
	'as'=>'buyer.restore'
]);


//checkout route

//
Route::get('/cart/checkout', [
	'uses'=>'CheckoutController@index',
	'as'=>'cart.checkout'
]);


Route::get('/store_sales',[
	'uses'=>'SalesController@store',
	'as'=>'storesales'
]);


//Dsiaply Customer to select from 
Route::get('/selectcustomers',[
	'uses'=>'CheckoutController@customer',
	'as'=>'select.customer'
]);

//this route update cart with user id 
Route::post('/update_user_cart',[
	'uses'=>'CheckoutController@updatecart',
	'as'=>'updatecart'
]);

//route to view transaction History 
Route::get('/sales-history',[
	'uses'=>'TransactionsHistory@index',
	'as'=>'sales.history'
]);