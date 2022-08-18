<!DOCTYPE html>
<html>
<head>
<title>Art of Food</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">

<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif; font-size: 17px;}
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

<h2 style="text-align:center; font-size: 40px;">Searched Results</h2><br><br>
  @foreach ( $results as $res )
    <a href="{{ url('showfullrecipe.showid', $res['id']) }}">{{ $res['title'] }}</a>
  @endforeach

<div class="bottomright"><a href="{{ url('/dashboard') }}">Back to Home</a></div>

  
</body>
</html>

