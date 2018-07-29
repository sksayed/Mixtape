<?php

$host_name = "localhost";
$user_name="root";
$password="12345";
$database_name= "mixtape";

$conn = mysqli_connect( $host_name , $user_name , $password , $database_name) ;

if (!$conn)
{
	die ("database not connect").mysqli_connect_error();
	//echo "database connected" ;
}

  function if_same_username_exists ($var )
{
	global  $conn ;
	$value=trim($var);
	$query = "SELECT user_id FROM user where user_id =\"".$value."\" ;";
	$result = mysqli_query($conn , $query) ; // result set er moddhe rakha holo ;
	$rowCount = mysqli_num_rows($result);// row returned count kora holo ;
	if ($rowCount > 0)
	{
    return true ;
	}
	else
	{
	return false ;
	}	
}
    function all_values_of_a_user ( $value)
	{
		global $conn ;
		$query = "SELECT * FROM user where user_id =\"".$value."\" ;";
	    $result = mysqli_query($conn , $query) ; // result set er moddhe rakha holo ;
		$row = mysqli_fetch_assoc($result);
		return $row ;
	}
 



?>