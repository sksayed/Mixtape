       <html>
    <head>
    	<title>
    		Mixtape.com|Home
    	</title>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
    </head> 
    <body align="center" style="background-color:#9A61AB;">
    <div id="main" align="center">
        <div id="mainscreenmm" >
		<table width=100% height=100% align="center">			
			  <tr align="center">
			  <td>
				<h2>Add Playlist</h2>
				</td>
			  </tr>
			  <tr>
			  <td>
			  	<table width=100% height=100% >
			  		<form method="post" action="Playlist_complete.php" enctype="multipart/form-data">
				<tr>
				<td align="right"width=50%>
					Playlist Name
				</td>
				<td align="left">
					<input type="text" name="pname" placeholder="Playlist Name">
				</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Add Songs
				</td>
				<td align="left">
					<input type="file" name="file[]" accept=" .mp3 , audio/* " multiple>
				</td>
				</tr>
				<tr>
					<td>
					</td>
				</tr>
				<tr >
				<td align="right"width=50%>
					Playlist type
				</td>
				<td align="left">
					<input type="radio" name="privacy" value="private" checked> Private<br>
   				  <input type="radio" name="privacy" value="public" > Public<br>
				</td>
				</tr>
				
				</table>
				</td>
				<tr>
				<td align="center"width=100%>
					<input type="submit" name="submit" width=40px >
					</td>
				</tr>
			  </tr>
			  </form>
    	</table>
    </div>
    </body>
</html>