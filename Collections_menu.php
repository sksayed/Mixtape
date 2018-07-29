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
    		Mixtape.com|Collections
    	</title>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
    </head> 
    <body align="center" style="background-color:#9A61AB;">
    <div id="main" align=center>
        <div id="mainscreen_pl" align="center">
        	<table width=100% height=100%>
			  <tr>
			    <td style="color: #7C3F8D"><h2>Collections</h2></td>
			  </tr>
			  <tr>
			    <td><iframe src="Playlist_list.html" style="border:none;height:100%;width:100%;"></iframe></td>
			  </tr>
			</table>
    	</div>
    </div>
    </body>
</html>