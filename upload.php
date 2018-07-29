
<?php
  
  //require 'db.inc.php' ;
  //echo "here it is <br/>" ;
  @$name = $_FILES["file"]["name"] ;
  @$tmp_name =$_FILES["file"]["tmp_name"] ;
  @$size =$_FILES["file"]["size"] ;
  @$type =$_FILES["file"]["type"] ;
  @$error =$_FILES["file"]["error"];
  
  
  //$file_location = $folder_location . basename($_FILES["file"]["name"]) ;
  //$file_extension = strtolower(pathinfo($name ,PATHINFO_EXTENSION ) ) ;
  $check = 1 ;
  
   $playlist_name = $_POST["pname"] ; 
   @$folder_location = createFolder($playlist_name) ;   
  
  function createFolder ( $playlist_name )
  {
	 if (! is_dir ($playlist_name) )
	 {
		 mkdir($playlist_name) ;
	 }
	 else
	 {
		 die("the playlist name already exist ") ;
	 }
		 return $playlist_name."/" ;
  }
  
  /*
   echo "<pre>";
   print_r ($_FILES) ;
   echo "<br/>" ;   
   
   echo var_dump(count($_FILES["file"]["name"] ));
   
   echo "<br/>" ;
   
   echo "<pre>";
   print_r ($_POST) ;
   
     echo "<br/>" ;
	 
	 echo $_FILES["file"]["name"][0]; 
   
   */
   
   
   
  $count = count($_FILES["file"]["name"] );
   
  $i = 0 ;
  
 do {
	 
	
  
  if (isset($_POST["submit"]) && isset($name) )
  {
	  if (!empty($name) )
	  {
		  //echo "file has been choosen <br/>" ;
		  PrintDetails() ;
		 $file_location = $GLOBALS["folder_location"] . basename($_FILES["file"]["name"][$i]) ;
		  if (file_exists($file_location) )
		  {
			  echo "this file already exist <br/>" ;
			  $check = 0 ;
		  }
		  
		  /*if ($file_extension !== "mp3" || $file_extension != ".wav " )
		  {
			  echo "no appropriate file type <br/>" ;
			  $check=0 ;
		  }
		  */
		  
		  
		  if ($check == 0 )
		  {
			  echo " the file was not uploaded <br/> " ; 
		  }
		  else
		  {
			 if ( move_uploaded_file ($_FILES["file"]["tmp_name"][$i] , $file_location ))
			 {
				 echo "file was uploaded <br/>" ;
			 }
			 else
			 {
				 echo "the file was not uploaded " ;
			 }
			 
		  }
	  }
	  else
	  {
		  echo "no file has been chosen <br/>";
	  }
  }
  
  $i++ ; // i is incremented here 
 }//end of do 
 while ($i < $GLOBALS["count"] ) ;//end of while loop



 
  function PrintDetails ()
  {
	  static $i = 0 ;
	  echo "name of the file is : ".$_FILES["file"]["name"][$i] ;
	  echo "<br/>" ;
	   echo "size of the file is : ".$_FILES["file"]["size"][$i];
	  echo "<br/>" ;
	   echo "type of the file is : ".$_FILES["file"]["type"][$i];
	  echo "<br/>" ;
	   echo "tmp_name of the file is : ".$_FILES["file"]["tmp_name"][$i];
	  echo "<br/>" ;
	  echo " error : ".$_FILES["file"]["error"][$i]."<br/>" ;
	  $file_extension = strtolower(pathinfo($_FILES["file"]["name"][$i] ,PATHINFO_EXTENSION ) );
	  echo "file extension is :". $file_extension."<br/>" ;
	  $i++ ; 
  }
  

?>