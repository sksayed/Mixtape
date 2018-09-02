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
$all_true = false ;
$name=$nameErr="";
if (isset($_POST["namesubmit"]) && $_SERVER["REQUEST_METHOD"] == "POST" )
{   


	if (empty($_POST["plname"]))
		 {
			 $nameErr =" playlist Name field is empty " ;
			 $all_true =true ;
		 }
		 else
		 {
			 $name = test_input($_POST["plname"]) ;
			 
			
			 if(!ctype_alpha($name[0]))
			 {
				 $nameErr =" 1st letter of name is number ";
				 $all_true =true ;
			 }
			 if (has_specialChars($_POST["plname"]))
			 {
				 $nameErr =" playlist name has special characters " ;
				 $all_true =true ;
			 }
	
			 
		 }  

		 if (!$all_true && !empty($_POST["plname"]))
		 {
		 	



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
<body>
<table>
	<form method="POST" action="">
		
	
	<tr>
		<td> Change Name</td>
		<td><input type="text" name="plname"  value="<?php echo $name;?>"></td>
		<td><input type="submit" name="namesubmit"></td>
		<td><span class="error"> <?php echo $nameErr;?></span></td>

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
		<td>
			<?php
			   // <a href="Add_songs.php">Add Songs</a>

			echo "<a href='Add_songs.php?serial=".$sl."'> Add songs</a>"

			?>
		</td>
	</tr>
</form>
</table>
</body>
</html>