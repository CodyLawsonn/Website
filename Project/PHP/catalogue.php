<?php
require_once"dbValues.php";
require_once"Validation.php";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$partNumber="";
$retrieveQuery = "SELECT part_No, part_Desc, part_RRP FROM part";
$retrieveResult = mysqli_query($connection, $retrieveQuery);
$retrieveRows = mysqli_num_rows($retrieveResult);

	echo <<<_END
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Catalogue</title>
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
_END;
 if ($retrieveRows > 0) {
    echo '<table><tr id="tableTitle"><td>Part Number</td><td>Part Description</td><td>RRP</td>';
    while ($retrieveRows = mysqli_fetch_array($retrieveResult, MYSQLI_ASSOC)) {
        echo '<tr><td>' . $retrieveRows['part_No'] .
        ' </td><td>' . $retrieveRows['part_Desc'] .
        ' </td><td> £' . $retrieveRows['part_RRP'] . 
        ' </td></tr>';
    }
     echo '</table><br>';
 }
     else {
        echo "<p>There are no parts</p>";
    }





?>