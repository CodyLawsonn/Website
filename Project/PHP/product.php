<?php
require_once "dbValues.php";
require_once "Validation.php";

$deleteNumber="";
$newNumber="";
$newDesc="";
$newRRP="0";
$newNumber_val="";
$newDesc_val="";
$newRRP_val="";
$message="";

if (isset($_POST["newNumber"])){
        if (!$connection)
        {
            die("Connection failed: " . $mysqli_connect_error);
        }
		
		$newNumber = sanitise($_POST["newNumber"], $connection);
		$newDesc=sanitise($_POST["newDesc"], $connection);
		$newRRP=sanitise($_POST["newRRP"], $connection);
		
		$newNumber_val = validateString($newNumber, 1, 15);
		$newDesc_val = validateString($newDesc, 1, 60);
		
		if (filter_var($newRRP, FILTER_VALIDATE_INT) === 0 || filter_var($newRRP, FILTER_VALIDATE_INT)) {
			$newRRP_val="";
		} else {
			$newRRP_val="RRP is not an integer";
		}
		
		$errors = $newNumber_val.$newDesc_val.$newRRP_val;
		
		if ($errors == ""){
			$insertQuery = "INSERT INTO part (part_No, part_Desc, part_RRP) VALUES ('$newNumber', '$newDesc', '$newRRP')";
			$insertResult = mysqli_query($connection, $insertQuery);

			if ($insertResult >0){
				$message = "You have successfully inserted that part.";
				}
			else {
			   $message = "That part was not successfully inserted.";
        }
		} else {
			$message = "Please make sure the information entered above is correct.";
		}
}

echo <<<_END
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Product</title>
		<link rel="stylesheet" href="../CSS/product.css">
		<a href="../HTML/home.html">
		<img id="logo" src="../IMAGES/Logo.png">
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
	<br>
	<div class="formStyle">
	<form action="delete.php" method="get">
	  Please enter a product number you would like to delete:<input type="text" name="deleteNumber" maxlength="15" value="$deleteNumber" required>
	  <input type="submit" value="Submit">
	</form>	
	<br>
	<form action="product.php" method="post">
	  Please enter the information of a new product: <br><br>
	  Product Number:<input type="text" name="newNumber" maxlength="15" value="$newNumber" required>
	  <br>
	  Description:<input type="text" name="newDesc" max length="60" value="$newDesc" required>
	  <br>
	  RRP:<input type="text" name="newRRP" maxlength="15" value="$newRRP" required>
	  <br>
	  <input type="submit" value="Submit">
	</form>
	</div>
_END;

echo $message;
?>