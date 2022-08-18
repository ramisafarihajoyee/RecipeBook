<!DOCTYPE html>
<html>
<head>
<title>Art of Food</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@php
use App\Models\Recipe;
@endphp
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
    .w3-bar-block .w3-bar-item {padding:20px}

    .bottomright {
        position: absolute;
        bottom: 8px;
        right: 16px;
        font-size: 18px;
    }
</style>
</head>
<body>
<h3>Favorite Lists:</h3><br>

  @foreach ( $lists as $l )
    @php
        $recipe = Recipe::where('id', $l['recipe_id'])
                ->value('title');
    @endphp
    <a href="{{ url('showfullrecipe.showid', $l['recipe_id']) }}">{{ $recipe }}</a>
    <a href="{{ url('showfullrecipe.showid', $l['recipe_id']) }}" class="btn btn-primary">Show Full Recipe</a>
    <a href="{{ url('unfavorite', $l['recipe_id']) }}" class="btn btn-danger">Unfavorite</a><br><br>
  @endforeach

  <div class="bottomright"><a href="{{ url('/dashboard') }}">Back to Home</a></div>
  
</body>
</html>
