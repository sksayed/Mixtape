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
    		Mixtape.com|Account Info
    	</title>
        </style>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
    </head> 
    <body align="center" style="background-color:#9A61AB;">
    <div id="main" align=center>
        	<table width=100% height=100%>
			  <tr>
			    <td style="color: white"><h2>Account Info</h2></td>
			  </tr>
			  <tr height="80%">
			    <td>
                    <table>
                        <tr>
                            <td>
                                <h3>Name</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["name"]; ?></h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h3>User ID</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["user_id"]; ?></h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h3>Email</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["email"]; ?></h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h3>Gender</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["gender"]; ?></h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h3>Date Of Birth</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["dob"]; ?></h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h3>Type</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["type"]; ?></h4>
                            </td>
                        </tr>
                    </table>
                </td>
			  </tr>
			</table>
    	</div>
    </div>
    </body>
</html>