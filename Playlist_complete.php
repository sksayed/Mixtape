<!DOCTYPE html>
<html>
<head>
	<title>Mixtape|Playlist Upload Complete</title>
	 <link rel="stylesheet" type="text/css" href="Mixtape.css">
</head> 
    <body align="center" style="background-color:#9A61AB;">
    <div id="main" align="center">
        <div id="mainscreenmm" >
       		
		<table width=100% height=100% align="center">
			  <tr align="center">
			  <td>
				<img src="asset/Pictures/Mixtapelogo.png" alt="Home" height=50% width=50%>
				</td>
			  </tr>
			  <tr>
			  <td>
			  	<h2>Confirm Playlist:</h2><?php echo "<h3>".$_POST["pname"]."</h3>";?>
			  	<table width=100% height=100% >
					<tr>
						<td>
							<?php
							  @$name = $_FILES["file"]["name"] ;
							  @$tmp_name =$_FILES["file"]["tmp_name"] ;
							  @$size =$_FILES["file"]["size"] ;
							  @$type =$_FILES["file"]["type"] ;
							  @$error =$_FILES["file"]["error"];
							   $check = 1 ;
  
							   $playlist_name = $_POST["pname"] ; 
							   @$folder_location = createFolder($playlist_name) ;
							   function createFolder ( $playlist_name )
								  {
									 if (! is_dir ($playlist_name) )
									 {
										 mkdir("uploads/".$playlist_name) ;
									 }
									 else
									 {
										 die("the playlist name already exist ") ;
									 }
										 return "uploads/".$playlist_name."/" ;
								  }
							  $exist=0;
							  $up=0;
							  $count = count($_FILES["file"]["name"] );
							  $i = 0 ;
							  echo "<br>".$_POST["privacy"];
							  do{  
							  if (isset($_POST["submit"]) && isset($name) )
							  {
								  if (!empty($name) )
								  {
									 PrintDetails() ;
									 $file_location = $GLOBALS["folder_location"] . basename($_FILES["file"]["name"][$i]) ;
									  if (file_exists($file_location) )
									  {
										  $exist=1;
										  $check = 0 ;
									  }
									if ($check == 0 )
									  {
										  $up=0 ; 
									  }
									  else
									  {
										 if ( move_uploaded_file ($_FILES["file"]["tmp_name"][$i] , $file_location ))
										 {
											 $up=1 ;
										 }
										 else
										 {
											 $up=0;
										 }
										 
									  }
								  }
								  else
								  {
									  echo "no file has been chosen <br/>";
								  }
							  }
							  
							  $i++ ; 
							 } 
							 while ($i < $GLOBALS["count"] ) ;
							  function PrintDetails ()
							  {
								  static $i = 0 ;
								  echo "<table id=navibar1><tr><td><h3>".$i.") Name: </h3></td><br/><td>".$_FILES["file"]["name"][$i]."</td></tr></table>" ;
								  $i++ ; 
							  }
							?>
						</td>
					</tr>
				</table>
				</td>
				<tr>
				<td align="center"width=100%>
					<form method="POST" action="">
					<input type="submit" name="submitp" width=40px value="Agree" >
					<input type="submit" name="backp" width=40px value="Back">
										<?php
					if (isset($_POST['submitp'])) {
						header('Location:Profile.php');
						
					}
					elseif (isset($_POST['backp']))
					{
						header('Location:Add_playlist.php');
					}
					?>
					</form>
					</td>
				</tr>
			  </tr>
    	</table>
    	
    </div>
    </body>
</html>
