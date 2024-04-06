@extends('layouts.app')
@section('content')

	<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-8">
			<div class="card">
				<div class="card-header"><h4 style="float:left">Order Products</h4><a href="#" style="float:right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#saveData"><i class="fa fa-plus"></i>Add New orders</a></div>
				<form action="{{url('make')}}"method="post">
							@csrf
					@method('get')
					<div class="card-body">
					<table class="table table-bordered table-left">
							<thead>
								<tr>

							   <th></th>
								<th>
								Product_Name	
								</th>
								<th>
								Qty
								</th>
								<th>
								Price
								</th>
								<th>
							  Discount (%)
								</th>
								<th>
								Total	
								</th>
								<th>
								<a href="#" class="btn btn-sm btn-info add_more rounded-circle"><i class="fa fa-plus"></i>	</a>
								</th>
								
							</tr>
							</thead>
							<tbody class="addMoreProduct">
								<tr>
									<td>1</td>
									<td>
									  
										<select name="product_id[]" id="product_id" class="form-control product_id">
											<option value="">select Item</option>
		
                         @foreach($orders as $product)
										
											<option data-price="{{$product->products->price}}"  value="{{$product->products->product_name}}">{{$product->products->product_name}}</option>
											@endforeach
											
										</select>
									
									</td>
									
									<td>
										<input type="number" name="quantity[]" id="quantity" class="form-control quantity">
									</td>
									<td>
										<input type="number" name="price[]" id="price" class="form-control price">
									</td>
									<td>
										<input type="number" name="discount[]" id="discount" class="form-control discount">
									</td>
									<td>
										<input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount">
									</td>
									<td><a href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times"></i>	</a></td>


								</tr>
							
								
							</tbody>
							
						</table>
									
					</div>
				</div>
			</div>
					
				<div class="col-md-4">
					 
			<div class="card">
				<div class="card-header"><h4>Total <b class="total" id="">0.00</b></h4></div>
					<div class="card-body">
						
					<div class="panel">
						<div class="row">
							<table class="table table-striped">
								<tr>
									<td>
										<label for="">Customer Name</label>
							<input type="text" name="customer_name" id="" class="form-control">
								</td>
									<td>
											<label for="">Customer Phone</label>
							
								<input type="number" name="customer_phone" id="" class="form-control">
								</td>
								</tr>
								
							</table>
							<td>
								Payment Method<br>
								<span class="radio-item">
									<input type="radio" name="payment_method" id="payment_method" class="true" value="cash" checked="checked">
									<label for="payment_method"><i class="fa fa-money-bill text-success"></i>Cash
										</label>
							
							 
									<input type="radio" name="payment_method" id="payment_method" class="true" value="bank transfer">
									<label for="payment_method"><i class="fa fa-university text-danger"></i>Bank
										</label>
								
							
								<input type="radio" name="payment_method" id="payment_method" class="true" value="credit card">
									<label for="payment_method"><i class="fa fa-credit-card text-info"></i>Credit Card
										</label>
								</span>
							</td><br>
								
							<td>Payment <input type="number" name="paid_amount" id="paid_amount" class="form-control">
							</td><br>
							<td>Change <input type="number"  name="balance" id="balance" class="form-control">
							</td>
							<td ><button type="button" class="btn btn-primary btn-lg  mt-3 btn-block" >Save</button>
							
							</td>
						
							<div class="text-center" ><a href="#" class="text-danger"><i class="fa fa-sign-out-alt"></i>Logout</a></div>

						
							
						</div>
					</div>	
					</div>
				</div>
			</div>
		</div>
			</form>
				</div>
				
			</div>
			<div class="modal right fade" id="saveData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Update Details</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form action="{{url('make')}}" method="post">
     	@csrf
     	<div class="form-group">
     		<label for="">Customer Name
     			
     		</label>
     		<input type="text" name="customer_name2" readonly id="customer_name2" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Customer Phone
     			
     		</label>
     		<input type="number" name="customer_phone2" readonly id="customer_phone2" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label for="">Payment Method<br>
     			<span class="radio-item"> 
									<input type="radio" name="payment_method2" readonly id="payment_method2" class="true" value="cash" checked="checked">
									<label for="payment_method"><i class="fa fa-money-bill text-success"></i>Cash
										</label> 
							
							 
									<input type="radio" name="payment_method2"  readonly id="payment_method2" class="true" value="bank transfer">
									<label for="payment_method"><i class="fa fa-university text-danger"></i>Bank
										</label>
								
							
								<input type="radio" name="payment_method2" readonly id="payment_method2" class="true" value="credit card">
									<label for="payment_method"><i class="fa fa-credit-card text-info"></i>Credit Card
										</label>
								</span>
     			
     		
     	</div><br>
     	<label>Quantity
										<input type="number" name="quantity[]" id="quantity2" class="form-control quantity">
									</label><br>
									<label>Price
										<input type="number" name="price[]" id="price2" class="form-control price">
									</label>
									<label>Discount
										<input type="number" name="discount[]" id="discount2" class="form-control discount">
									</label>
									<label>Total
										<input type="number" name="total_amount[]" id="total_amount2" class="form-control total_amount">
									</label>
     	<div class="form-group">
     		<label for="">Payment
     			
     		</label>
     		<input type="number" name="paid_amount2" id="paid_amount2" readonly required class="form-control">
     	</div><br>
  
     <div class="form-group">
     		<label for="">Change
     			
     		</label>
     		<input type="number"  name="balance2" id="balance2" readonly class="form-control">
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

			
<style >
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

	.modal.right .modal-dialog{
		position position: absolute;
		top: 0;
		right: 0;
		margin-right: 19vh;
	}
	.modal.fade:not(.in).right .modal-dialog{
		-webkit-transform:translate3d(25%,0,0);
		transform: translate3d(25%, 0, 0);
		.radio-item[type="radio"]{
			visibility: hidden;
			width: 20px;
			height: 20px;
			margin: 0 5px 0 5px;
			padding: 0;
			cursor: pointer;
		}
		.radio-item input[type="radio"]:before{
			position: relative;
			margin: 4px -25px -4px 0;
			display: inline-block;
			visibility: visible;
			width: 20px;
			height: 20px;
			border-radius: 10px;
			border: 2px solid rgb(150, 150, 150, 0.75);
			background: radial-gradient(ellipse at top left,rgb(255,255,255)0%, rgb(250,250,250)5%,rgb(230,230,230)95%,rgb(225,225,225) 100%);
			content: '';
			cursor: pointer;
		}
		.radio-item input[type="radio"]:checked:after{
			position: relative;
			top: 0;
			left: 0;
			border-radius: 6px;
			display: inline-block;
			visibility: visible;
			width: 12px;
			height: 12px;
			background: radial-gradient(ellipse at top left,rgb(240,255,220)0%, rgb(225,250,100)5%,rgb(75,75,0)95%,rgb(25,100,0) 95%);
			content: '';
			cursor: pointer;
		}
		.radio-item input[type="radio"].true:checked:after{
			background: radial-gradient(ellipse at top left,rgb(240,255,220)0%, rgb(225,250,100)5%,rgb(75,75,0)95%,rgb(25,100,0) 95%);
		}
		.radio-item input[type="radio"].false:checked:after{
		background:	radial-gradient(ellipse at top left,rgb(255,255,255)0%, rgb(250,250,250)5%,rgb(230,230,230)95%,rgb(225,225,225) 100%);
	}
			
	.radio-item label{
		display: inline-block;
		margin: 0;
		padding: 0;
		line-height: 25px;
		height: 25px;
		cursor: pointer;
	}
</style>
@endsection
@section('scripts')
<script>
	$('.add_more').on('click',function(){

		var product=$('.product_id').html();
		var numberofrow=($('.addMoreProduct tr').length -0) +1;
		var tag ='<tr><td class= "no">' + numberofrow + '</td>' + '<td><select class="form-control product_id" name="product_id[]">' + product + '</select></td>' +
		'<td> <input type="number" name="quantity[]" class="form-control quantity"></td>' + 
	   '<td> <input type="number" name="price[]" class="form-control price"></td>'+ 
			'<td> <input type="number" name="discount[]" class="form-control discount"></td>'+
			'<td> <input type="number" name="total_amount[]" class="form-control total_amount"></td>' +
					'<td><a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"></i></a></td>'; 
					$('.addMoreProduct').append(tag);

	});
	$('.addMoreProduct').delegate('.delete','click',function(){
		$(this).parent().parent().remove();
	})

 function TotalAmount(){
 	var total=0;
 	$('.total_amount').each(function(i,e)
 	{
 		var amount=$(this).val()-0;
 		total += amount;
 	});
 	$('.total').html(total);
 }


 $('.addMoreProduct').delegate('.product_id','change',function(){

 	var tr=$(this).parent().parent();
 	var price=tr.find('.product_id option:selected').attr('data-price');
 	tr.find('.price').val(price);
 	var qty=tr.find('.quantity').val()-0;
 	var discount=tr.find('.discount').val()-0;
 	var price=tr.find('.price').val()-0;
 	var total_amount=(qty*price)-((qty*price*discount)/100);
 	tr.find('.total_amount').val(total_amount);
  TotalAmount();
 });
 $('.addMoreProduct').delegate('.quantity,.discount','keyup',function(){
 	var tr=$(this).parent().parent();
 	var qty=tr.find('.quantity').val()-0;
 	var discount=tr.find('.discount').val()-0;
 	var price=tr.find('.price').val()-0;
 	var total_amount=(qty*price)-((qty*price)*discount/100);
 	tr.find('.total_amount').val(total_amount);
  TotalAmount();
 });
 $('#paid_amount').keyup(function(){
 	var total=$('.total').html();
 	var paid_amount=$(this).val();
 	var tot=paid_amount-total;
 	$('#balance').val(tot);
 });
 function populateForm2(){
 	var input1=document.getElementById('customer_name').value;
 var input2=document.getElementById('customer_phone').value;
 var input3=document.getElementById('quantity').value;
 	var input4=document.getElementById('price').value;
 		var input5=document.getElementById('product_id').value;
 			var input6=document.getElementById('paid_amount').value;
 				var input7=document.getElementById('balance').value;
 					var input8=document.getElementById('total_amount').value;
 						var input9=document.getElementById('payment_method').value;
 						document.getElementById('customer_name2').value= input1;
 						document.getElementById('customer_phone2').value= input2;
 						document.getElementById('quantity2').value= input3;
 						document.getElementById('price2').value= input4;
 						document.getElementById('product_id2').value= input5;
 						document.getElementById('paid_amount2').value= input6;
 						document.getElementById('balance2').value= input7;
 						document.getElementById('total_amount2').value= input8;
 						document.getElementById('payment_method2').value= input9;
 					}

 
 
</script>
@endsection
