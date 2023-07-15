<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Login Page</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>
	<div class="header"><h1>Home Sweet Home <br><div class="job">Students Bill</div></h1><div class="about">
		<a href="index.php">Home</a>
		<a href="register.php">Register</a>
		<a href="login.php">Login</a>
		<a href="logout.php">Logout</a></div>
	</div>
		
<form action="../database/logindb.php" method="post" ><div class="label">
	<h1>Login Account</h1><br>
	

	<label>Username :</label><br>
	<input type="text" name="loginname" placeholder="Username"><br></div>
	<div class="label">
	<label>Password  :</label><br>
	<input type="Password" name="loginpw" placeholder="Password"><br></div>
	
    	
	<div class="submit">

		<button type="submit" name="loginSubmit">Login In</button></div>
		<div class="reset">
	    <button type="reset" name="reset" >Reset</button></div>
	    <div class="login"><span>Or</span><p>Doesn't have an account? <a href="register.php">Register</a> </p></div>
</form>
<div class="space"></div>
<div class="footer">
		<p>2023-2024</p><br>
		<p>@ by Kelvin Zhang</p><br>
		<p><span>&#x1F4E7;</span>info@kelv40187@gmail.com<span>&#128222;</span>+959756260289.</p>

		
	</div>

</body>
</html>