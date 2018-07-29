<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.pl {
            background-color: #eee;
            color: #444;
            padding: 18px;
            width: 90%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 25px;
        }
        .pl a{
            text-decoration: none;
        }
        .pl:hover {
            background-color: #ccc; 
        }
        .plst{
            list-style-type: none;
            align-content: left;
        }
	</style>
</head>
<body>
	<?php 
	$sl=0;
    $s="";
	echo "<ul class='plst' align='left'>";
	foreach(glob('uploads/*', GLOB_ONLYDIR) as $dir) {
	$dirname = basename($dir);
    $s=$sl+1;
	echo "<li class='pl' align='left'>".$s.") <a href='Playlist_viewing.php?serial=".$sl."' target='_parent'>".$dirname."</a></li>";
	$sl++;
	}
	echo "</ul>";
?>
</body>
</html>
