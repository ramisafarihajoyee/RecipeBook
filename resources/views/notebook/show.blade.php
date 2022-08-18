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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 60%;
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.container {
  padding: 20px 16px;
}
</style>
</head>
<body>

<div class="topnav">
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="{{ url('/dashboard') }}">Home</a>
        <a href="{{ url('/shoppingcart') }}">Shopping Cart</a>
        <a class="active" href="{{ url('notebook/show') }}">Notebook</a>
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

<div class="w3-container w3-teal">
    <h2>Note Cards</h2>
</div>
<br>
<a href="{{ url('notebook/create') }}" class="btn btn-success">Create</a><br><br>

@foreach ( $notes as $note )
<div class="column">
  <div class="col-sm-5">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">{{ $note['title'] }}</h5>
        <p class="card-text">{{ $note['description'] }}</p>
        <a href="{{ url('notebook/view', $note['id']) }}" class="btn btn-warning">View</a>
        <a href="{{ url('notebook/edit_fetch', $note['id']) }}" class="btn btn-primary">Edit</a>
        <a href="{{ url('notebook/delete', $note['id']) }}" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
<br>
@endforeach
<br>
<a href="{{ url('/dashboard') }}" class="btn btn-primary">Back to Home</a>
</body>
</html>