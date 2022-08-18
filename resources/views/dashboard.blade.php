<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/dashboard.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<style>{font-family: "Karma", sans-serif}</style>
</head>
<body>


<div class="topnav">
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="active" href="{{ url('/dashboard') }}">Home</a>
        <!-- <a href="{{ url('/recipes') }}">Recipes</a> -->
        <a href="{{ url('/shopping_cart/shoppingcart') }}">Shopping Cart</a>
        <a href="{{ url('notebook/show') }}">Notebook</a>
        <a href="foodblog.check">Recipe Blog</a>
        <a href="{{ url('/about') }}">About</a>
        <a href="{{ url('/signout') }}">Sign Out</a>

        <form class="d-flex" role="search" action="dashboard.search" method="POST">
        {{ csrf_field() }}
          <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <a href="{{ url('/profile') }}">Profile</a>
        <a href="{{ url('/favorite') }}">Favorite</a>
    </div>
  </nav>
</div>

<div class="card">
  <div class="btn-group">
    <button type="button" class="btn btn">Browse By: </button>
    <a href="{{ url('toprated.show') }}">
      <button  class="btn btn-info">Top Rated</button>
    </a> 

    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Category
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Dessert</a></li>
      <li><a class="dropdown-item" href="#">Breakfast</a></li>
      <li><a class="dropdown-item" href="#">Lunch</a></li>
      <li><a class="dropdown-item" href="#">More...</a></li>
    </ul>

    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Ingredient
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Milk</a></li>
      <li><a class="dropdown-item" href="#">Chocolate</a></li>
      <li><a class="dropdown-item" href="#">Peanut Butter</a></li>
      <li><a class="dropdown-item" href="#">More...</a></li>
    </ul>

    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Season
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Summer</a></li>
      <li><a class="dropdown-item" href="#">Spring</a></li>
      <li><a class="dropdown-item" href="#">Fall</a></li>
    </ul>

    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Occasion
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Birthday</a></li>
      <li><a class="dropdown-item" href="#">Eid Day</a></li>
      <li><a class="dropdown-item" href="#">Valentine's Day</a></li>
      <li><a class="dropdown-item" href="#">Anniversary</a></li>
      <li><a class="dropdown-item" href="#">More...</a></li>
    </ul>
  </div>
</div>
<br>
<div class="w3-row-padding w3-padding-16 w3-center" id="food" style="text-align:center">
  <div class="w3-quarter">
    <!-- <a href="{{ url('competition/form') }}">
      <button type="submit" class="btn btn-primary" name="submit">Search Available Competitions</button>
    </a> -->
    <a href="{{ url('competition/form') }}">
      <button type="submit" class="btn btn-primary" name="submit">Competition Form</button>
    </a>
    <a href="{{ url('competition/result') }}">
      <button type="submit" class="btn btn-primary" name="submit">Competition Result</button>
    </a>
  </div>
</div>



<br><br>
@foreach ( $recipes as $rec )
<div class="card text-center col d-flex justify-content-center" >
  <img class="card-img-top-center mx-auto d-block" src="{{ url($rec['image']) }}" alt="{{ $rec['image'] }}" style="width:20%">
  <div class="card-body">
    <h5>{{ $rec['title'] }}</h5>
    <p class="card-text">{{ $rec['caption'] }}</p>
        <a href="{{ url('showfullrecipe.showid', $rec['id']) }}" class="btn btn-primary">View</a>
        <a href="{{ url('/favorite.add', $rec['id']) }}" class="btn btn-primary">Add to Favourite</a>
        <a href="#" class="btn btn-primary">Save as Note</a>
        <br><br>
        <a href="{{ url('/dashboard.like', $rec['id']) }}" class="btn btn-primary">{{ $rec['like'] }} Likes</a>
        <a href="{{ url('/dashboard.dislike', $rec['id']) }}" class="btn btn-danger">{{ $rec['dislike'] }} Dislikes</a>
        <a class="btn btn-success">{{ $rec['views'] }} Views</a>
  </div>
</div>
<br>
@endforeach


<!-- Pagination -->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

</body>
</html>



