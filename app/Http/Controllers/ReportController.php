<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order_Detail;
use App\Models\Transaction;

use App\Models\Order;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $orders=Order::with('products')->get();
   $products=Product::with('orders')->get();
   $Total1=Order::count();
   $Total2=Product::count();
   

    
        
        return view('reports.index',compact(['orders','products']));


    }
    //
}
