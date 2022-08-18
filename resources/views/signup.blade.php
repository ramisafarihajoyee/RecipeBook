<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/signup.css">
</head>
<body>

@if(session()->has('success'))
    
    <div class="alert alert-primary" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('fail'))
    
    <div class="alert alert-primary" role="alert">
        {{ session()->get('fail') }}
    </div>
@endif



<form action="store" method="POST">
  {{ csrf_field() }}
  <div class="container">
    <h1 style="text-align:center">Register an Account</h1>
    <hr>

    <input type="text" placeholder="Enter Name" name="name" id="name" value="{{ old('name') }}" required>
    <input type="text" placeholder="Enter Email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>
    <input type="text" placeholder="Enter facebook/instagram account" name="account" id="account">


    <select class="form-select" id="skill" name="skill" aria-label="Default select example" required>
    <!-- <label for="category">Choose a car:</label> -->
    <option value="0">Select Category:</option>
    <option value="Beginner">Beginner</option>
    <option value="Intermediate">Intermediate</option>
    <option value="Advanced">Advanced</option>
   </select>
  </div>
  <hr>
    <button type="submit" class="registerbtn">Register</button>
    <input type="reset" class="registerbtn" value="Reset">
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="loginform">Sign in</a>.</p>
    <a href={{ url('/') }}>Back to Home</a>
  </div>
</form>

</body>
</html>
