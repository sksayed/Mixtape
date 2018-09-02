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
            background-color: #eee;
            color: #444;
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
            background-color: #ccc; 
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
        echo "<li class='pl' align='left'><a href='Playlist_viewing.php?serial=".$row["playlist_id"]."'style='text-decoration: none;'>".$sl.") ".$row["playlist_name"]." </a><a href='Delete_pl.php?sl=".$row["playlist_id"]."'><img src='uploads/delete.png' height=2% width =3%></img></a><a href='Manage_playlist.php?sl=".$row["playlist_id"]."'><img src='uploads/manage.png' height=2% width =3%></img></a></li>";
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
<script type="text/javascript">
/*
  function update(val ) {
    if (val =="")
    {
      alert("no values found") ;
    }
    else
    {

      var xmlhttp = XMLHttpRequest () ;
      xmlhttp.onreadystatechange = function ()
      {
        if (this.readyState == 4 && this.status == 200 )
        {

        }
      };

      xmlhttp.open ("GET" , "pl_hits.php?p="+val,true);
      xmlhttp.send ();

    }
  }
  */
</script>
</body>
</html>
