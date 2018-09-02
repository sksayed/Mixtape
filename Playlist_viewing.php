<?php
require("dbconnection.php");
$id=$_GET["serial"] ;
$playlist=p($id);
$v=$playlist['hits'];
$v++;
incrementhits($id,$v);
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>

        #Playlist{
            list-style-type: none;
            align-content: left;
        }
		#Playlist li {
            background-color: #eee;
            color: #444;
            padding: 18px;
            width: 90%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 25px;
        }
        #Playlist li a{
        	text-decoration: none;
        }
        #Playlist li a:hover {
            background-color: #ccc; 
        }
        #Playlist .current-song a{
        	color: red;
        }
	</style>
</head>
<body>
	<div style="float: left; width: 70%;">
		<audio src="" controls id="audioPlayer" style="width: 100%; display: block;"></audio>
		
	</div>
	<div style="float: left; width: 30%;">
		<h3 id="songname" style="color: white;"></h3>
	</div>
	<div style="clear: both;">
		<?php
		require("mp3file.class.php");
			
        //require("dbconnection.php");

           $pl_id = $_GET["serial"] ;
           //echo $pl_id ;
           
           $playlist_er_result = all_songs_under_a_playlist ($pl_id) ;
           if (mysqli_num_rows( $playlist_er_result) > 0 )
           {
           	//jodi playlist e gaan thake 
           	   //playlist er name likhte hbe 
           	$playlist = p ($pl_id) ;
           	echo "<h2>".$playlist["playlist_name"]."</h2>";
           	echo "<ul id='Playlist' align='left'>";
           	$s = 1 ;
           	 while ( $q = mysqli_fetch_assoc( $playlist_er_result) ) 
           	 {
           	 	# code...
           	 	  $a= all_values_of_a_song ($q["song_id"]) ;
           	 	        //$path_parts = pathinfo($a[$i]);
			 			$name=$a["song_name"]; // file name 
			 				$mp3file = new MP3File($a["song_path"]);//song path 
			 				$duration2 = $mp3file->getDuration();
			 				$dur=MP3File::formatTime($duration2);
			 			
			 			
			 echo "<li class='current-song'><a id='".$name."' href='".$a["song_path"]."'>".$s.") ".$a["song_name"]." - ".$dur."</a></li>";
			 			
			 			
			 			
			 $s++;				
			 			
           	 }

           }
           else
           {
           	$playlist = p ($pl_id) ;
           	echo "<h2>".$playlist["playlist_name"]."</h2>";
           	 echo "<h1>no song in this play list </h1>" ;
           }









		/*	$sl=0;
			
			foreach(glob('uploads/*', GLOB_ONLYDIR) as $dir) //sob gula directory nise 
			{
				$dirname = basename($dir); //eta dir er name 
				if($_GET['serial']==$sl) //playlist ID
				{
					echo "<h2>".$dirname."</h2>";// eta hobe playlist name 	
					echo "<ul id='Playlist' align='left'>";
					$a=array_slice(scandir($dir),2) ; // er moddhe dir er sob gaan rakha hoise 
					$s="";
					for ($i=0; $i<count($a) ; $i++) 
			 		{   
			 			$path_parts = pathinfo($a[$i]);
			 			$name=$path_parts['basename']; // file name 
			 				$mp3file = new MP3File("uploads/".$dirname."/".$a[$i]);//song path 
			 				$duration2 = $mp3file->getDuration();
			 				$dur=MP3File::formatTime($duration2);
			 			$s=$i+1;
			 			if($i==0)
			 			{
			    			echo "<li class='current-song'><a id='".$name." - ".$dur."' href='uploads/".$dirname."/".$a[$i]."'>".$s.") ".$a[$i]." - ".$dur."</a></li>";
			 			}
			 			else
			 			{
			 				echo "<li><a id='".$name." - ".$dur."' href='uploads/".$dirname."/".$a[$i]."'>".$s.") ".$a[$i]." - ".$dur."</a></li>";
			 			}
			 		}
			 		echo "</ul";
				}
				$sl++;
			}
		?> */
		?>
	</div>
	<script src="js/jquery-3.3.1.js"></script>		
			<script>
				audioPlayer();
				function audioPlayer(){
         
            var currentSong = 0;
            $("#audioPlayer")[0].src = $("#Playlist li a")[0];
            $("#audioPlayer")[0].play();
            document.getElementById('songname').innerHTML=$("#Playlist li a")[currentSong].id;
            $("#Playlist li a").click(function(e){
               e.preventDefault(); 
               $("#audioPlayer")[0].src = this;
               $("#audioPlayer")[0].play();
               $("#Playlist li").removeClass("current-song");
                currentSong = $(this).parent().index();
                $(this).parent().addClass("current-song");
                document.getElementById('songname').innerHTML=$("#Playlist li a")[currentSong].id;
            });
            $("#audioPlayer")[0].addEventListener("ended", function(){
               currentSong++;
                if(currentSong == $("#Playlist li a").length)
                    currentSong = 0;
                $("#Playlist li").removeClass("current-song");
                $("#Playlist li:eq("+currentSong+")").addClass("current-song");
                $("#audioPlayer")[0].src = $("#Playlist li a")[currentSong].href;
                $("#audioPlayer")[0].play();
                document.getElementById('songname').innerHTML=$("#Playlist li a")[currentSong].id;
            });
        }
	</script>
</body>
</html>