<html>
<head>
<link rel="stylesheet" href="/css/login.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Login</title>
</head>
<body>

    <form action="loginform" method="POST">

        {{ csrf_field() }}

     	<h2>LOGIN</h2>

     	<input type="email" class="form-control" name="email" placeholder="Email"><br>

     	<input type="password" class="form-control" name="password" placeholder="Password"><br>

     	<button type="submit" name="submit">Login</button>
     </form>

     <a href={{ url('/') }}>Back to Home</a>
     
	 
</body>
</html>