<!DOCTYPE html>
<html>
<head>
	<title></title>
<script>
	var str=<?php $_GET['input']; ?>;
if(str.length==0 || str == "")
		{
			document.getElementById("sug").innerHTML="";

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
					//document.getElementById("here").innerHTML=this.responseText;
				}
			};
			xHttp.open("GET","searchquery.php?q="+str,true);
			xHttp.send();
		} 
</script>
</head>
<body>
	<div id="sug" align="center"></div>
</body>
</html>