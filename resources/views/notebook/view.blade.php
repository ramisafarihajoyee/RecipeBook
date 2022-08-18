<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/dashboard.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
    .w3-bar-block .w3-bar-item {padding:20px}

    .bottomright {
        position: absolute;
        bottom: 7px;
        right: 16px;
        font-size: 18px;
    }
</style>
</head>
<body>


<div class="topnav">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ url('/dashboard') }}">Home</a>
            <a href="{{ url('/recipes') }}">Recipes</a>
            <a href="{{ url('/shoppingcart') }}">Shopping Cart</a>
            <a href="{{ url('/notebook/show') }}">Notebook</a>
            <a href="{{ url('/foodblog.check') }}">Recipe Blog</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/signout') }}">Sign Out</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>


<!-- card design -->
@foreach ( $note as $n )
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">{{ $n['title'] }}</h5>
            <p class="card-text">{{ $n['description'] }}</p>
        </div>
    </div>
    <br>
    <div class="card-footer">
        <a href="{{ url('notebook/edit', $n['id']) }}" class="btn btn-primary" >Edit</a>
        <a href="{{ url('notebook/delete', $n['id']) }}" class="btn btn-danger float-right">Delete</a>
    </div>
    <br>
    <div class="bottomright"><a href="{{ url('/dashboard') }}">Back to Home</a></div>
@endforeach

</body>
</html>



