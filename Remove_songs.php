<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<?php
		require("dbconnection.php");
		require("mp3file.class.php");
			
        //require("dbconnection.php");

           $pl_id = $_GET["serial"] ;
           
           $playlist_er_result = all_songs_under_a_playlist ($pl_id) ;
           if (mysqli_num_rows( $playlist_er_result) > 0 )
           {
           	//jodi playlist e gaan thake 
           	   //playlist er name likhte hbe 
           	$playlist = p ($pl_id) ;
           	echo "<h2>".$playlist["playlist_name"]."</h2>";
           	echo "<ul id='Playlist' align='left'>";
           	$s = 1 ;
           	 while ( $q = mysqli_fetch_assoc( $playlist_er_result) ) 
           	 {
           	 	# code...
           	 	  $a= all_values_of_a_song ($q["song_id"]) ;
           	 	        //$path_parts = pathinfo($a[$i]);
			 			$name=$a["song_name"]; // file name 
			 				$mp3file = new MP3File($a["song_path"]);//song path 
			 				$duration2 = $mp3file->getDuration();
			 				$dur=MP3File::formatTime($duration2);
			 			
			 			
			 echo "<li class='current-song'><a id='".$name."' href='".$a["song_path"]."'>".$s.") ".$a["song_name"]." - ".$dur."</a></li>";
			 			
			 			
			 			
			 $s++;				
			 			
           	 }

           }
           else
           {
           	$playlist = p ($pl_id) ;
           	echo "<h2>".$playlist["playlist_name"]."</h2>";
           	 echo "<h1>no song in this play list </h1>" ;
           }

?>
</div>
</body>
</html>