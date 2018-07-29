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
    		Mixtape.com|Profile
    	</title>
        <style>
        #list{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        #list li a{
            color: black;
            text-align: left;
            text-decoration: none;
        }
        #list li.current-song {
            background-color:#634691 ;
            color: white;
        }

        #list li:hover:not(.current-song) {
            background-color: #555;
            color: white;
        }
        </style>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
    </head> 
    <body align="center" style="background-color:#9A61AB;">
    <div id="main" align=center>
<div id="Titlelogo" align="center"><a href="Home.php"><img src="asset/Pictures/Mixtapelogo.png" alt="Home" height=100% width=100%></a></div>		<div id="navibar" align="center">
			<?php include 'Navibar.html';?>
		</div>
		<div id="profile" align="center">
			<?php include 'Account_nav.php';?>
		</div>
        <div id="search" align="center">
        	<table height="100%" width="100%">
        		<tr>
        			<td width="30%" align="right">
        				<img src="asset/Pictures/search.png" alt="search" height=40% width=40%>
        			</td>
        			<td width="70%">
        				<input type="text" height="100%" width="100%">
        			</td>
        		</tr>
        	</table>
        </div>
        <div id="player" align="center">
        
		</div>
        <div id="recom" align="center">
        <table height=100%>
        		<tr height="10%">
        			<td align="center">
        				<h2>
	        				PROFILE
	        			</h2>
        			</td>
        		</tr>
        		<tr height="90%">
        			<td>
                        <?php include 'Side_nav.php';  ?>
                        </td>
        		</tr>
        	</table>	
        </div>
        <div id="mainscreen" align="center">
        	<table width=100% height=100%>
			  <tr>
			    <td style="color: #7C3F8D"><h2>Your Playlists</h2></td>
			  </tr>
			  <tr height="80%">
			    <td>
                    <iframe src="Playlist_handling.php" width="100%" height =100% style="border :none;"></iframe>
                </td>
			  </tr>
			</table>
    	</div>
    </div>        
    </body>
    <footer>
    	 <p>
    	 	Made by: Ahmed, Ishfaq
    	 </p>
		 <p>Contact information: 
		 	<a href="mailto:ishfaqahmed0837@gmail.com">
			 ishfaqahmed0837@gmail.com
			</a>.
		</p>
    </footer>
</html>