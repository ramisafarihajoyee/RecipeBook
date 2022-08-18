<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/signup.css">
</head>
<body>

<form action="profileedit" method="POST">
  {{ csrf_field() }}
  <div class="container">
    <h1 style="text-align:center">Update Profile</h1>
    <hr>

    <input type="text" placeholder="Enter Name" name="name" id="name">
    <input type="text" placeholder="Enter facebook/instagram account" name="account" id="account">

    <select class="form-select" id="skill" name="skill" aria-label="Default select example">
    <option value="0">Select Category:</option>
    <option value="Beginner">Beginner</option>
    <option value="Intermediate">Intermediate</option>
    <option value="Advanced">Advanced</option>
   </select>
  </div>
  <hr>
    <button type="submit" class="registerbtn">Update Profile</button>
    <input type="reset" class="registerbtn" value="Reset">
  </div>
  
  <div class="container signin">
    <a href="{{ url('/profile') }}">Back to Profile</a>
  </div>
</form>

</body>
</html>
