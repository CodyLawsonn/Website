<?php

require_once "dbValues.php";
require_once "Validation.php";
$username = "";
$password = "";
$username_val = "";
$password_val = "";

$show_signin_form = false;
$message = "";

if (isset($_SESSION['loggedInSkeleton']))
{
	echo "You are already logged in, please log out first.<br>";

}
elseif (isset($_POST['username']))
{
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if (!$connection)
	{
		die("Connection failed: " . $mysqli_connect_error);
	}	
	
    
	$username = sanitise($_POST['username'], $connection);
	$password = sanitise($_POST['password'], $connection);
		
	$username_val = validateString($username, 1, 16);
	$password_val = validateString($password, 1, 16);
	$errors = $username_val . $password_val;
	
	if ($errors == "")
	{
		$query_log_in = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
        
        $log_in = mysqli_query($connection, $query_log_in);
        
        $n = mysqli_num_rows($log_in);
	
			
		if ($n > 0)
		{
			$_SESSION['loggedInSkeleton'] = true;
			$_SESSION['username'] = $username;
            
			
			$message = "Hi, $username, you have successfully logged in, please <a href='../PHP/product.php'>click here</a><br>";
		}
		else
		{
			$show_signin_form = true;
			$message = "Sign in failed, please try again<br>";
		}
		
	}
	else
	{
		$show_signin_form = true;
		$message = "Sign in failed, please check the errors shown above and try again<br>";
	}
	
	mysqli_close($connection);

}
else
{

	$show_signin_form = true;
}

if ($show_signin_form)
{
echo <<<_END
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Log in</title>
		<link rel="stylesheet" href="../CSS/master.css">
		<a href="../HTML/home.html">
		<h1> <img id="logo" src="../IMAGES/Logo.png"> </h1>
		</a>
		<div class="navbar">
		<a href="../html/home.html">Home</a>
		<div class="dropdown">
			<button class="dropbtn">Catalogue 
			  <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="../PHP/catalogue.php">Full Catalogue</a>
				<a id="LogIn" href="../PHP/LogIn.php">Admin Log In</a>
			</div>
		  </div> 
		  <a href="../html/About.html">About</a>
		  <a href="../html/Contact.html">Contact</a>
		</div>
	</head>

	<body>
	<div>
		<form action="LogIn.php" method="post">
		  <h2>Please enter your username and password:<br>
		  Username: <input type="text" name="username" maxlength="16" value="$username" required> $username_val
		  <br>
		  Password: <input type="password" name="password" maxlength="16" value="$password" required> $password_val
		  <br>
		  <input type="submit" value="Submit">
		  </h2>
		</form>	
	</div>
	</body>
	</html>
_END;
}

echo $message;

?>