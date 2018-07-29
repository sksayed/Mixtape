<?php
$con=mysqli_connect("localhost","root","12345","mixtape");
$str="SELECT name from user WHERE name LIKE '".$_REQUEST["q"]."%';";
$res=mysqli_query($con,$str);
$list="";
for ($i=0; $i <mysqli_num_rows($res) ; $i++) {
	$row[$i]=mysqli_fetch_array($res);
	$list.=$row[$i]["name"]."<br>";
}
echo $list===""?"No suggestion":$list;
?>
