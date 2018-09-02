<?php
  session_start() ;
  require ("dbconnection.php");
    $account_name=""; 
   if ($_SESSION["userName"] )
   { //jodi session e kono user name thake 
	   $user = all_values_of_a_user ($_SESSION["userName"] ) ;
	   $account_name= $user["name"];
   }
   else
   {
	   header("location:MainMenu.php");
   }
?>

<html>
    <head>
    	<title>
    		Mixtape.com|Trending
    	</title>
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
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
    </head> 
    <body align="center">
    <div id="main" align=center>
        <div id="mainscreen_pl" align="center">
        	<table width=100% height=50%>
			  <tr>
			    <td style="color: #7C3F8D"><h2>Trending</h2></td>
			  </tr>
			  <tr> <td>
            <?php 
            $playlist=trendingpl();
            if (mysqli_num_rows($playlist) > 0) {
            echo "<ul class='plst' align='left'>";
            $sl = 1 ;
            while ($row = mysqli_fetch_assoc( $playlist) )
          {
           # code...
        echo "<li class='pl' align='left'><div align='left'><a href='Playlist_viewing.php?serial=".$row["playlist_id"]."'style='text-decoration: none;'>".$sl.") ".$row["playlist_name"]."<h6> by ".$row['user_id']."</h6></a></div><div align='right'>hits:".$row["hits"]."</div></li>";
        $sl++ ;
       } // for loop ses 
       echo "</ul>";
   } // if condition ses 
?>
          </td>   
			  </tr>
			</table>
    	</div>
    </div>
    </body>
</html>