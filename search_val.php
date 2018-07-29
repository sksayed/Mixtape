<?php
if (isset($_POST['searchb']))
{
	$var=$_POST['searchf'];
	$varlength=strlen($var);
	if(empty($var))
	{
		echo "Name field is Empty!";
	}
	echo "Name field";
}
else
{
	echo"<h5>Submit Error</h5>";
}
?>