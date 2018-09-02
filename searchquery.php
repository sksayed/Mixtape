<?php
$con=mysqli_connect("localhost","root","","mixtape");
$str="SELECT * from playlist WHERE playlist_name LIKE '%".$_REQUEST["q"]."%' LIMIT 4;";
//"SELECT name from user WHERE name LIKE '".$_REQUEST["q"]."%';"
$res=mysqli_query($con,$str);
$list="Suggestions:<br>";
for ($i=0; $i <mysqli_num_rows($res) ; $i++) {
	$row[$i]=mysqli_fetch_array($res);
	$list.="<a style='text-decoration:none;' href='#search' onclick=\"parent.framechange('Recommended.php','Playlist_viewing.php?serial=".$row[$i]["playlist_id"]."');\">".$row[$i]["playlist_name"]."</a><br>";
}
echo $list===""?"No suggestion":$list;
?>
