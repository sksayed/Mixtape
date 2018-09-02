					<html>
					<head>
						<link rel="stylesheet" type="text/css" href="Mixtape.css">
					</head>
					<body>
						<div style="color: white">
							<h2>Recommended</h2>
						</div>
					<table align="center" style="width:100%;height:100% ">
						<?php
						require("dbconnection.php");
						$playlist=allplaylist();
			            if (mysqli_num_rows($playlist) > 0) {
			            echo "<ul class='plst' align='left'>";
			            $sl = 1 ;
			            while ($row = mysqli_fetch_assoc( $playlist) )
        			  {
						echo 
					"<tr align='center' height=2%>
					    <td rowspan='3'><img href='Playlist_viewing.php?serial=".$row['playlist_id']."'src='asset/Pictures/album1.jpg' alt='".$row['playlist_name']."' height=100% width=100%></td>
					    <td rowspan='2'><a style='text-decoration:none;color:white;' href='Playlist_viewing.php?serial=".$row['playlist_id']."'><h3>".$row['playlist_name']."</h3></a></td>
				    <td><img src='asset/Pictures/Rec_options.png' alt='Options' height=50% width=50%></td>
				    </tr>
					<tr align='center' height=2%>
					    <td><img src='asset/Pictures/Rec_fav.png' alt='Favourite' height=50% width=50%></td>
					</tr>
					<tr align='center' height=2%>
					    <td>".$row['user_id']."</td>
					    <td><img src='asset/Pictures/Rec_nil.png' alt='Put Song Next In-line' height=50% width=50%></td>
					</tr>";
					$sl++ ;
						}
					}
				?>
				</table>
			</body>
			</html>