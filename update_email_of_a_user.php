<?php

session_start();
require("dbconnection.php");
$name =$_REQUEST["q"];
$user_id = $_SESSION["userName"];
update_user_email ($user_id , $name);


?>