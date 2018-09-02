<?php

require ("dbconnection.php");

   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
    }


     function has_specialChars ( $varPass)
{
	$has_modulus = strpos($varPass, '%') !== false;
    $has_hash = strpos($varPass, '#') !== false;
	$has_attherate = strpos($varPass, '@') !== false;
	$has_dollar = strpos($varPass , '$') !== false ;
	
	if ( $has_modulus || $has_attherate || $has_hash || $has_dollar )
	{
		//echo "password has special characters <br/>" ;
		return true ;
	}
	else
	{
		//echo "password dont have special characters <br/>";
		return false ;
	}
	
}
$name=$nameErr="";
if (isset($_POST["namesubmit"]) && $_SERVER["REQUEST_METHOD"] == "POST" )
{
     








}











?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<form method="POST" action="">
		
	
	<tr>
		<td> Change Name</td>
		<td><input type="text" name="plname"></td>
		<td><input type="submit" name="namesubmit"></td>

	</tr>
	<tr>
		<td>
			<?php
			$sl=$_GET['sl'];
			 echo "<a href='Remove_songs.php?serial=".$sl."'>Remove songs</a>";
			?>
		</td>
	</tr>
	<tr>
		<td><a href="Add_songs.php">Add Songs</a></td>
	</tr>
</form>
</table>
</body>
</html>