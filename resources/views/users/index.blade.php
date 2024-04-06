@extends('layouts.app')
@section('content')

<div class="modal right fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="delete_data" method="POST">
    		@csrf
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Delete user</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="text" name="user_delete_id" id="user_id">
     <p>Are you sure to delete  ?</p>
   </div>
     	<div class="modal-footer">
     		<button type="submit" class="btn btn-default " data-bs-dismiss="modal">cancel</button>
     		<button type="submit" class="btn btn-danger " data-bs-dismiss="modal">Delete</button>
     	</div>
     </form>
      </div>
     
    </div>
  </div>
</div>
<div>
	@if(session()->has('message'))
	<div  style="background:lightgreen;align-items: center;" class="alert alert-success" id="alert">
	{{session()->get('message')}}
	<button type="button" class="close" data-dismiss="alert">X</button>
	@if($errors->any())
	@foreach ($errors->all() as $error)
	<span class="text-danger">{{$error}}</span>
	@endforeach
	@endif
</div>

	@endif
</div>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-9">
			<div class="card">
				<div style="position: sticky;" class="card-header"><h4 style="float:left"><marquee>ADD NEW USERS </marquee></h4><a href="#" style="float:right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#adduser"><i class="fa fa-plus"></i>Add New users<span><h4 style="color:yellowgreen; margin-left: 4px; font-size: 25px"><i style="color:ghostwhite;" 
					class="fa fa-users"></i>{{$Total}}</h4></span></a></div>

					<div class="card-body">
						<div style="overflow-x: scroll;overflow-y: scroll;">
						<table id="example" class="table table-striped table-bordered table-left">
							<thead>
								<tr>
									<th>
										<input type="checkbox"  name="" id="select_all_ids">
									</th>
								<th>
								#	
								</th>
								<th>
								National ID	
								</th>
								<th>
								Name	
								</th>
								<th>
								Email	
								</th>
								<th>
								Role	
								</th>
								<th>
								Actions	
								</th>
							</tr>
							</thead>
							<tbody class="alldata">
								@foreach ( $users as $key =>  $user)
									<tr id="user_ids{{$user['id']}}">
									<td><input type="checkbox" name="ids" class="checkbox-ids" id="" value="{{$user['id']}}"></td>
									<td> {{ $key+1}} </td>
									<td> {{$user ['user_Id']}} </td>
									<td> {{$user ['name']}} </td>
									<td> {{$user ['email']}} </td>
									<td> @if ($user['is_admin'] ==1) Admin 
									@else 
								Cashier
							@endif
						</td>
							<td>
								<div class="btn-group">
									<a href="edit_data/{{$user->id}}" class="btn btn-info btn-sm" data-bs-toggle="modal" 
									data-bs-target="#edituser{{$user['id']}}">
									<i class="fa fa-edit"></i>Edit</a>
					
									<a href="delete_data/{{$user->id}}" class="btn btn-sm btn-danger" 
									onclick="confirmation('event' )"> <i class="fa fa-trash"></i>Del</a>
									
								</div>
							</td>
									
								</tr>
									<div class="modal right fade" id="edituser{{$user['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Edit user</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{$user['name']}}
      </div>
      <div class="modal-body">
     <form action="{{url('update_data',$user->id)}}" method="POST">
     	@csrf

     	<div class="form-group">
     		<label for="">Name
     			
     		</label>
     		<input type="text" name="name" id="" value="{{$user['name']}}" required  class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Email
     			
     		</label>
     		<input type="email" name="email" id="" value="{{$user['email']}}" required  class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">National ID
     			
     		</label>
     		<input type="number" name="ID" id="" value="{{$user['user_Id']}}" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Password
     			
     		</label>
     		<input type="text" name=" password"   value="{{$user['password']}}" required class="form-control">
     	</div>
  
     
     	<div class="form-group">
     		<label for="">Role
     			
     		</label>
     		<select name="is_admin" id="" required class="form-control">
     			<option value="1" @if($user[ 'is_admin' ] ==1)
            selected
             @endif
       			>Admin
     				
     	    </option>
     	    <option value="2" @if($user ['is_admin'] ==2)
            selected
             @endif>Cashier
     				
     	    </option>

     			
     		</select>
     	</div>
     	<div class="modal-footer">
     		<button class="btn btn-warning btn-block ">Update</button>
     	</div>
     </form>
      </div>
     
    </div>
  </div>
</div>
									@endforeach
								</tr>
			
							<a href="#" class="btn btn-secondary" id="deleteAll">Delete Selected Records</a>
							</tbody>
							<tbody id="Content" class="searchdata"></tbody>
							 <tfoot>
            <tr>
                <th>
										<input type="checkbox"  name="" id="select_all_ids">
									</th>
                <th>#</th>
               <th>
								National ID	
								</th>
								<th>
								Name	
								</th>
								<th>
								Email	
								</th>
								<th>
								Role	
								</th>
								<th>
								Actions	
								</th>
            </tr>
        </tfoot>



							
						</table>
					</div>
						
					</div>
				</div>
			</div>
					
				<div class="col-md-3">
					 
			<div class="card">
				<div class="card-header"><h4>Search user</h4></div>
					<div class="card-body">
						
					 <input class="form-control me-2" type="search" name="Search" id="search" placeholder="Search here..." aria-label="Search">
					</div>

					<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
				</div>
			</div>
		</div>
				</div>
				
			</div>
		<div style="overflow-x: scroll;overflow-y:scroll;" class="modal right fade" id="adduser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="color:whitesmoke; background-color:rgba(134, 167, 143, 1.0);width: 350px;height: 748px;" class="modal-content">
      <div style="color:royalblue;" class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Add user</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form action="{{url('store_data')}}" method="post">
     	@csrf
     	<div class="form-group">
     		<label for="">Name
     			
     		</label>
     		<input type="text" name="name" id="" value="{{ old('name') }}" required autocomplete="name" autofocus class="form-control">
     	</div>
     	<div>
     	@error('name')
     	<span class="text-warning">
      <strong>{{ $message }}</strong>
                                    </span>
     </div>
     @enderror
     	<div class="form-group">
     		<label for="">Email
     		</label>
     		<input type="email" name="email" id="" value="{{ old('email') }}" required autocomplete="email" class="form-control">
     	</div>
     	
     		<div>
     			@error('email')
     			<span class="text-warning">
     	<strong>{{ $message }}</strong>
                                    </span>
     </div>
     @enderror
     	<div class="form-group">
     		<label for="">National ID
     			</label>
     		<input type="number" name="id" id="" required autocomplete="id" value="{{ old('id') }}" class="form-control">
     	</div>
     	<div>
     		@error('id')
     		<span class="text-warning">
     	<strong>{{ $message }}</strong>
                                    </span>
     </div>
     @enderror
     	<div class="password-container">
     		<label for="">Password
     			</label>
     		<input type="password" name=" password" id="password" placeholder="Enter password..." required autocomplete="new-password" class="form-control"><i class="fa-solid fa-eye" id="show-password"></i>
     			<div>
     		@error('password')
     		<span class="text-warning">
     <strong>{{ $message }}</strong>
                                    </span>
     </div>
     @enderror
     	</div><br><br>
    <div class="confirm-password-container">
     		<label for="">Confirm Password
     			</label>
     		<input type="password" name="confirmPassword" id="confirm" placeholder="confirm password..." required autocomplete="new-password" class="form-control"><i class="fa-solid fa-eye" id="confirm-password"></i>
     		<div>
     			@error('password')
     			<span class="text-warning">
     <strong>{{ $message }}</strong>
                                    </span>
     </div>
     @enderror
     	</div><br><br>
     	<div class="form-group">
     		<label for="">Role
     			
     		</label>
     		<select name="is_admin" id="" required class="form-control">
     			<option value="1">Admin
     				
     	    </option>
     	    <option value="2">Cashier
     				
     	    </option>
        </select>
     	</div><br>
     	<div class="modal-footer">
     		<button class="btn btn-primary btn-black">Save
     	</button>
     
     	</div><br>
     </form>
      </div>
     
    </div>
  </div>
</div>
	

<style>
	.search-box{
		background: rgb(237, 237, 237, 1.0);
		border-radius: 15px;
		color: 15px;
		display: flex;
		align-items: center;
		gap: 5px;
		padding: 6px;
		padding: 4px 12px;
		width: 285px;
	}
	#deleteAll{
		margin-bottom:4px ;
		margin-top: 4px;
		float: left;
	}
	.password-container {
		width:300px;
		position:relative ;
		padding-top: 5px;
		padding-bottom: 5px;
		height:108px ;
	}
	.confirm-password-container{
	  	width:300px;
		position:relative ;
		padding-top: 5px;
		padding-bottom: 5px;
		height:115px ;	
	}
	.fa-eye{
		position:absolute;
		top: 32%;
		right: 10% ;
		cursor: pointer;
		color:darkgray;
	}
	.me-2{
		width: 200px;
		margin-left: 5px;
		margin-top: 5px;
		margin-bottom: 5px;
		border-top-color: none;
		background-color: transparent;
	}
	.btn-black{
		font-size: 22px;
		color: #fff;
		background: #29ca8e;
		width: 250px;
		height: 60px;
		cursor: pointer;
		border-radius: 5px;
		box-shadow: 0 8px 5px -5px rgba(0, 0, 0, 0.2);
		display: grid;
		place-content: center;

	}
	.btn-block{
		font-size: 22px;
		color: #fff;
		background: #29ca8e;
		width: 250px;
		height: 60px;
		cursor: pointer;
		border-radius: 5px;
		box-shadow: 0 8px 5px -5px rgba(0, 0, 0, 0.2);
		display: grid;
		place-content: center;

	}
	.loader1{
		pointer-events: none;
		width:30px ;
		height: 30px;
		border-radius: 50%;
		border:3px solid transparent;
		border-top-color: #fff;
		animation: an1 1s ease infinite;
		
	}
	@keyframes an1{
		0%{
			transform: rotate(0turn);
		}
		100%{
			transform: rotate(1turn);
		}
	}
	
	.loader{
		pointer-events: none;
		width:30px ;
		height: 30px;
		border-radius: 50%;
		border:3px solid transparent;
		border-top-color: #fff;
		animation: an1 1s ease infinite;
		
	}
	@keyframes an1{
		0%{
			transform: rotate(0turn);
		}
		100%{
			transform: rotate(1turn);
		}
	}
	
	.modal.right .modal-dialog{
		position position: absolute;
		top: 0;
		right: 0;
		margin-right: 19vh;
	}
	.modal.fade:not(.in).right .modal-dialog{
		-webkit-transform:translate3d(25%,0,0);
		transform: translate3d(25%, 0, 0);
	}
</style>
@endsection
@section('scripts')
<script>

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['countdown', 'total'],
          ['users',     {{$Total}}],
          ['transaction',   300],
          ['orders',  156]
         
        ]);

        var options = {
          title: 'Todays summary',
          is3D: true,
        };
         var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    
	$("document").ready(function(){
   setTimeout(function(){
   	$("div.alert").remove();
   },3000)
	});
	
 	new DataTable('#example');
const showPassword =document.querySelector("#show-password");

		const passwordField =document.querySelector("#password");
		showPassword.addEventListener("click",function(){
			this.classList.toggle("fa-eye-slash");
    const type=passwordField.getAttribute("type")==="password" ? "text":"password";
    passwordField.setAttribute("type",type);
});
		const showConfirmPassword =document.querySelector("#confirm-password");

		const confirmField =document.querySelector("#confirm");
		showConfirmPassword.addEventListener("click",function(){
			this.classList.toggle("fa-eye-slash");
    const type=confirmField.getAttribute("type")==="password" ? "text":"password";
    confirmField.setAttribute("type",type);
});

	$('#search').on('keyup',function(){

		$value=$(this).val();
		if($value){
      $('.alldata').hide();
      $('.searchdata').show();

		}
		else{
			 $('.alldata').show();
      $('.searchdata').hide();
		}

		$.ajax({

			type:'get',
			url:'{{URL::to('search')}}',
			data:{'search':$value },
			success:function(data){
				console.log(data);
			$('#Content').html(data);
		}
		});
	})
	

btn_block=document.querySelector(".btn-block");
btn_block.onclick=function(){
	this.innerHTML="<div class='loader'></div>";
	setTimeout(()=>{
	this.innerHTML=" Changes updated";
		this.style="background:#f1f5f4;color:#333;pointer-events:none";
     		
},2000);
}
	btn_block=document.querySelector(".btn-black");
btn_block.onclick=function(){
	this.innerHTML="<div class='loader1'></div>";
	
	setTimeout(()=>{
		this.innerHTML="Data saved";
		this.style="background:#f1f5f4;color:#333;pointer-events:none";

	},2000);
     		
}
$(function(e){

	$("#select_all_ids").click(function(){

		$('.checkbox-ids').prop('checked',$(this).prop('checked'));
	});
	


$('#deleteAll').click(function(e){
	e.preventDefault();
	let all_ids =[];
	$('input:checkbox[name=ids]:checked').each(function(){
		all_ids.push($(this).val());
	});

	$.ajax({
   url:'{{URL::to('selected')}}',
   type:"DELETE",
   data:{
   	'ids':all_ids,
   	_token:'{{ csrf_token() }}'
   },

 
   success:function(response){
   	$.each(all_ids,function(key,val){
   		 $('#user_ids'+val).remove();
   	       })
        }

	    });


   });
});





	
</script>
@endsection

