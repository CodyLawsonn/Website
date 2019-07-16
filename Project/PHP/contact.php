<?php
require_once "dbValues.php";
require_once "Validation.php";

$fname="";
$lName="";
$email="";
$pNumber="";
$Desc="";
$fname_val="";
$lName_val="";
$email_val="";
$pNumber_val="";
$Desc_val="";
$message="";

echo <<<_END
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Product</title>
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
				<a href="#">Search Part</a>
				<a href="../PHP/catalogue.php">Full Catalogue</a>
				<a id="LogIn" href="../PHP/LogIn.php">Admin Log In</a>
			</div>
		  </div> 
		  <a href="../html/About.html">About</a>
		  <a href="../html/Contact.html">Contact</a>
		</div>
	</head>
	<br>
_END;

if (isset($_POST["search"])){
        if (!$connection)
        {
            die("Connection failed: " . $mysqli_connect_error);
        }
		
		$fname = sanitise($_POST["fName"], $connection);
		$lName=sanitise($_POST["lName"], $connection);
		$email=sanitise($_POST["email"], $connection);
		$pNumber=sanitise($_POST["pNumber"], $connection);
		$Desc=sanitise($_POST["Desc"], $connection);
		
		$fname_val = validateString($fname, 1, 16);
		$lName_val = validateString($lName, 1, 16);
		$email_val = validateString($email, 1, 30);
		$pNumber_val = validateString($pNumber, 1, 11);
		$Desc_val = validateString($Desc, 1, 255);
		
		$errors = $fname_val.$lName_val.$email_val.$pNumber_val.$Desc_val;
		
		if ($errors == ""){
			$insertQuery = "INSERT INTO contact (contact_Fname, contact_Lname, contact_Email, contact_Desc, contact_Pnumber) VALUES ('$fname', '$lName', '$email', '$Desc', '$pNumber')";
			$insertResult = mysqli_query($connection, $insertQuery);

			if ($insertResult >0){
				$message = "You have successfully submitted a form.";
				}
			else {
			   $message = "You have not successfully entered a form.";
        }
		} else {
			$message = "You have not successfully entered a form.";
		}
}

echo $message;
?>