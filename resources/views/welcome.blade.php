<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Art of Food</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/main.css">  
    </head>
    
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login') && Auth::check())
                <div class="top-right links">
                    <a href="{{ url('/home') }}">Dashboard</a>
                </div>
            @elseif (Route::has('login') && !Auth::check())
                <div class="top-right links">
                    <a href="{{ url('/login') }}"></a>
                    <a href="{{ url('/register') }}"></a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    ART OF FOOD
                </div>

                <div class="links">
                    <a href="{{ url('/about') }}">About</a>
                    <a href="{{ route('recipes') }}">Recipes</a> 
                    
                </div>

                <div class="top-right links">
                    <a href="{{ URL::to('/loginform') }}">Sign In</a>
                    <a href="{{ URL::to('/signup') }}">Sign Up</a>
                </div>
                
            </div>
        </div>
    </body>
</html>
