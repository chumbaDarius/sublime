<?php
namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use App\Providers\RouteServiceProvider;


use Illuminate\Http\Request;

use Illuminate\Http\Response;


use Illuminate\Support\Facades\DB;

use App\Models\Order;

use Illuminate\Validation\Rules\password;


class UserController extends Controller{

    public function index(){

        $users=User::all();
        $Total=User::count();
        
        return view('users.index', compact(['users','Total']));


    }
    //
     

    
     public function store(Request $request ){
        $request->validate([
            'name'=>'required|string|min:5',
            'email'=>'required|email|string|max:255|unique:users',
            'id'=>'required|string|min:8|max:255',
            'is_admin'=>'required',
             'confirmPassword'=>'required|string|same:password',
            'password'=>'required|string|min:8|max:255|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',],

            [

                'password.regex'=>'The password must contain  at least one uppercase letter, one lowercase letter, one number, and one special character.',

        ]);
     
         
       $user=new user;

       $user->name=$request->name;
       $user->email=$request->email;
       $user->user_Id=$request->id;
       $user->password=$request->password;
       $user->is_admin=$request->is_admin;
       $user->save();
        if ($user){
            return redirect()->back()->with('message','user created successfully');
        }
      else{
        return redirect ()->back()->with('error','user fail to create');
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
       $user->user_Id=$request-> input ('id');
       $user->password=$request->input('password');
       $user->is_admin=$request->input('is_admin');
       $user->save();

       
        if ($user){
            return redirect()->back()->with('message','user updated successfully');
        }
      else{
        return redirect ()->back()->with('error','user fail to update'); 
      } 
        
}
public function select(Request $request){
  $ids=$request->ids;
  User::whereIn('id',$ids)->delete();
  return redirect()->back()->with('message' ,'User have been deleted!.');
}
public function delete_data( $id){
    DB::table('users')->where('id',$id)->delete();
    return back();
}
 public function search(Request $request ){
   $key=0;
  $output='';
  $users=User::where('name','Like','%'.$request->search.'%')->orWhere('user_Id','Like','%'.$request->search.'%')->get();
   foreach($users as $key=> $user)
   {
    $output.=
    '<tr>
     <td>'.'<input type="checkbox" name="ids" class="checkbox-ids"  value=""</td>'.'
      <td>'.$key.'</td>
      <td>'.$user->user_Id.'</td>
      <td>'.$user->name.'</td>
      <td>'.$user->email.'</td>
      <td>'.$user->is_admin.'</td>
      <td>'.'<div class="btn-group">'.'
                  <a href="/edit_data/'.$user->id.'" class="btn btn-info btn-sm" data-bs-toggle="modal" 
                  data-bs-target="#edituser'.$user['id'].'">'.'
                  <i class="fa fa-edit">'.'</i>'.'Edit</a>'.'
          
                  <a href="delete_data/'.$user->id.'" class="btn btn-sm btn-danger"> '.'
                  <i class="fa fa-trash">'.'</i>'.'Del</a>'.'
                  
                </div>'.'<td>
               

     


    </tr>';
   }
   return response($output);
 }
    

}


