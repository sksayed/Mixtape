
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Mixtape.css">
	<script language="javascript" type="application/javascript">
	function framechange(s,m){
	    document.getElementById('sideframe').src = s;
	    document.getElementById('mainframe').src = m;
	}
	function getData(str)
	{
		if(str.length==0)
		{
			document.getElementById("sug").style.display="none";
		}
		else
		{
			var xHttp=new XMLHttpRequest();
			xHttp.onreadystatechange=function() {
				if(this.readyState==4 && this.status==200)
				{
					document.getElementById("sug").innerHTML=this.responseText;
					document.getElementById("sug").style.display="block";
				}
			};
			xHttp.open("GET","searchquery.php?q="+str,true);
			xHttp.send();
		}
	}

	</script>
</head>
<body>
	<div>
	<nav>
		<ul id=navibar1>
			<li><a href="#Collections_menu"  onclick="framechange('Recommended.php','Collections_menu.php');"><h2>Collections</h2></a></li>
			<li><a href="#Trending_menu"  onclick="framechange('Recommended.php','Trending_menu.php');"><h2>Trending</h2></a></li>
		</ul>
	</nav>
	</div>
	<div align="right" style="padding: 50px 0px 0px 0px">
		<img src="asset/Pictures/search.png" alt="search" height=10% width=5%>
		<input id="search" type="text" height="100%" width="100%" placeholder="Search Playlists.." onkeyup="getData(this.value)">
		<div id="sug" style="background-color:white;color:black;width:170px"></div>
	</div>
</body>
</html>
