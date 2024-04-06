@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sublime Tech</title>
</head>
<body >
    <style >
        img{
           max-height: 400px;
           margin-left:10px ;
           margin-right:10px ;
           border-radius: 5px;
        }
    </style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span>Sublime <img style="height:10px;weight:10px;" src="images/download5.jpg" class="d-block w-100" alt="..."></span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="background-color: midnightblue; border-radius:4px;" align="items-center" class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a  style="color:rgb(98, 250, 100, 1.0);"class="nav-link active" aria-current="page" href="{{url('home')}}" >Home</a>
        </li>
        <li class="nav-item">
          <a style="color:rgb(98, 250, 100, 1.0);" class="nav-link" href="#">Contact</a>
        </li>
         <li class="nav-item">
          <a style="color:rgb(98, 255, 100, 1.0);" class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a style="color:rgb(98, 255, 100, 1.0);"class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a style="color:rebeccapurple;"class="dropdown-item" href="#">Solar </a></li>
            <li><a style="color:rebeccapurple;"class="dropdown-item" href="#">Solar Accessories</a></li>
            <li><hr style="color:cornflowerblue;" class="dropdown-divider"></li>
            <li><a style="color:green;" class="dropdown-item" href="#">Batteries</a></li>
            <li><a style="color:green;" class="dropdown-item" href="#">Tvs</a></li>
            <li><a style="color:green;" class="dropdown-item" href="#">Other Gadgets</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">View</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="images/download3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/download4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/background1" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</html>
@endsection