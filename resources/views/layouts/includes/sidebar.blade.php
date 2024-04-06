<nav style ="background-color: tan; border-radius: 3px;height: 600px; overflow-x: scroll;overflow-y: scroll;"class="active" id="sidebar">
	<ul class="list-unstyled lead">
		<li class="active">
			<a href="{{url('welcome')}}"><i class=" fa fa-home "></i> Home</a>
		</li>
		<li>
			<a href="{{url('orders')}}"><i class=" " ><i/> Orders </a>
		</li>
		<li>
			<a href="{{url('transactions')}}"><i class=" " ><i/>Transactions</a>
		</li>
		<li>
			<a href="{{url('products')}}"><i class=" " ><i/>Products</a>
		</li>
		<li>
			<a href="{{url('reports')}}"><i class=""></i>Reports</a>
		</li>
		<li>
			<a href="{{url('products')}}"><i class=""></i>Customers</a>
		</li>
		<li>
			<a href="{{url('products')}}"><i class=""></i>Suppliers</a>


	</ul>

</nav>
<style >
	#sidebar ul.lead{
		border-bottom: 1px solid #47748b;
		width:fit-content;

	}

	#sidebar ul li a{
		margin-left: 5px;
		padding: 10px;
		font-size: 1em;
		display: block;
		width: 30vh;
		color: darkviolet;
		font-family:Arial;


	}
	#sidebar ul li a:hover{
		
		color: #fff;
		background-color:rgb(78, 73, 97);;
		text-decoration: none !important;
		border-radius: 6px;
	}
	#sidebar ul li a i{
		margin-right:10px ;

	}
	#sidebar ul li.active>a, a[aria-expanded="true"]{
		color:bisque;
		background-color:rgb(78, 73, 97); 

	}
	
</style>
 <div class="search-box"><i class="fa-solid fa-search"></i>
							 <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search here..." aria-label="Search">
							 </div>
								showing {{$users->firstItem()}} - {{$users->lastItem()}} of {{$users->total()}} pages  
							{{ $users->onEachSide(1)->links()}}