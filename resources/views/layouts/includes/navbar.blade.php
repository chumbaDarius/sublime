
<div class="navigation">
<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill "><i class="fa fa-list"></i></a>

<a href="{{url('users')}}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i>Users</a>
<span><i style="color:lime;" class="fa fa-spinner"></i></span>

<a href="{{url('products')}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>Products</a>
<span><i style="color:lime;" class="fa fa-spinner"></i></span>

<a href="{{url('orders')}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"></i>Orders</a>
<span><i style="color:lime;" class="fa fa-spinner"></i></span>
<a href="{{url('reports')}}" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i>Reports</a>
<span><i style="color:lime;" class="fa fa-spinner"></i></span>

<a href="{{url('transactions')}}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i>Transactions</a>
<span><i style="color:lime;" class="fa fa-spinner"></i></span>
<a href="{{url('Suppliers')}}" class="btn btn-outline rounded-pill"><i class="fa fa-truck"></i>Suppliers</a>
<span><i style="color:lime;" class="fa fa-spinner"></i></span>


<a href="{{url('customers')}}" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i>Customers</a>
<span><i style="color:lime;" class="fa fa-spinner"></i></span>
<a href="{{url('incoming')}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"></i>Incoming</a>
</div>



<style >
	.navigation{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		z-index: 1000;
		transition: top 0.3s;
	}
	.sticky{
		top:-60px;
	}
	
	 a{
		margin-right: 3px;
		color: rgb(78, 73, 197);
		
	}
	.btn-outline{
		border-color:;
		color: background:green;
	}
	.btn-outline:hover{
		transition-delay:0.3s;
		background:seashell;
		color: blueviolet; 

	}

</style>

@section('scripts')
<script>
	window.onscroll=function(){stickyNavbar()};

	var navbar=document.querySelector('.navigation');
	var sticky=navbar.offsetTop;
	function stickyNavbar(){
		if(window.pageYoffset>=sticky){
			navbar.classList.add('sticky');
		}
		else{
			navbar.classList.remove('sticky');
		}
	}
</script>
	@endsection

