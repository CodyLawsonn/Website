<?php

    require_once "dbValues.php";
	
if (isset($_GET["deleteNumber"])){
        $delete=$_GET["deleteNumber"];
        
        if (!$connection)
        {
            die("Connection failed: " . $mysqli_connect_error);
        }
        $deleteQuery = "DELETE FROM part WHERE part_No = '$delete'";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if ($deleteResult >0){
            echo "You have successfully deleted that part.<br>";
            }
        else {
            echo"The part was not deleted.";
        }
}

?>