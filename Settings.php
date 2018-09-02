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
<html>
    <head>
    	<title>
    		Mixtape.com|Settings
    	</title>
        <script type="text/javascript">
             function wordCount (str)
             {
                return str.split(' ').length;
             }


            function submitname() {
                // body...
                var str =document.getElementById("editname").value ;

                if (str.length == 0)
                {
                    document.getElementById("nameErr").innerHTML="Name field is empty";

                }
                else if ( wordCount(str) < 2  ) {

                    document.getElementById("nameErr").innerHTML="Name field has less than 2 words";

                }


                else
                {
                    var xHttp=new XMLHttpRequest();
            xHttp.onreadystatechange=function() {
                if(this.readyState==4 && this.status==200)
                {
                    //document.getElementById("nameErr").innerHTML=this.responseText;
                    //document.getElementById("sug").style.display="block";
                    //document.getElementById("here").innerHTML=this.responseText;
                    location.href="Settings.php";
                }
            };
            xHttp.open("GET","edit_name_of_a_user.php?q="+str,true);
            xHttp.send();
                }
            }

            function submituid( )
            {
                var str =document.getElementById("edituid").value ;

                if (str.length == 0)
                {
                    document.getElementById("user_idErr").innerHTML=" field is empty";

                }
                else if ( str.length < 8  ) {

                    document.getElementById("user_idErr").innerHTML="Name field has less than 8 characters";

                }


                else
                {
                    var xHttp=new XMLHttpRequest();
            xHttp.onreadystatechange=function() {
                if(this.readyState==4 && this.status==200)
                {
                    document.getElementById("nameErr").innerHTML=this.responseText;
                    //document.getElementById("sug").style.display="block";
                    //document.getElementById("here").innerHTML=this.responseText;
                    location.href="Settings.php";
                }
            };
            xHttp.open("GET","edit_uid_of_a_user.php?q="+str,true);
            xHttp.send();
                }


            }
            function checkEmail( str) {


             var x= str ;
             //alert(str);  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 ){  
 // alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return true;  
  } 
  else
  {
    return  false ;
  } 
    
                     }


                     function validateEmail(email){  
              //alert(email);
    var reg = /^([A-Za-z0-9_-.])+@([A-Za-z0-9_-.])+.([A-Za-z]{2,4})$/;
      if (reg.test(email)) {   
       //document.getElementById("errorDiv").innerHTML = "This email is valid.";
      return true ;
      }else{  
       //document.getElementById("errorDiv").innerHTML = "This email is not valid.";
       return false ;
      }  
    }  

  

                       function submitemail()
                       {
                             
                            var str =document.getElementById("editemail").value ;

                if (str.length == 0)
                {
                    document.getElementById("emailErr").innerHTML=" field is empty";

                }
                 else if( !validateEmail(str)  ) {

                    document.getElementById("emailErr").innerHTML="email is invalid ";

                }


                else
                {
                    var xHttp=new XMLHttpRequest();
            xHttp.onreadystatechange=function() {
                if(this.readyState==4 && this.status==200)
                {
                    document.getElementById("emailErr").innerHTML=this.responseText;
                    //document.getElementById("sug").style.display="block";
                    //document.getElementById("here").innerHTML=this.responseText;
                    location.href="Settings.php";
                }
            };
            xHttp.open("GET","edit_email_of_a_user.php?q="+str,true);
            xHttp.send();
                }





                       }   



        </script>
        <link rel="stylesheet" type="text/css" href="Mixtape.css">
    </head> 
    <body align="center" style="background-color:#9A61AB;">
    <div id="main" align=center>
        	<table width=100% height=100%>
			  <tr>
			    <td style="color: white"><h2>Change Account Settings</h2></td>
			  </tr>
			  <tr height="80%">
			    <td>
                    <table>
                        
                        <tr>
                            <td>
                                <h3>Name</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["name"]; ?></h4>
                            </td>
                            <td>
                                <input type="text" id="editname">
                            </td>
                            <td>
                                <button id="submitname" onclick="submitname()"> edit  </button>
                                
                            </td>
                            <td>
                                <span id="nameErr"></span>
                            </td>
                        </tr>

                        <!--<tr>
                            <td>
                                <h3>User ID</h3>
                            </td>
                            <td>
                               
                            </td>
                            <td>
                                <input type="text" id="edituid">
                            </td>
                            <td>
                                <button id="submituid" onclick="submituid()" > edit  </button>
                               
                            </td>
                            <td>
                                <span id="user_idErr"></span>
                            </td>
                        </tr>
                    -->
                        <tr>
                            <td>
                                <h3>Email</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["email"]; ?></h4>
                            </td><td>
                                <input type="text" id="editemail">
                            </td>
                            <td>
                                <button id="submitemail" onclick="submitemail()"> edit  </button>
                                
                            </td>
                            <td>
                                <span id="emailErr"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Date Of Birth</h3>
                            </td>
                            <td>
                                <h4><?php $name = all_values_of_a_user($_SESSION["userName"]); echo $name["dob"]; ?></h4>
                            </td>
                            <td>
                                <input type="text" id="editdob">
                            </td>
                            <td>
                                <button id="submitdob"> edit  </button>
                            </td>
                            <td>
                                <span id="dobErr"></span>
                            </td>
                        </tr>
                        
                    </table>
                </td>
			  </tr>
			</table>
    	</div>
    </div>
    </body>
</html>