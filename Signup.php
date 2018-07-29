<?php

 // defining all the varialbels ;
 require "dbconnection.php";
$name = $uname = $pass = $repass = $email = $dob = $tnc = $gender = "" ;
$nameErr = $unameErr = $passErr = $repassErr = $emailErr = $dobErr = $tncErr = $genderErr="" ;

 
/*function if_same_username_exists ($var )
{
	global  $conn ;
	$value=trim($var);
	$query = "SELECT user_id FROM user where user_id =\"".$value."\" ;";
	$result = mysqli_query($conn , $query) ; // result set er moddhe rakha holo ;
	$rowCount = mysqli_num_rows($result);// row returned count kora holo ;
	if ($rowCount > 0)
	{
    return true ;
	}
	else
	{
	return false ;
	}	
}
*/


 
 $all_chekc = false ;
 
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
	
}//end of function ;

if (isset($_POST["submitb"]) && $_SERVER["REQUEST_METHOD"] == "POST" )
{    //for name 
	 if (empty($_POST["name"]))
		 {
			 $nameErr =" Name field is empty " ;
		 }
		 else
		 {
			 $name = test_input($_POST["name"]) ;
			 
			 $count_words = str_word_count($name) ;
			 if ( $count_words < 2 )
			 {
				 $nameErr = " Name field has less than 2 words " ;
				 $all_chekc=true ;
			 }
			 if(!ctype_alpha($name[0]))
			 {
				 $nameErr =" 1st letter of name is number ";
				 $all_chekc= true ;
			 }
			 if (has_specialChars($_POST["name"]))
			 {
				 $nameErr ="name has special characters " ;
				 $all_chekc= true ;
			 }
	
			 
		 }
   // for uname 
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
       if ( if_same_username_exists($uname) )
       {
		   $unameErr = "this ".$uname." already exists " ;
		    $all_chekc = true ;
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
    // for re password 
	
	if (empty($_POST["repass"]))
   {
	   $repassErr ="Re entered password is empty ";
	    $all_chekc = true ;
   }
   else
   {
	   $repass = test_input($_POST["repass"]) ;
	   
			 if ( !empty($pass) && ( $repass !== $pass ) )
			 {
				 $repassErr = " password did not match " ;
				 $all_chekc=true;
			 }
   }
   
   // for email 
   if (empty($_POST["email"]))
   {
	   $emailErr ="email is empty ";
	    $all_chekc = true ;
   }
   else
   {
	   $email = test_input($_POST["email"]) ;
	    if (!filter_var ( $email ,  FILTER_VALIDATE_EMAIL ) )
			 {
				 $emailErr =" not valid email address " ; 
				$all_chekc=true;				 	
			 }
   }
   // for dob 
   if (empty($_POST["dob"]))
   {
	   $dobErr ="Date of birth  is empty ";
	    $all_chekc = true ;
   }
   else
   {
	   $dob = test_input($_POST["dob"] );
   }
   // for tnc 
   
   if (isset($_POST['tnc']) && $_POST['tnc'] == "tnc" )
   {
	  $tnc = test_input($_POST["tnc"]) ;
	   
   }
   else
   {
	   $all_chekc = true ;
	    $tncErr =" terms not checked  ";
   }
  
   // for gender 
   if (empty($_POST["gender"]))
   {
	   $genderErr =" gender is empty ";
	    $all_chekc = true ;
   }
   else
   {
	   $gender = test_input($_POST["gender"]) ;
   }
   
   
 
}	
















?>


<html>
    <head>
    	<title>
    		Mixtape.com|Registration
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
<div id="Titlelogo" align="center"><a href="Home.html"><img src="asset/Pictures/Mixtapelogo.png" alt="Home" height=100% width=100%></a></div>		
<div id="navibarmm" align="center">
			<nav>
				<ul id="navibar1">
					<li><a href="Collections_menu.html"><h2>Collections</h2></a></li>
					<li><a href="Playlist_menu.html"><h2>Playlists</h2></a></li>
					<li><a href="Trending_menu.html"><h2>Trending</h2></a></li>
				</ul>
			</nav>
		</div>
        <div id="mainscreenmm" >
		<table width=100% height=100% align="center">
			<form method="POST" action = "<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]) ; ?>"  >
			  <tr align="center">
			  <td>
				<h2>Registration Form</h2>
				</td>
			  </tr>
			  <tr>
			  <td>
			  	<table width=100% height=100% >
				<tr>
				<td align="right"width=50%>
					Name
				</td>
				<td align="left">
					<input type="text" name="name" placeholder=" Name..." value="<?php echo $name;?>"> <span class="error"> <?php echo $nameErr ?> </span>
				</td>
				</tr>
				<tr>
				<td align="right"width=50%>
					UserName
				</td>
				<td align="left">
					<input type="text" name="uname" placeholder="User Name..." value="<?php echo $uname;?>"> <span class="error"> <?php echo $unameErr ?> </span>
				</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Password
				</td>
				<td align="left">
					<input type="password" name="pass" placeholder="Password..." value="<?php echo $pass;?>" > <span class="error"> <?php echo $passErr ?> </span>
				</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Re-enter Password
				</td>
				<td align="left">
					<input type="password" name="repass" placeholder="Re-Enter Password..." value="<?php echo $repass;?>"> <span class="error"> <?php echo $repassErr ?> </span>
				</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Email Address
				</td>
				<td align="left">
					<input type="text" name="email" placeholder="Email..." value="<?php echo $email;?>"><span class="error"> <?php echo $emailErr ?> </span>
				</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Date of Birth
				</td>
				<td align="left">
					<input type="Date" name="dob" value="<?php echo $dob ;?>" > <span class="error"> <?php echo $dobErr ?> </span>
				</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Gender
				</td>
				<td align="left">
					<input type="radio" name="gender" value="male"  <?php if ( isset($gender) && $gender == "male" ) echo "checked"; ?> > Male<br>
   				  <input type="radio" name="gender" value="female"  <?php if ( isset($gender) && $gender == "female" ) echo "checked"; ?>> Female<br>
				  <input type="radio" name="gender" value="other"   <?php if ( isset($gender) && $gender == "other" ) echo "checked"; ?> > Other <span class="error"> <?php echo $genderErr ?> </span>
				</td>
				</tr>
				<tr >
				<td align="center" colspan="2">
					<input type="checkbox" name="tnc" value="tnc" <?php if ( isset($_POST["tnc"]) && $_POST["tnc"] == "tnc" ) echo "checked" ; ?>  > I agree to the Terms and Conditions <span class="error"> <?php echo$tncErr; ?> </span>
				</td>
				</tr>
				<tr>
					<td>
					
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
			</a>.
		</p>
    </footer>
</html>


<?php
if (!$all_chekc) // jodi false thake 
{
	/*
	$time = strtotime ($dob);
	if ($time)
	{
		$date = date("d-m-y" , $time) ;
	}
	*/
	if (!empty($name) && !empty($pass) && !empty($uname) && !empty($email) && !empty($dob) && !empty($gender) && !empty($repass) && !empty($tnc) )
	{
		echo" <br/> " ;
echo "name is : " .$uname ;
echo" <br/> " ;
echo "pass is : ".$pass ;
echo" <br/> " ;
echo "re-entered pass is : ".$repass ;
echo" <br/> " ;
echo "email is : ".$email ;
echo" <br/> " ;
echo "dob is : ".$dob ;
echo" <br/> " ;
echo "gender  is : ".$gender ;
echo" <br/> " ;
echo "tnc is : " .$tnc ;
       $sql = "INSERT INTO `user` (`user_id`, `name`,  `password`, `gender`, `email`, `dob`) VALUES ('".$uname."', '".$name."', '".$pass."', '".$gender."', '".$email."', '".$dob."');";
	   $result = mysqli_query($conn , $sql) ; // result set er moddhe rakha holo ;
	   $rowCount = mysqli_num_rows($result);// row returned count kora holo ;
       if ($result)
	   {
		   header ("location:home.php");
	   }
	   else
	   {
		   echo "value was not inserted " ;
	   }


	}
	
}






?>



