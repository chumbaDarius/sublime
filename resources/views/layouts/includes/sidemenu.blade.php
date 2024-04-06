<body  class="bodymenu">
	<div style="overflow-x: scroll;overflow-y: scroll;" class="sidemenu">
		<div class="logo"></div>
		<div class="main">
			
	     <ul class="menu">
	     	
	     	<li class="active">
	     		<a href="{{url('welcome')}}"><i class="fa fa-tachometer-alt"></i>
                <span>Dashboard</span>
	     		</a>
	     	</li>
	     	<li>
	     		<a href="{{url('users')}}"><i class="fa fa-user"></i>
                <span>Users</span>
	     		</a>
	     	</li>
	     	<li>
	     		<a href="{{url('products')}}"><i class="fa fa-box"></i>
                <span>Products</span>
	     		</a>
	     	</li>
	     	<li>
	     		<a href="{{url('orders')}}"><i class="fa fa-laptop"></i>
                <span>Orders</span>
	     		</a>
	     	</li>
	     	<li>
	     		<a href="{{url('reports')}}"><i class="fa fa-file"></i>
                <span>Reports</span>
	     		</a>
	     	</li>
	     	<li>
	     		<a href="{{url('transactions')}}"><i class="fa fa-money-bill"></i>
                <span>Transaction</span>
	     		</a>
	     	</li>
	     	<li>
	     		<a href="{{url('suppliers')}}"><i class="fa fa-truck"></i>
                <span>Suppliers</span>
	     		</a>
	     	</li>
	     	<li>
	     		<a href="{{url('customers')}}"><i class="fa fa-users"></i>
                <span>Customers</span>
	     		</a>
	     	</li>
	     	 <li class="nav-item dropdown">
	     	 	@guest @if (Route::has('login')) <h1 style="font-size: 15px;margin-left:3px;color:navajowhite;">Please login!</h1>

                                    @endif
                                     @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle Logout" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                       
                                        @method('POST');
                                        

                                    </form>
                                </div>
                                @endguest
                            </li>
	     </ul>
		</div>
	</div>
</body>
<style type="text/css">
	
	.sidemenu{
		position:relative ;
  		padding: 0;
		border: none;
		outline: none;
		box-sizing: border-box;
		font-family: sans-seriff;
		position: sticky;
		top:0;
		left: 0;
		width: 110px;
		height: 100vh;
		padding: 0 1.7em;
		color: #fff;
		overflow: hidden;
		transition: all 0.5s linear;
		background: rgba(113, 99, 230, 255);

	}
	.sidemenu:hover{
		color: springgreen;
		width: 240px;
		transition: 0.5s;
		border-color: springgreen;
	}
	.sidemenu a{
       color: khaki;
	}
	
	
	.logo{
		height: 80px;
		padding: 16px;
	}
	.menu{
		height: 88%;
		position: relative;
		list-style: none;
		padding: 0;
	}
	.menu li{
		padding:1rem;
		margin: 8px 0;
		border-radius: 8px;
		transition: all 0.5s ease in-out;
	}
	.menu li:hover,.active{
		background: rgb(78,73, 90,1.0);
		color: ghostwhite;
	}
	.menu a{
		color: navajowhite;
		font-size:14px;
		text-decoration: none;
		display: flex;
		align-items: center;
		gap:1.4rem;

	}
	.menu a span{
		overflow: hidden;
	}
	.menu a i{
		font-size: 1.2rem;
	}
	.log-out{
		position: relative;
		margin-top: 45px;
		bottom: 0;
		left: 0;
		width: 100%;
	}

</style>