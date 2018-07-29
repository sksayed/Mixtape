<?php
if (isset($_POST['submitp'])) {
	header('Location:Profile.html');
	
}
elseif (isset($_POST['backp']))
{
	header('Location:Add_playlist.php');
}
?>
