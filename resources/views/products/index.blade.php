@extends('layouts.app')
@section('content')
	<div class="modal right fade" id="deleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="delete_Data" method="POST">
    		@csrf
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Delete product</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <input type="text" name="product_delete_id" id="product_id">
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

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-9">
			<div class="card">
				<div class="card-header"><h4 ><marquee>ADD NEW PRODUCTS </marquee></h4><a href="#" style="float:right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addproduct"><i class="fa fa-plus"></i>Add New products<span><h4 style="color:rosybrown;font-size: 25px">{{$Total}}</h4></span></a></div>
					<div class="card-body">
						<div style="overflow-x: scroll;overflow-y: scroll;">
							<table  id="products" class="table table-striped table-bordered table-left">
							<thead>
								<tr>
                 <th>
										<input type="checkbox"  name="" id="select_all_ids">
									</th>
								<th>
								#	
								</th>
								<th>
								Product_Name	
								</th>
								<th>
								Description
								</th>
								<th>
								Brand	
								</th>
								<th>
							  Price	
								</th>
								<th>
								Quantity	
								</th>
								<th>
								Stock
								</th>
								<th>
								Updated_Time
								</th>
									<th>
								Actions	
								</th>
							</tr>
							</thead>
							<tbody  class="alldata" >
								@foreach ( $products as $key => $product)
								
              <tr  id="product_ids{{$product['id']}}">
									<td><input type="checkbox" name="ids" class="checkbox-ids" id="" value="{{$product['id']}}"></td>
									<td> {{ $key+1}} </td>
									<td> {{$product ['product_name']}} </td>
									<td> {{$product ['description']}} </td>
									<td> {{$product ['brand']}} </td>
									<td> ksh {{ number_format($product ['price'],2)}} </td>
									<td> {{$product ['quantity']}} </td>
									<td> @if ($product['alert_stock'] ==1) in-stock 
									@else 
								out-stock
							@endif</td>
							<td> {{$product ['updated_at']}} </td>
							<td>
								<div class="btn-group">
									<a href="edit_Data/{{$product->id}}" class="btn btn-info btn-sm" data-bs-toggle="modal" 
									data-bs-target="#editproduct{{$product['id']}}">
									<i class="fa fa-edit"></i>Edit</a>
										<a href="delete_Data/{{$product->id}}" class="btn btn-danger btn-sm" onclick="confirmation(event )" >
									<i class="fa fa-trash"></i>Del</a>
					
		
								
								</div>
							</td>
									
								</tr>
						@endforeach	
							</tbody>
							<div class="search-box"><i class="fa-solid fa-search"></i>
							 <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search here..." aria-label="Search">
							 </div>
							
								<a href="#" class="btn btn-secondary" id="deleteAll">Delete Selected Records</a>
								<tbody id="Content" class="searchdata"></tbody>
								<tfoot>
									<tr>
                 <th>
										<input type="checkbox"  name="" id="select_all_ids">
									</th>
								<th>
								#	
								</th>
								<th>
								Product_Name	
								</th>
								<th>
								Description
								</th>
								<th>
								Brand	
								</th>
								<th>
							  Price	
								</th>
								<th>
								Quantity	
								</th>
								<th>
								Stock
								</th>
								<th>
								Updated_Time
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
				<div class="card-header"><h4>Search product</h4></div>
					<div class="card-body">
						
				 <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search here..." aria-label="Search">
					</div>
				</div>
			</div>
		</div>
				</div>
				
			</div>
			<div class="modal right fade" id="editproduct{{$product['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="color:ghostwhite;background-color:teal;width: 400px;height: 700px;" class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Edit product</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{$product['product_name']}}
      </div>
      <div class="modal-body">
     <form action="{{url('update_Data',$product->id)}}" method="POST">
     	@csrf

     	<div class="form-group">
     		<label for="">Product_Name
     			
     		</label>
     		<input type="text" name="name" id="" value="{{$product['product_name']}}" required  class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Description
     			
     		</label>
     		<textarea  name="description" id=""  cols="30" rows="2" required  class="form-control">{{$product['description']}}</textarea>
     	</div>
     	<div class="form-group">
     		<label for="">Brand
     			  
     		</label>
     		<input type="text" name="brand" id="" value="{{$product['brand']}}" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Price
     			
     		</label>
     		<input type="number" name=" price"   value="{{$product['price']}}" required class="form-control">
     	</div>
  
     
     	<div class="form-group">
     		<label for="">Quantity
     			
     		</label>
     		<input type="number" name=" quantity"   value="{{$product['quantity']}}" required class="form-control">
     	</div>
     		<div class="form-group">
     		<label for="">Stock
     			
     		</label>
  
     		<select name="stock" id="" required class="form-control">
     			<option value="1" @if($product[ 'alert_stock' ] ==1)
            selected
             @endif
     			>in-stock
     				
     	    </option>
     	    <option value="2" @if($product ['alert_stock'] ==2)
            selected
             @endif>out-stock
     				
     	    </option>

     			
     		</select>

     	</div>
     	<div class="modal-footer">
     		<button class="btn btn-warning btn-block">Update</button>
     	</div>
     </form>
      </div>
     
    </div>
  </div>
</div>
		
							
		<div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="color:ghostwhite;background-color:teal;width: 400px;height: 700px;" class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel" onclick="document.querySelector.innerHTML='Please fill in the details'">Add product</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form action="{{url('insert')}}" method="post">
     	@csrf
     	<div class="form-group">
     		<label for="">Product_Name
     			
     		</label>
     		<input type="text" name="name" id="" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Description
     			
     		</label>
     		<textarea type="text" name="description" id="" required class="form-control"></textarea>
     	</div>
     	<div class="form-group">
     		<label for="">Brand
     			
     		</label>
     		<input type="text" name="brand" id="" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Price
     			
     		</label>
     		<input type="number" name=" price" id="" required class="form-control">
     	</div>
  
     <div class="form-group">
     		<label for="">Quantity
     			
     		</label>
     		<input type="number" name="quantity" id="" class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Stock
     			
     		</label>
     		<select name="stock" id="" required class="form-control">
     			<option value="1">in-stock
     				
     	    </option>
     	    <option value="2">out-stock
     				
     	    </option>

     			
     		</select>
     	</div>
     	<div class="modal-footer">
     		<button class="btn btn-primary btn-black" onclick='openPopup()'>Save</button>
     		<div class="popup" id="popup">
     			<img src="">
     			<h2>Thank You!</h2>
     			<p>Your details has been successfully submitted. Thanks!</p>
     			<button type="button" onclick='closePopup()'>OK</button>
     		</div>

     	</div>
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
	.password-container{
		width:300px;
		position:relative ;
		padding-top: 8px;
		padding-bottom: 8px;
		height:115px ;
	}
	.confirm-password-container{
	  	width:300px;
		position:relative ;
		padding-top: 8px;
		padding-bottom: 8px;
		height:115px ;	
	}
	.fa-eye{
		position:absolute;
		top: 32%;
		right: 10% ;
		cursor: pointer;
		color:black;
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
		color: darkgoldenrod;
		background: #fff;
		width: 200px;
		height: 60px;
		cursor: pointer;
		border-radius: 30px;
		box-shadow: 0 8px 5px -5px rgba(0, 0, 0, 0.2);
		display: grid;
		place-content: center;
		font-weight: 500;

	}
	.btn-block{
		font-size: 22px;
		color: #fff;
		background: #29ca8e;
		width: 200px;
		height: 60px;
		cursor: pointer;
		border-radius: 30px;
		box-shadow: 0 8px 5px -5px rgba(0, 0, 0, 0.2);
		display: grid;
		place-content: center;
		font-weight: 500;

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
	.popup{
		width: 400px;
		background: #fff;
		border-radius: 6px;
		position: absolute;
		top: 0%;
		left: 50%;
		transform: translate(-50%,-50%)scale(0.1);
		text-align: center;
		padding: 0,30px,30px;
		color: #333;
		visibility: hidden;
		transition: transform 0.4s,top 0.4s;

	}
	.open-popup{
		visibility: visible;
		top: 50%;
		transform: translate(-50%,-50%)scale(1.0);
	}
	.popup img{
		width: 100px;
		margin-top: -50px;
		border-radius: 50%;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
	}
	.popup h2{
		font-size: 38px;
		font-weight: 500;
		margin:30px 0 10 px;

	}
	.popup button{
		width: 100%;
		margin-top: 50px;
		padding: 10px 0;
		background: #6fd649;
		color: #fff;
		border: 0;
		outline: none;
		font-size: 18px;
		border-radius: 4px;
		cursor: pointer;
			box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
	}
</style>
@endsection
@section('scripts')
<script>
		new DataTable('#products');
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
			url:'{{URL::to('search_product')}}',
			data:{'search_product':$value },
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
var popup=document.getElementById("popup");
function openPopup(){
	popup.classList.add("open-popup");

}
function closePopup(){
	popup.classList.remove("open-popup");

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
   url:'{{URL::to('selected_product')}}',
   type:"DELETE",
   data:{
   	'ids':all_ids,
   	_token:'{{ csrf_token() }}'
   },

 
   success:function(response){
   	$.each(all_ids,function(key,val){
   		 $('#product_ids'+val).remove();
   	       })
        }

	    });


   });
});

	
	
</script>
@endsection
