<?php 

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<section class="index-login">
	  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
	  <div class="index-login-login">	
	  	<form class="p-5 rounded shadow" action="login.inc.php" method="post" style="width: 30rem">
	  		<h1 class="text-center pb-5 display-4">LOGIN</h1>
	  	
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Email Address</label>
		    <input type="email" name="email" placeholder="Email" class="form-control">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Password</label>
		    <input type="password" class="form-control" name="pass" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-primary">LOGIN</button>
		
		</form>
	  </div>
	  </div>
	</section>
</body>
</html>

