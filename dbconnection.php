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
		//echo $query ;
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
    function all_songs_resultset ()
    {
    	
    	global $conn ; // database er sathe connection hoilo 
        
		$query ="SELECT * from song  " ;
		
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
    function create_a_playList ( $playlist_name , $user_id  )
    {
    	global $conn ;

    	$query =" INSERT INTO `playlist` (`playlist_id`, `playlist_name`, `user_id`,`hits`) VALUES (NULL,\"".$playlist_name."\" ,\"".$user_id."\", '0' ); " ;
    	$result = mysqli_query($conn , $query);

    	if ($result == true)
    	{
    		$query ="SELECT playlist_id FROM playlist ORDER BY playlist_id DESC LIMIT 1 ";
    		$result =mysqli_query($conn , $query);
    		$value = mysqli_fetch_assoc($result);

    		return $value["playlist_id"] ;

    	}
    	else
    	{
    		return -1 ;
    	}

    }
    function insert_into_playlist_songs ( $playlist_id , $song_id)
    {
    	global $conn ;
    	$query ="  INSERT INTO `playlist_songs` (`playlist_id`, `song_id`) VALUES (\"".$playlist_id."\", \"".$song_id."\");  " ;
    	$result =  mysqli_query($conn , $query);
    	
    }
    function delete_a_playlist ($playlist_id)
    {
    	global $conn ;
    	$query =" DELETE FROM `playlist` WHERE `playlist_id` = ".$playlist_id." ";
    	$result = mysqli_query($conn , $query);
    	if ($result == true)
    	{
    		 header("Location:Playlist_handling.php");
    	}
    	else
    	{
    		echo "kaj hoi nai ";
    	} 

    }

    function incrementhits($playlist_id,$hits)
    {
      global $conn;
      $query="UPDATE `playlist` SET `hits` = '".$hits."' WHERE `playlist`.`playlist_id` = ".$playlist_id;
      $result=mysqli_query($conn,$query);
    }
    function s($song_id)
    {
      global $conn;
      $query = "SELECT * FROM song where song_id =\"".$song_id."\" ;";
      $result = mysqli_query($conn , $query) ; // result set er moddhe rakha holo ;
    $row = mysqli_fetch_assoc($result);
    return $row ;
    }

    function incrementsonghits($song_id,$hits)
    {
      global $conn;
      $query="UPDATE `song` SET `hits` = '".$hits."' WHERE `song`.`song_id` = ".$song_id;
      $result=mysqli_query($conn,$query);
    }
    function allplaylist()
    {
      global $conn;
      $query="SELECT * FROM `playlist` ORDER BY `playlist_id` DESC";
      $result=mysqli_query($conn,$query);
      return $result;
    }

    function trendingpl()
    {
      global $conn;
      $query="SELECT * FROM `playlist` ORDER BY `hits` DESC LIMIT 5";
      $result=mysqli_query($conn,$query);
      return $result;

    }


    function update_pl_name($playlist_id, $playlist_name )
    {
      global $conn ;
      $query="UPDATE `playlist` SET `playlist_name` = '".$playlist_name."' WHERE `playlist`.`playlist_id` = ".$playlist_id;
       $result=mysqli_query($conn,$query);
    }
    function delete_a_song_from_playlist ($playlist_id, $song_id)
    {
      global $conn ;

      $query="DELETE FROM `playlist_songs` WHERE `playlist_songs`.`playlist_id` = ".$playlist_id ." AND `playlist_songs`.`song_id` = ".$song_id;
      $result=mysqli_query($conn,$query);

    }

    
    function update_user_name ($user_id , $update_user_name)
    {
      global $conn ;
      $query="UPDATE `user` SET `name` = '".$update_user_name."' WHERE `user`.`user_id` = '".$user_id."';";
      $result=mysqli_query($conn,$query);
      if ($result == true )
      {
        echo " updated" ;
      }
      else
      {
        echo "not updated";
      }

    }
    function update_user_email($user_id , $update_user_email)
    {
      global $conn ;
      $query="UPDATE `user` SET `email` = '".$update_user_email."' WHERE `user`.`user_id` = '".$user_id."';";
      $result=mysqli_query($conn,$query);
      if ($result == true )
      {
        echo "updated" ;
      }
      else
      {
        echo "not updated";
      }

    }
?>
