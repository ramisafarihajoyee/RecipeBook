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
            <a href="{{ url('/notebook') }}">Notebook</a>
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
@foreach ( $recipes as $rec )
    <div class="card text-center col d-flex justify-content-center">
        <img src="{{ url($rec['image']) }}" alt="{{ $rec['image'] }}" class="card-img-top-center mx-auto d-block" style="width:30%">
        <div class="card-body">
            <h5 class="card-title">{{ $rec['title'] }}</h5>
            <p class="card-text">{{ $rec['caption'] }}</p>
            <p class="card-text">{{ $rec['category'] }}</p>
        </div>
    </div>
    <div class="card ">
        <div class="card-header">
            Preparation time: {{ $rec['time'] }} minutes
        </div>
        <div class="card-header">
            Total calories: {{ $rec['calories'] }} calories
        </div>
        <div class="card-header">
            Ingredients:
        </div>
        <ul class="list-group-flush">
            @foreach(explode(',', $rec['ingredients']) as $ingredients) 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $ingredients }}
                    </label>
                </div>
            @endforeach
        </ul>

        <div class="card-header">
            Instructions:
        </div>
        <div class="card-body">
            <p class="card-text">
                @foreach(explode('\n', $rec['description']) as $description) 
                    <p>{{ $description }}</>
                @endforeach
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ url('/favorite.add', $rec['id']) }}" class="btn btn-success">Add to Favourite</a>
            <!-- <a href="{{ url('/notebook.add', $rec['id']) }}" class="btn btn-primary">Save to Notebook</a> -->
            <a href="{{ url('editrecipeform', $rec['id']) }}" class="btn btn-primary" >Edit Recipe</a>
            <a href="{{ url('deleterecipe', $rec['id']) }}" class="btn btn-danger float-right">Delete Recipe</a>
            <div class="bottomright"><a href="{{ url('/foodblog.check') }}">Back to Blog</a></div>
        </div>
    </div>
@endforeach

</body>
</html>



