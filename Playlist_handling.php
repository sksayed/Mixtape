<?php

session_start() ; // session start hoise karon validation korbo 
 // require ("dbconnection.php");
    $account_name=""; 
   if ($_SESSION["userName"] )
   { //jodi session e kono user name thake 
      // $user = all_values_of_a_user ($_SESSION["userName"] ) ;
       //$account_name= $user["name"];
   }
   else
   {
       header("location:MainMenu.php");
   }




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.pl {
            background-color: #A669DA;
            color: #FFFFFF;
            padding: 18px;
            width: 90%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 25px;
        }
        .pl a{
            text-decoration: none;
        }
        .pl:hover {
            background-color: #B4A3C2; 
        }
        .plst{
            list-style-type: none;
            align-content: left;
        }
	</style>
</head>
<body>
  <div style="clear: both; color: white ; width: 100%;">
        <h2>Your Playlists</h2>
  </div>
	<?php
    require ("dbconnection.php"); 
	//$sl=0;
    //$s="";
    //$user = all_values_of_a_user($_SESSION["user_id"]);
    $playlist = all_playlist_of_a_user_as_result_set ( $_SESSION["userName"]  ) ;
    if (mysqli_num_rows($playlist) > 0) {
        echo "<ul class='plst' align='left'>";
        $sl = 1 ;
          while ($row = mysqli_fetch_assoc( $playlist) )
          {
           # code...
        echo "<li class='pl' align='left'><div><div align='left' style='float:left;'><a href='Playlist_viewing.php?serial=".$row["playlist_id"]."'style='text-decoration: none;'>".$sl.") ".$row["playlist_name"]." </a></div><div align='right'><a href='Delete_pl.php?sl=".$row["playlist_id"]."'><img src='uploads/delete.png' height=1% width =2%></img></a></div><div align='right'><a href='Manage_playlist.php?sl=".$row["playlist_id"]."'><img src='uploads/manage.png' height=1% width =2%></img></a></div><div class='fb-like' data-href='http://localhost/WebTech%20Project%20Final%20v2/Playlist_viewing.php?serial=".$row["playlist_id"]." data-layout='standard' data-action='like' data-size='small' data-show-faces='false' data-share='true'></div></div></li>";
        $sl++ ;
       } // for loop ses 
       echo "</ul>";
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
