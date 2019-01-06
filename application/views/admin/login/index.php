<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/login/css/main.css">
	<!--===============================================================================================-->
</head>
<body>

	<div class="login-page">
	  	<div class="form">
	    	<form method="POST" class="login-form">
	      		<input type="text" placeholder="username" name="username"/>
	      		<input type="password" placeholder="password" name="password"/>
	      		<button type="submit">login</button>
	      		<p class="message">Not registered? <a href="#">Create an account</a></p>
	    	</form>
	  	</div>
	</div>

</body>
</html>
