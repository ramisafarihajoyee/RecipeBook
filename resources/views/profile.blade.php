<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/profile.css">

</head>
<body>

@foreach ( $info as $i )
<div class="card">
  <h2>{{ $i['name'] }}</h2>
  <p>Blog Username: {{ $i['blog_username'] }}</p>
  <p>Email: {{ $i['email'] }}</p>
  <p>Cooking Skill: {{ $i['baking_skills'] }}</p>
  <p>Competition Achievements:</p>
  @foreach ( $result as $r )
    <p>Position {{ $r['position'] }} in {{ $r['competition_season'] }}, {{ $r['competition_year'] }} Competition </p>
  @endforeach
  <div style="margin: 24px 0;"> 
    <a href="{{ $i['social_medias'] }}"><i class="fa fa-instagram"></i></a>  
    <a href="{{ $i['social_medias'] }}"><i class="fa fa-facebook"></i></a> 
  </div>
</div>
<a href="{{ url('/profileeditform') }}" class="btn btn-primary">Edit</a><br>
<a href="{{ url('/dashboard') }}" class="btn btn-primary">Back to Home</a>
@endforeach


</body>
</html>
