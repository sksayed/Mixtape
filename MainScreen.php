<?php
  session_start() ;
  require ("dbconnection.php");
    $account_name=""; 
   if ($_SESSION["userName"] )
   { //jodi session e kono user name thake 
	   $user = all_values_of_a_user ($_SESSION["userName"] ) ;
	   $account_name= $user["name"];
   }
   else
   {
	   header("location:MainMenu.php");
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
</head>
<body>
<table width=100% height=100%>
			  <tr>
			    <td style="color: #7C3F8D"><h2>Playlist Title</h2></td>
			  </tr>
			  <tr>
			  	<td>
			  		Rate:*****   Comment^
			  	</td>
			  </tr>
			  <tr >
			    <td width=100% height="100%">
			    <ul id="Playlist">
            <?php
               
             ?>
              <li class="current-song" align="left">
                <a class="song1" id="song1"></a>
              </li>
              <li align="left">
                <a class="song2" id="song2"></a>
              </li>
              <li align="left">
                <a class="song3" id="song3"></a>
              </li>
            </ul>
			    </td>
			  </tr>
			</table>
			<script src="https://code.jquery.com/jquery-2.2.0.js"></script>		
			<script>
				audioPlayer();
				function audioPlayer(){
            var currentSong = 0;
            $("a.song1").attr("href", "uploads/Alef-Luna.mp3");
            $("a.song2").attr("href", "uploads/The 1975 - Somebody Else.mp3");
            $("a.song3").attr("href", "uploads/Years & Years - Take Shelter.mp3");
            $("#song1").text($("a.song1"));
            $("#song2").text($("a.song2"));
            $("#song3").text();
            $("#audioPlayer")[0].src = $("#Playlist li a")[0];
            $("#audioPlayer")[0].play();
            $("#Playlist li a").click(function(e){
               e.preventDefault(); 
               $("#audioPlayer")[0].src = this;
               $("#audioPlayer")[0].play();
               $("#Playlist li").removeClass("current-song");
                currentSong = $(this).parent().index();
                $(this).parent().addClass("current-song");
            });
            
            $("#audioPlayer")[0].addEventListener("ended", function(){
               currentSong++;
                if(currentSong == $("#Playlist li a").length)
                    currentSong = 0;
                $("#Playlist li").removeClass("current-song");
                $("#Playlist li:eq("+currentSong+")").addClass("current-song");
                $("#audioPlayer")[0].src = $("#Playlist li a")[currentSong].href;
                $("#audioPlayer")[0].play();
            });
        }
        
			</script>
    	</div>
</body>
</html>