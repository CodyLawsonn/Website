<?php
function sanitise($str, $connection)
{
	if (get_magic_quotes_gpc())
	{
		$str = stripslashes($str);
	}
	$str = mysqli_real_escape_string($connection, $str);
	$str = htmlentities($str);
	return $str;
}

function validateString($field, $minlength, $maxlength) 
{
    if (strlen($field)<$minlength) 
    {		
        return "Minimum length: " . $minlength; 
    }
	elseif (strlen($field)>$maxlength) 
    { 
        return "Maximum length: " . $maxlength; 
    }
    return ""; 
}
?>