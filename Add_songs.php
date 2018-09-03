<?php
require("dbconnection.php");
$sl=$_GET['serial'];
//echo $sl ;
$checkboxErr="";
$all_true = false ;
if (isset($_POST["submitb"]) && $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if (empty($_POST["check_box"]))
		 {
             $checkboxErr =" no songs has been selected " ;
             $all_true =true ;
		 }

		 if (!$all_true && !empty($_POST["check_box"]))
		 {
		 	 foreach ($_POST["check_box"] as $key) {
		 		 	# code...
		 		 	insert_into_playlist_songs($sl , $key) ;
		 		 }
		 		 header("location:Profile.php");
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
<body align ="center">
    <h2> ADD Songs </h2>
	<form method="POST" action="">
	<div align="center">
	<table>
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
   	
   	 $x =1 ;
   	$song_resultset = all_songs_resultset () ;
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
	</div>
	<div align="center">
		<input type="submit" name="submitb" value="Ok">
	</div>
	<div>  <span class="error"> <?php echo $checkboxErr; ?></span> </div>

	</form>
</body>
</html>