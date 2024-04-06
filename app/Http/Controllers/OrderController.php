<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order_Detail;
use App\Models\Transaction;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
   
   $orders=Order::with('products')->get();
   $products=Product::with('orders')->get();
   
   

   
        
        return view('orders.index', compact(['orders','products']));
    }
   //
    

    /**
     * Show the form for creating a new resource.
   

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $orders1=Order::with('products')->get();
   $products1=Product::with('orders')->get();
        
        return view('orders.index', compact('orders1','products1'));
       DB::beginTransaction(function() use($request){
          
      
    $orders2=new Order;

    $orders2->name=$request->customer_name;
    $orders2->phone=$request->customer_phone;
    $order_id=$orders2->id;
    $orders2->save();
 
    for($product_id=0; $product_id <count($request->product_id);$product_id++){


    $order_details=new Order_Detail;
    $order_details->order_id=$order_id;
    $order_details->product_id=$request->product_id[$product_id];
    $order_details->quantity=$request->quantity[$product_id];
    $order_details->discount=$request->discount[$product_id];
    $order_details->amount=$request->total_amount[$product_id];
    $order_details->save();
 }
   

    $transaction=new Transaction;
    $transaction->order_id=$order_id;
    $transaction->user_id=auth()->user()->id;
    $transaction->paid_amount=$request->paid_amount;
    $transaction->balance=$request->balance;
    $transaction->payment_method=$request->payment_method;
    $transaction->discount=$request->discount;
    $transaction->transact_amount=$order_details->amount;
    $transaction->transact_date=date('Y-m-d');
    $transaction->save();


    $products2=Product::all();
    $order_details1=Order_Detail::where('order_id'->$order_id)->get();
    $orderedBy=Order::where('id',$order_id)->get();
   
    return view('orders.index',[
        'products=>$products2',
        'order_details'=>$order_details1,
        'customer_orders'=>$orderedBy
    ]);

 });
    return "products fail to insert";
    
      
        
    } //
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit_Data($id ){
  
}
 public function update_Data(Request $request ,$id ){
   
}
public function delete_Data( $id){
  
}
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ){

    }

}
