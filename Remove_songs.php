<?php


require("dbconnection.php");
$pl_id = $_GET["serial"] ;
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
          delete_a_song_from_playlist ($pl_id , $key) ;
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
<body align="center">
  <form method="POST" action="">
<div>
	<?php
		
		require("mp3file.class.php");
			
        //require("dbconnection.php");

           
           //echo $pl_id ;
           
           $playlist_er_result = all_songs_under_a_playlist ($pl_id) ;
           if (mysqli_num_rows( $playlist_er_result) > 0 )
           {
           	//jodi playlist e gaan thake 
           	   //playlist er name likhte hbe 
           	$playlist = p ($pl_id) ;
           	echo "<h2>".$playlist["playlist_name"]."</h2>";
           	//echo "<ul id='Playlist' align='center'>";
            echo ("<table align=\"center\">
    <th>
        <b>serial</b>
      </th>
      <th>
        <b>songs</b>
      </th>
      <th>
        check 
      </th>") ;
            

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
			 			
			 			echo "<tr>" ;
    echo "<td>";
    echo $s ;
    echo "</td>";
   
        
    
    echo "<td>";
    echo $name ;
    echo "</td>";
    echo "<td>";
    echo " <input type=\"checkbox\" name =\"check_box[]\" value =\"".$a["song_id"]."\"> " ;
    echo "</td>";
    echo "</tr>" ;
   

			// echo "<li class='current-song'><a id='".$name."' href='".$a["song_path"]."'>".$s.") ".$a["song_name"]." - ".$dur."</a></li>";
			 			
			 			
			 			
			 $s++;				
			 			
           	 }
             echo "</table> " ;

           }
           else
           {
           	$playlist = p ($pl_id) ;
           	echo "<h2>".$playlist["playlist_name"]."</h2>";
           	 echo "<h1>no song in this play list </h1>" ;
           }

?>
   <input type="submit" name="submitb" value=ok>
   <div>  <span class="error"> <?php echo $checkboxErr; ?></span> </div>
</div>
</form>
</body>
</html>