<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
   	require ("dbconnection.php");
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
</body>
</html>