<?php
session_start();
if($_SESSION["userName"])
{
	session_unset();
	session_destroy();
	header("location:MainMenu.php");

}
else
{
	header("location:MainMenu.php");
}
?>