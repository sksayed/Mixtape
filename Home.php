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
    		Mixtape.com|Home
    	</title>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
    </head> 
    <body align="center" style="background-color:#9A61AB;">
    	<div id="main" align=center>
			<div id="Titlelogo" align="center">
	  			<a href="Home.php"><img src="asset/Pictures/Mixtapelogo.png" alt="Home" height=100% width=100%></a>
			</div>		
			<div id="navibar" align="center"> <!-- navi bar er moddhe suggestion , collection and trend menu ase -->
				<?php require 'Navibar.php';?>
			</div>
			<div id="profile" align="center">		<!-- Account_Nav er moddhe  profile ta ase  -->	
				<?php require 'Account_nav.php';?>
			</div>
	        <div id="recom" align="center">
				<iframe id="sideframe" src="Recommended.php" style="border:none;height:100%;width:100%;"></iframe>	
	        </div>
	  		<div id="mainscreen" align="center">
	        	<iframe id="mainframe" src="Welcome.php" style="border:none;height:100%;width:100%;"></iframe>
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