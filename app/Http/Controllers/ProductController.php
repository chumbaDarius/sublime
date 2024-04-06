<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $Total=Product::count();
     $products=Product::all();

        
        return view('products.index', compact(['Total','products']));
   //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insert(Request $request)
    {
        
       $product=new product;

       $product->product_name=$request->name;
       $product->description=$request->description;
       $product->brand=$request->brand;
       $product->price=$request->price;
       $product->quantity=$request->quantity;
        $product->alert_stock=$request->stock;
       $product->save();
        if ($product){
            return redirect()->back()->with('product created successfully');
        }
      else{
        return redirect ()->back()->with('product fail to create');
      } 
        
    }
     public function select(Request $request){
  $ids=$request->ids;
  product::whereIn('id',$ids)->delete();
  return response()->json(["success"=>"product have been deleted!."]);
}
    

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
   $data= Product::find($id);
  return view('products.index',compact('data')) ; 
        
}
 public function update_Data(Request $request ,$id ){
   $product= Product::find($id);
   
       $product->product_name=$request->input('name');
       $product->description=$request->input ('description');
       $product->brand=$request-> input ('brand');
       $product->price=$request->input('price');
       $product->quantity=$request->input('quantity');
       $product->alert_stock=$request->input('stock');
       $product->save();

       
        if ($product){
            return redirect()->back()->with('product updated successfully');
        }
      else{
        return redirect ()->back()->with('product fail to update');
      } 
        
}
public function delete_Data( $id){
    DB::table('products')->where('id',$id)->delete();
    return back();
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
     public function search(Request $request ){
   $key=0;
  $output='';
  $products=Product::where('product_name','Like','%'.$request->search.'%')->orWhere('brand','Like','%'.$request->search.'%')->get();
   foreach($products as $key=> $product)
   {
    $output.=
    '<tr>
     <td>'.'<input type="checkbox" name="ids" class="checkbox-ids"  value=""</td>'.'
      <td>'.$key.'</td>
      <td>'.$product ->product_name.'</td>
      <td>'.$product ->description.'</td>
      <td>'.$product ->brand.'</td>
      <td> Ksh'. number_format($product ->price,2).'</td>
      <td>'.$product->quantity.'</td>
       <td> @if ('. $product->alert_stock===1 .')in-stock 
                 @else
                out-stock
              @endif </td>
              <td>'.$product->updated_at.'</td>
              <td>
                <div class="btn-group">
                  <a href="edit_Data/'.$product->id.'" class="btn btn-info btn-sm" data-bs-toggle="modal" 
                  data-bs-target="#editproduct'.$product->id.'">
                  <i class="fa fa-edit"></i>Edit</a>
                    <a href="delete_Data/'.$product->id.'" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>Del</a>
          
    
                
                </div>
              </td>
                  
                </tr>';
   }
   return response($output);
 }
    

}



