<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use App\Models\Order;

use App\Models\User;


class UserController extends Controller

{
   

    public function index(){

        $users=User::paginate(5);
        
        return view('users.index', compact('users'));


    }
    //
     

    
     public function store(Request $request ){
         
       $user=new user;

       $user->name=$request->name;
       $user->email=$request->email;
       $user->user_Id=$request->ID;
       $user->password=$request->password;
       $user->is_admin=$request->is_admin;
       $user->save();
        if ($user){
            return redirect()->back()->with('user created successfully');
        }
      else{
        return redirect ()->back()->with('user fail to create');
      } 
        
    }
    public function edit_data($id ){
   $data= User::find($id);
  return view('users.index',compact('data')) ; 
        
}
 public function update_data(Request $request ,$id ){
   $user= User::find($id);
   
       $user->name=$request->input('name');
       $user->email=$request->input ('email');
       $user->user_Id=$request-> input ('ID');
       $user->password=$request->input('password');
       $user->is_admin=$request->input('is_admin');
       $user->save();

       
        if ($user){
            return redirect()->back()->with('user updated successfully');
        }
      else{
        return redirect ()->back()->with('user fail to update');
      } 
        
}
public function delete_data( $id){
    DB::table('users')->where('id',$id)->delete();
    return back();
}
    

}
