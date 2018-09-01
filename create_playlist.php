
<?php  
 session_start() ;
 if ($_SESSION["user_id"])
 {

 }
 else
 {
 	header("location:MainMenu.php");
 }

 require ("dbconnection.php");

   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
    }


     function has_specialChars ( $varPass)
{
	$has_modulus = strpos($varPass, '%') !== false;
    $has_hash = strpos($varPass, '#') !== false;
	$has_attherate = strpos($varPass, '@') !== false;
	$has_dollar = strpos($varPass , '$') !== false ;
	
	if ( $has_modulus || $has_attherate || $has_hash || $has_dollar )
	{
		//echo "password has special characters <br/>" ;
		return true ;
	}
	else
	{
		//echo "password dont have special characters <br/>";
		return false ;
	}
	
}
  $all_true = false ;
 $name=$checkboxErr = $nameErr ="";
 if (isset($_POST["submitb"]) && $_SERVER["REQUEST_METHOD"] == "POST" )
 {


 	 if (empty($_POST["pname"]))
		 {
			 $nameErr =" playlist Name field is empty " ;
			 $all_true =true ;
		 }
		 else
		 {
			 $name = test_input($_POST["pname"]) ;
			 
			
			 if(!ctype_alpha($name[0]))
			 {
				 $nameErr =" 1st letter of name is number ";
				 $all_true =true ;
			 }
			 if (has_specialChars($_POST["pname"]))
			 {
				 $nameErr =" playlist name has special characters " ;
				 $all_true =true ;
			 }
	
			 
		 }

		 if (empty($_POST["check_box"]))
		 {
             $checkboxErr =" no songs has been selected " ;
             $all_true =true ;
		 }



		 if (!$all_true && !empty($_POST["pname"])) // jodi sob thik thake 
		 {
		 	$user_id = $_SESSION["user_id"] ;
		 	$playlistName = $name ;
		 	$playlist_id =create_a_playList($playlistName , $user_id) ;

		 	if ($playlist_id > 0 )
		 	{
		 		 //echo $playlist_id ;

		 		 foreach ($_POST["check_box"] as $key) {
		 		 	# code...
		 		 	insert_into_playlist_songs($playlist_id , $key) ;
		 		 }

		 		 header("location:Profile.php");
		 		  /*echo (" <script type=\"text/javascript\">
      window.top.location.href =\"dashboard.php\";
    </script>"); */

		 	}
		 	else
		 	{
		 		echo " playlist is not created " ;
		 	}

		 }



 }










?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error {color: #FF0000;}
	</style>
</head>
<body align="center">
	<h2> Create playlist </h2>
	<form method = "POST" action="">
	playlist Name :	<input type="text" name="pname" value="<?php echo $name;?>"> <span class="error"> <?php echo $nameErr;?></span>
	 <?php
	 //require ("dbconnection.php");
	 $song_resultset = all_songs_resultset () ;
	 echo "<h3> List of songs </h3>  " ;
	  $x =1 ;
	 
     ?>
     <table align="center">
     	<th>
     		<b>serial</b>
     	</th>
     	<th>
     		<b>songs</b>
     	</th>
     	<th>
     		check 
     	</th>

     <?php
   	
	 while ($songs = mysqli_fetch_assoc($song_resultset) ) {
	 	# code...
	 	echo "<tr>" ;
	 	echo "<td>";
	 	echo $x ;
	 	echo "</td>";
	 
        
	 	
	 	echo "<td>";
	 	echo $songs["song_name"] ;
	 	echo "</td>";
	 	echo "<td>";
	 	echo " <input type=\"checkbox\" name =\"check_box[]\" value =\"".$songs["song_id"]."\"> " ;
	 	echo "</td>";
	 	echo "</tr>" ;
	 	$x++;

	 	//echo " <input type=\"checkbox\" name =\"check_box[]\" value =\"".$songs["song_id"]."\"> ".$songs["song_name"]." " ;
	 }

     ?>

     	
     </table>
     <table align="center">
     	<tr>
     		<td>
     			 <span class="error"> <?php echo $checkboxErr; ?></span>
     
     		</td>
     	</tr>
    </table>
     <input type="submit" name="submitb" >
	</form>

</body>
</html>