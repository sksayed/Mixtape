 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
     <link rel="stylesheet" type="text/css" href="Mixtape.css">
 </head>
 <body>
    <div style="color: white;">
        <h2>
            PROFILE
        </h2>
    </div>
 <ul id="navibar1">
    <li>
        <a href="#Add_playlist" onclick="parent.framechange('Side_nav.php','create_playlist.php');">Add Playlist</a> 
    </li>
    <li>  
        <a href="#Account_info" onclick="parent.framechange('Side_nav.php','Account_info.php');">Account Info</a>
        </li>
    <li>
        <a href="#Settings" onclick="parent.framechange('Side_nav.php','Settings.php');">Settings</a>
        </li>
    <?php
        session_start();
        require("dbconnection.php");
       $user = all_values_of_a_user ($_SESSION["user_id"] ) ;
       $account_type= $user["type"];
        if($account_type=='admin')
            {echo "<li>
        <a href='#Add_Songs' onclick=\"parent.framechange('Side_nav.php','uploadsong.php');\">Add Songs</a>
        </li>";}
?>
</ul>
 </body>
 </html>
 