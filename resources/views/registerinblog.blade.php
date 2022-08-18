<html>
<head>
<link rel="stylesheet" href="/css/login.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Register in blog</title>
</head>
<body>

    <form action="register" method="POST">

        {{ csrf_field() }}

     	<h2>Want to open up your personal blog?</h2>
      <!-- <input class="form-control" id="name" type="text" name="name" required="required" > -->
     	<!-- <input type="text" class="form-control" name="username" placeholder="Username"> -->
        <input type="text" placeholder="Username" name="name" id="name" 
         value="{{ old('name') }}" required>
      <br>

        <button type="submit" name="submit">Submit</button>

     </form>

     <a href="{{ url('/dashboard') }}">Back to Home</a>
     
</body>
</html>