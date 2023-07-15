<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Register Page</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>
	<div class="header"><h1>Home Sweet Home <br><div class="job">Students Bill</div></h1><div class="about">
		<a href="index.php">Home</a>
		<a href="register.php">Register</a>
		<a href="login.php">Login</a>
		<a href="logout.php">Logout</a></div>
	</div>
		
<form action="../database/registerdb.php" method="post" ><div class="label">
	<h1>Create an Account</h1><br>
	

	<label>Username :</label><br>
	<input type="text" name="name" placeholder="Username"><br></div>
	<div class="label">
	<label>Password  :</label><br>
	<input type="Password" name="pw" placeholder="Password"><br></div>
	<div class="label">
	<label>Re-Enter Password  :</label><br>
	<input type="Password" name="rpw" placeholder="Re-Enter Password"><br></div>
    <div class="label">
	<label>Phone-Number :</label><br>
	<input type="tel" name="phno" placeholder="Phone-Number"><br></div>
    	
	<div type="submit" name="register_submit" class="submit">

		<button type="submit" name="submit">Sign Up</button></div>
		<div class="reset">
	    <button type="reset" name="reset" >Reset</button></div>
	    <div class="login"><span>Or</span><p>Already have an Account <a href="login.php">Login</a> </p></div>
</form>
<div class="space"></div>
<div class="footer">
		<p>2023-2024</p><br>
		<p>@ by Kelvin Zhang</p><br>
		<p><span>&#x1F4E7;</span>info@kelv40187@gmail.com<span>&#128222;</span>+959756260289.</p>

		
	</div>

</body>
</html>