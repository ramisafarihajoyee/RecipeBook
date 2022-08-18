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

<br>
<div class="w3-row-padding w3-padding-16 w3-center" id="food" style="text-align:center">
  <div class="w3-quarter">
    <h2>Competition List:</h2>
    <table>
        <tr>
            <th>Season</th>
            <th>Year</th>
            <th>Place</th>
        </tr>
        @foreach($list as $r)
        <tr>
            <td>{{ $r['competition_season'] }}</td>
            <td>{{ $r['competition_year'] }}</td>
            <td>{{ $r['competition_place'] }}</td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

</body>
</html>



