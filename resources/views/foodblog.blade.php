<!DOCTYPE html>
<html>
<head>
<title>Food Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="/css/foodblog.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<div class="topnav">
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="{{ url('/dashboard') }}">Home</a>
      <a href="{{ url('/shoppingcart') }}">Shopping Cart</a>
      <a href="{{ url('/notebook/show') }}">Notebook</a>
      <a class="active" href="/foodblog.check">Recipe Blog</a>
      <a href="{{ url('/addrecipe') }}">Add Recipe</a>
      <a href="#contact">Recipe List</a>
      <a href="{{ url('/about') }}">About</a>
      <a href="{{ url('/signout') }}">Sign Out</a>
      <form class="d-flex" role="search" action="dashboard.search" method="POST">
        {{ csrf_field() }}
          <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
  </nav>
</div>

<div style="text-align:center; font-size:150%;">
  <p>Welcome to your blog!</p>
</div>

<!-- <a>{{ session('username') }}</a> -->
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
  @foreach ( $recipe as $rec )
    <div class="w3-row-padding w3-padding-16 w3-center" id="food">
      <div class="w3-quarter">
        <img src="{{ url($rec['image']) }}" alt="{{ $rec['image'] }}" style="width:100%">
        <a href="{{ url('showfullrecipe.showid', $rec['id']) }}">{{ $rec['title'] }}</a>
        <h>{{ $rec['caption'] }}</h>
      </div>
    </div>
  @endforeach
</div>


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
</div>
</body>
</html>
