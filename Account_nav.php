<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="Mixtape.css">
</head>
<body>
	<script language="javascript" type="application/javascript">
	function framechange(s,m){
	    document.getElementById('sideframe').src = s;
	    document.getElementById('mainframe').src = m;
	}
	</script>
<table width=100% height=100%>
			 <tr>
                <td rowspan="2"><a href="#Profile" onclick="framechange('Side_nav.php','Profile.php');"><img src="asset/Pictures/profile.png" alt="profile" height=50% width=100%></a></td>
                <td style="color: white;"><a href="#Profile" onclick="framechange('Side_nav.php','Profile.php');"><?php echo $account_name; ?></a></td>
              </tr>
              <tr>
                <td style="color: white;"><a href="logout.php">Log Out</a></td>
              </tr>
			</table>
</body>
</html>