<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body align="center">
	<h2> Create playlist </h2>
	<form method = "POST" action="">
	playlist Name :	<input type="text" name="pname">
	 <?php
	 require ("dbconnection.php");
	 $song_resultset = all_songs_resultset () ;
	 echo "<h3> List of songs </h3>  " ;
	 echo "<ol align=\"center\">";
	 while ($songs = mysqli_fetch_assoc($song_resultset) ) {
	 	# code...
	 	echo "<li> <input type=\"checkbox\" name =\"check_box[]\" value =\"".$songs["song_id"]."\"> ".$songs["song_name"]."</li> <br/>" ;
	 }
    
	 echo "</ol>";


     ?>
     <input type="submit" name="submitb" >
	</form>

</body>
</html>