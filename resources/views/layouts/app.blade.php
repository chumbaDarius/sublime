
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Sublime ') }}</title>
    <link rel="icon" type="image/png" href="{{asset('images/download5.jpg')}}">

    <!-- Fonts -->
   
    <script  src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js" ></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<link rel="stylesheet" href="{{asset('fontawesome-free-6.5.1-web/css/all.min.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-image: ;:url(images/background1)">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div  class="container3">
               @include('layouts.includes.navbar')


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))

                                <li class="nav-item">
                                   <button class="button1"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></button> 
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                   <button class="button2"> <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></button>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
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
                            </li>
                        @endguest
                         
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Button trigger modal -->

<!-- Modal -->
<div  class="modal left fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div  class="modal-dialog">
    <div style="background-color:rgb(78, 85, 90, 1.0);"class="modal-content">
      <div class="modal-header">
        <h4 style="font-weight:bold; color:springgreen;" class="modal-title" id="staticBackdropLabel">welcome <h1 style="font-size: 15px;margin-left:3px;color:navajowhite;"><span>
        @guest @if (Route::has('login')) <h1 style="font-size: 15px;margin-left:3px;color:navajowhite;">Please login!</h1>

                                    @endif
                                    @else
                                    {{Auth::user()->name }}
                                     
                                     </h1></span></h4>
                                     @endguest
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('layouts.includes.sidemenu')
      </div>
     
    </div>
  </div>
</div>
<style>
    
    .button1{
        margin-right: 5px;
        margin-left: 5px;
        color: greenyellow;
        background-color:honeydew;
        padding: 5px;
        border-color:1px solid mintcream;
        border-radius: 3px;
    }
    .button2{
        margin-right: 5px;
        margin-left: 5px;
        color: springgreen;
        background-color: honeydew;
        padding: 5px;
        border-color:1px solid  mintcream;
         border-radius: 3px;
    }
    
    .Logout:hover{
        color: darkblue;
        background-color: ghostwhite;
    }
    .modal.left .modal-dialog{
        position: absolute;
        top: 0;
        left: 0;
        margin:0 ;
    }
    .modal.left .modal-dialog.modal-sm{
        max-width: 350px;
    }
    .modal.left .modal.content{
        min-height: 100vh;
        border: 0;
        max-height: 700px;
    }
    h4{
        font-family:Arial,sans-serif ;
        font-size:20px ;
        font-weight:bolder ;
        text-transform: uppercase;

    }
    .card-header{
        background: rgb(78, 73, 97);
        color: #fff;

    }
    .container3{
       
        float: left;
        margin-left: 0px;
        margin-right: 0px;
        display: inline-block;
        width: 1600px;
        border-radius: 3px;
        background-color:mintcream;
    }
    .nav-link{
        color: darkolivegreen;
        font-size: 1em;
        font-weight: bolder;
        font-family: sans-serif;
        padding: 5px;
        border-color:none;

    }
   .nav-link:hover{
    color: springgreen;

   }
     @media screen and(max-width:480px){
     #app{
        font-size: 15px;
        font-family: sans-serif;
     }
    }
    
</style>

    </div>
   


</body>
@yield('scripts')

</html>
