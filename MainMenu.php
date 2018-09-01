<?php
session_start() ; // session start kora hoise 
require ("dbconnection.php") ;
function password_For_valid_username ($var)
{
	global $conn ;
	if (if_same_username_exists($var) )
	{
		$sql= "SELECT password FROM `user` WHERE user_id =\"".$var."\";";
		$result = mysqli_query($conn, $sql);// result e rakha holo 
		$row = mysqli_fetch_assoc($result);
		return $row["password"];
		
	}
	else
	{
		return "";
	}
}
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

    $all_chekc = false ;
// definig all the variables 
   $uname = $pass ="";
   $unameErr = $passErr ="";

if (isset($_POST["submitb"]) && $_SERVER["REQUEST_METHOD"] == "POST" )
 {
	 //for uname 
	  if (empty($_POST["uname"]))
   {
	   $unameErr ="user name is empty ";
	   $all_chekc = true ;
   }
   else
   {
	   $uname = test_input($_POST["uname"]) ;
	   $usernameLength = strlen($uname);
	   if ($usernameLength < 8 || $usernameLength > 12  )
	   {
		   $unameErr = "username is not in between 8 - 12 characters " ;
			$all_chekc	= true ;	   
	   }
      if (has_specialChars($uname) )
		{
			$unameErr = " username has special characters (%,$,@,#) " ;
			$all_chekc=true;
	   }	 
    }
	// for password 
   if (empty($_POST["pass"]))
   {
	   $passErr =" password field is empty ";
	    $all_chekc = true ;
   }
   else
   {
	   $pass = test_input($_POST["pass"]) ;
	   $paslength = strlen($pass ) ;
			 
				 if ($paslength < 8 )
				 {
					 $passErr = " password  has lass than 8 characters <br/>" ; 
					 $all_chekc=true;
					 
				 }
				 if (!has_specialChars($_POST["pass"]) )
				 {
					 $passErr .= " password has no special characters " ;
					 $all_chekc=true;
				 }
   }
 // ekhane jodi all true hoi then home.php te jabe 
     if (if_same_username_exists($uname))
	 {
		 $password = password_For_valid_username($uname);
		 if ($password !== $pass )
		 {
			 $passErr .= "<br/>password did not matched " ;
			 $all_chekc = true ;
		 }
		 else
		 {
			 $_SESSION["userName"] = $uname ;
			 $_SESSION["user_id"] = $uname ;
			 header("location:home.php");
		 }
	 }
	 else
	 {
		 $unameErr .="<br/> invalid username ";
		  $all_chekc = true ;
		 
	 }
}
?>



<html>
    <head>
    	<title>
    		Mixtape.com|Home
    	</title>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
		<style>
		.error 
		{
			color:red ;
		}
		</style>
    </head> 
    <body align="center" style="background-color:#9A61AB;">
    <div id="main" align="center">
	<div id="Titlelogo" align="center"><a href="Home.php"><img src="asset/Pictures/Mixtapelogo.png" alt="Home" height=100% width=100%></a></div>		
	<div id="navibarmm" align="center">
			<nav>
				<ul id="navibar1">
					<li><a href="Collections_menu.php"><h2>Collections</h2></a></li>
					<li><a href="Playlist_menu.php"><h2>Playlists</h2></a></li>
					<li><a href="Trending_menu.php"><h2>Trending</h2></a></li>
				</ul>
			</nav>
	</div>
    <div id="mainscreenmm" >
		<table width=100% height=100% align="center">
			<form  method="POST" action ="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]) ; ?>" >
			  <tr align="center">
			  <td>
				<img src="asset/Pictures/Mixtapelogo.png" alt="Home" height=50% width=50%>
				</td>
			  </tr>
			  <tr>
			  <td>
			  	<table width=100% height=100% >
				<tr>
					<td align="right"width=50%>
					UserName
					</td>
					<td align="left">
					<input type="text" name="uname" placeholder="User Name..." value="<?php echo $uname;?>" > <span class="error"> <?php echo $unameErr; ?> </span>
					</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Password
				</td>
				<td align="left">
					<input type="text" name="pass" placeholder="Password..." value="<?php echo $pass;?>" > <span class="error"> <?php echo $passErr; ?> </span>
				</td>
				</tr>
				<tr>
					<td align="right">
						
					</td>
				</tr>
				
				</table>
				</td>
				<tr>
				<td align="center"width=100%>
					<input type="submit" name="submitb" width=40px >
					</td>
				</tr>
			  </tr>
			  <tr align="center">
			  <td>
				<a href="Signup.php">New Here? Make an account</a>
				or
			    <a href="Home.php">ENTER MIXTAPE.com</a>
			  </td>
			  </tr>
			  </form>
    	</table>
    </div>
    </body>
    <footer>
    	 <p>
    	 	Made by: Ahmed, Ishfaq
    	 </p>
		 <p>Contact information: 
		 	<a href="mailto:ishfaqahmed0837@gmail.com">
			 ishfaqahmed0837@gmail.com
			</a>
		</p>
    </footer>
</html>
