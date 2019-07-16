<?php 
require_once "dbValues.php";

$connection = mysqli_connect($dbhost,$dbuser,$dbpass);

if (!$connection)
{
	die("Connection failed: " . $mysqli_connect_error);
}
  
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;

if (mysqli_query($connection, $sql)) 
{
	echo "Database created successfully, or already exists<br>";
} 
else
{
	die("Error creating database: " . mysqli_error($connection));
}

mysqli_select_db($connection, $dbname);

$sql = "DROP TABLE IF EXISTS admin"; 

if (mysqli_query($connection, $sql)) 
{
	echo "Dropped existing table: admin<br>";
} 
else 
{	
	die("Error checking for existing table: " . mysqli_error($connection));
}

$sql = "CREATE TABLE admin (
	admin_ID INT NOT NULL AUTO_INCREMENT,admin_username VARCHAR(10), admin_password VARCHAR(15), admin_fname VARCHAR (15), admin_lname VARCHAR(15), PRIMARY KEY(admin_ID)
	)";

if (mysqli_query($connection, $sql)) 
{
	echo "Table created successfully: admin<br>";
}
else 
{
die("Error creating table: " . mysqli_error($connection));
}

$admin_username[] = 'darrinL'; $admin_password[] = 'letmein'; $admin_fname[] = 'Darrin'; $admin_lname[] = 'Lawson';
$admin_username[] = 'GeorgiaMae'; $admin_password[] = 'abc123'; $admin_fname[] = 'Georgia'; $admin_lname[] = 'Smith';
$admin_username[] = 'Brandon'; $admin_password[] = 'secret95'; $admin_fname[] = 'Brandon'; $admin_lname[] = 'Wilson';
$admin_username[] = 'codylawson'; $admin_password[] = 'cody123'; $admin_fname[] = 'Cody'; $admin_lname[] = 'Abbott';

for ($i=0; $i<count($admin_username); $i++)
{
	$sql = "INSERT INTO admin (
	admin_username, 
	admin_password, 
	admin_fname, 
	admin_lname) 
	VALUES (
	'$admin_username[$i]', 
	'$admin_password[$i]', 
	'$admin_fname[$i]', 
	'$admin_lname[$i]'
	)";
	if (mysqli_query($connection, $sql)) 
	{
		echo "row inserted<br>";
	}
	else 
	{
		die("Error inserting row: " . mysqli_error($connection));
	}
}

$sql = "DROP TABLE IF EXISTS part"; 

if (mysqli_query($connection, $sql)) 
{
	echo "Dropped existing table: part<br>";
} 
else 
{	
	die("Error checking for existing table: " . mysqli_error($connection));
}

// make our table:
$sql = "CREATE TABLE part (
	part_ID INT NOT NULL AUTO_INCREMENT, part_No VARCHAR(15), part_Desc VARCHAR(60), part_RRP INT(7), PRIMARY KEY(part_ID)
	)";

if (mysqli_query($connection, $sql)) 
{
	echo "Table created successfully: part<br>";
}
else 
{
die("Error creating table: " . mysqli_error($connection));
}

$part_No[] = 'NCH339050101'; $part_Desc[] = 'Haldex Raise and Lower Valve'; $part_RRP[] = '339';
$part_No[] = 'NCW4721950180'; $part_Desc[] = 'Wabco Solenoid Modulator Valve'; $part_RRP[] = '105';
$part_No[] = 'NCW4757111260'; $part_Desc[] = 'Wabco Loadsensing Valve'; $part_RRP[] = '290';
$part_No[] = 'NCH612025001'; $part_Desc[] = 'Haldex Linkage for Trailer Levelling Valve'; $part_RRP[] = '29';
$part_No[] = 'NCW9710021500'; $part_Desc[] = 'Wabco Relay Valve for Mulitple Applications'; $part_RRP[] = '105';
$part_No[] = 'NCW9735000060'; $part_Desc[] = 'Wabco 2 Port Quick Release Valve'; $part_RRP[] = '45';
$part_No[] = 'NCK626392'; $part_Desc[] = 'Kongsberg Clutch Servo Suitable for Volvo Applications'; $part_RRP[] = '290';
$part_No[] = 'NCK629683'; $part_Desc[] = 'Kongsberg Clutch Servo Suitable for Scania Applications'; $part_RRP[] = '300';
$part_No[] = 'NC1423566'; $part_Desc[] = 'Gearbox Valve Suitable for Scania Applications'; $part_RRP[] = '90';
$part_No[] = 'NC41225765'; $part_Desc[] = 'Trailer 20-24 Disc Spring Brake Actuator'; $part_RRP[] = '95';
$part_No[] = 'NCKZB4578'; $part_Desc[] = 'Knorr Bremse Air Processing Unit'; $part_RRP[] = '350';
$part_No[] = 'NC72788'; $part_Desc[] = 'Trailer Automatic Slack Adjuster with Complete Fixing Kit'; $part_RRP[] = '40';
$part_No[] = 'NCW9254314410'; $part_Desc[] = 'Truck 24-30 Drum Spring Brake Activator'; $part_RRP[] = '90';
$part_No[] = 'NCW4630320200'; $part_Desc[] = 'Wabco Raise and Lower Valve'; $part_RRP[] = '109';
$part_No[] = 'NC1068951'; $part_Desc[] = 'Range Change Valve Suitable for Scania Applications'; $part_RRP[] = '95';

for ($i=0; $i<count($part_No); $i++)
{
	$sql = "INSERT INTO part (
	part_No, 
	part_Desc, 
	part_RRP) 
	VALUES (
	'$part_No[$i]', 
	'$part_Desc[$i]', 
	'$part_RRP[$i]'
	)";
	
	if (mysqli_query($connection, $sql)) 
	{
		echo "row inserted<br>";
	}
	else 
	{
		die("Error inserting row: " . mysqli_error($connection));
	}
}
$sql = "DROP TABLE IF EXISTS contact"; 

if (mysqli_query($connection, $sql)) 
{
	echo "Dropped existing table: contact<br>";
} 
else 
{	
	die("Error checking for existing table: " . mysqli_error($connection));
}

$sql = "CREATE TABLE contact (
	contact_ID INT NOT NULL AUTO_INCREMENT,contact_Fname VARCHAR(16), contact_Lname VARCHAR(16), contact_Email VARCHAR (30), contact_Desc VARCHAR(255), contact_Pnumber VARCHAR(11), PRIMARY KEY(contact_ID)
	)";

if (mysqli_query($connection, $sql)) 
{
	echo "Table created successfully: contact<br>";
}
else 
{
die("Error creating table: " . mysqli_error($connection));
}
?>