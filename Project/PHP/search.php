<?php
require_once"dbValues.php";
echo <<<_END
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Search Part</title>
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

if(isset($_POST['search'])){
	$q = $_POST['q'];
	$query = mysqli_query($connection,"SELECT * FROM part WHERE part_No LIKE '%$q%'"); 
	$count = mysqli_num_rows($query);
	if($count == "0"){
		$output = '<h2>No result found!</h2>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$a = $row['part_No'];
		$s = $row['part_Desc'];
		$d = $row['part_RRP'];
				$output = '<table><tr id="tableTitle"><td>Part Number</td><td>Part Description</td><td>RRP</td></tr>
								<tr><td>'.$a.'</td><td>'.$s.'</td><td>'.$d.'</td></tr></table><br>';
			}
		}
	}
	
	echo $output;
?>