<?php
require("dbconnection.php");
$id=$_GET['p'];
$playlist=p($id);
$v=$playlist['hits'];
$v++;
incrementhits($id,$v);
  ?>