<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.pl a{
            text-decoration: none;
        }
        </style>
</head>
<body align="center">

  



	<?php
    require ("dbconnection.php"); 
	//$sl=0;
    //$s="";
    //$user = all_values_of_a_user($_SESSION["user_id"]);
    $playlist = all_playlist_of_a_user_as_result_set ( "bazoo123" ) ;
    if (mysqli_num_rows($playlist) > 0) {
        echo "<ul class='plst' align='left'>";
        $sl = 1 ;
         echo (" <table align=\"center\"> 
    <tr>
    <th> <b> serial</b></th>
    <th> <b> playlist name  </b></th>
    <th> <b> operations </b></th>
    </tr> ") ;

          while ($row = mysqli_fetch_assoc( $playlist) )
          {
          	echo "<tr>";
          	echo "<td>";
          	echo $sl ;
          	echo "</td>";

          	echo "<td>";
          	echo " <a class='pl' href='Playlist_viewing.php?serial=".$row["playlist_id"]."' target='_parent'>".$row["playlist_name"]."</a>";
          	echo "</td>";

          	echo "<td>";
          	echo " <a class='pl' href='Playlist_viewing.php?serial=".$row["playlist_id"]."' target='_parent'>"." Delete"."</a>";   
          	echo "</td>";


           # code...
        //echo "<li class='pl' align='left'>".$sl.") <a href='Playlist_viewing.php?serial=".$row["playlist_id"]."' target='_parent'>".$row["playlist_name"]."</a></li>";
        $sl++ ;
       } // for loop ses 
      
   } // if condition ses 
   else
   {
    echo "No playlist created by this user ";
   }
    /*
	echo "<ul class='plst' align='left'>";
	foreach(glob('uploads/*', GLOB_ONLYDIR) as $dir) {
	$dirname = basename($dir);
    $s=$sl+1;
	echo "<li class='pl' align='left'>".$s.") <a href='Playlist_viewing.php?serial=".$sl."' target='_parent'>".$dirname."</a></li>";
	$sl++;
	}
	echo "</ul>";
    */
?>

</table>
</body>
</html>


</body>
</html>