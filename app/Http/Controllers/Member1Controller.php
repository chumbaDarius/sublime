<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
     public function store(Request $request ){
         
       $user=new member;

        $user->name=$request->name;
       $user->email=$request->email;
       $user->user_Id=$request->ID;
       $user->password=$request->password;
       $user->is_admin=$request->is_admin;
       $user->save();
        if ($user){
            return redirect()->back()->with('member created successfully');
        }
      else{
        return redirect ()->back()->with('member fail to create');
      } 
        
    }   //
}
