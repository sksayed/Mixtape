<?php

$host_name = "localhost";
$user_name="root";
$password="";
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

	function all_playlist_of_a_user_as_result_set ( $user_id )
	{
		global $conn ; // database er sathe connection hoilo 
        
		$query =" SELECT playlist_id , playlist_name FROM playlist where user_id =\"".$user_id."\" " ;
		
		$result = mysqli_query($conn , $query) ;
		if ( $result == true )
		{
		   return $result ;
	    }
		//return $row ;
         
         else
         {
         	echo " result ase nai " ;
         }
	}

	function insert_a_song ($song_name , $song_path)
	{
		global $conn ;

		$query = "INSERT INTO `song` (`song_id`, `song_name`, `song_path`) VALUES (NULL, \"".$song_name."\", \"".$song_path."\"); " ;
		echo $query ;
		if (mysqli_query($conn, $query)) 
		{
    		//echo "New record created successfully";
    		return true ;
         } 
      else {
                  // echo "Error: " . $query . "<br>" . mysqli_error($conn);
                   return false ;
		 }

	}

	function all_values_of_a_song ($value)
	{
		global $conn ;
		$query = "SELECT * FROM song where song_id =\"".$value."\" ;";
	    $result = mysqli_query($conn , $query) ; // result set er moddhe rakha holo ;
		$row = mysqli_fetch_assoc($result);
		return $row ;

	}
    function all_songs_under_a_playlist ($playlist_id)
    {
    	global $conn ; // database er sathe connection hoilo 
        
		$query =" SELECT song_id FROM playlist_songs where playlist_id =\"".$playlist_id."\" " ;
		
		$result = mysqli_query($conn , $query) ;
		if ( $result == true )
		{
		   return $result ;
	    }
		//return $row ;
         
         else
         {
         	echo " result ase nai " ;
         }
    }

    function p ($playlist_id)
    {
    	global $conn ;
		$query = "SELECT * FROM playlist where playlist_id =\"".$playlist_id."\" ;";
	    $result = mysqli_query($conn , $query) ; // result set er moddhe rakha holo ;
		$row = mysqli_fetch_assoc($result);
		return $row ;

    }



?>