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

<h1 style="text-align:center; font-size: 40px;">All Recipes</h1><br>

<u style="font-size: 20px;">Top Rated Recipes</u></br></br>
@foreach($toprated as $tr)
<tr>
    <td>{{ $tr['title'] }}</td>
    <td>{{ $tr['caption'] }}</td>
</tr>
@endforeach
<br><br><br>
<u style="font-size: 20px;">Recent Recipes</u></br></br>
@foreach($recent as $r)
<tr>
    <td>{{ $r['title'] }}</td>
    <td>{{ $r['caption'] }}</td>
</tr>
@endforeach

<div class="bottomright"><a href="{{ url('/') }}">Back to Main Page</a></div>

</body>
</html>

