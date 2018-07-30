<?php
if (isset($_POST["submitb"]) && $_SERVER["REQUEST_METHOD"] == "POST")
{
$target_dir = "uploads/";//here the directory is already created manually
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//base name provides filename with extension 
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); ///strlower(substr($name , strpos($name , ".")+1));
// Check if image file is a actual image or fake image
/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 4000000000) {
    echo "Sorry, your file is more than 4 mb .";
    $uploadOk = 0;
}
// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
  require ("dbconnection.php");
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && insert_a_song( basename( $_FILES["fileToUpload"]["name"]),$target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br/>";
       // echo "<img src=\"".$target_file."\" width =200  height =200 >" ;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body align="center">
	
	<h1> click here to upload songs </h1>
	<form method="POST" action=" <?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
	<input type="file" name="fileToUpload" accept=" .mp3 , audio/* ">
	<br/>
	<input type="submit" name="submitb" value="click">
		
	</form>


</body>
</html>