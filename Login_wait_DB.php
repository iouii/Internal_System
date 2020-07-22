<?
@session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>
<meta name="keywords" content="business theme, biz, blue, free css template, web design, 2-column" />
<meta name="description" content="Business Theme is a free CSS template from templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.style1 {color: #666}
.style14 {
	color: #0033CC;
	font-size: 13px;
}
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style18 {color: #003399}
.style20 {color: #CC0000}
.style29 {font-size: 14px}
.style31 {
	color: #CC3333;
	font-weight: bold;
	font-size: 13px;
}
.style33 {font-size: 12px}
.style39 {
	color: #CC3333;
	font-size: 13px;
}
.style48 {color: #FFFFFF}
.style50 {
	font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style51 {color: #0066CC}
.style55 {
	font-size: 21px;
	color: #0066CC;
}
body {
	background-image: url(images/templatemo_body.jpg);
}
.style58 {color: #0066CC; font-weight: bold; }
.style59 {font-size: 28px}
.style64 {
	color: #0033CC;
	font-size: 12px;
}
.style68 {color: #666666}
.style69 {font-size: 12px; color: #666666; }
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
.style73 {color: #0066FF}
.style74 {font-size: 11.2px}
.style78 {font-family: Tahoma}
.style85 {font-size: 21px}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style87 {	color: #FF0000;
	font-weight: bold;
	font-size: 12.8px;
}

</style>
<script type="text/javascript">

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

</script>

</head>

<body onload="MM_preloadImages('images/icon/back1_click.png')">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="200" border="0" align="center">
      <tr>
        <td><?php
			  
			  
		$Usr_Account=$_POST[Usr_Account];
		$Usr_Password=$_POST[Usr_Password];
include "connect.php";	


		
 if($Usr_Account=="") 
	{
		echo"<script>alert('Account can not blank!!!');history.back();</script>";
		exit();
	}elseif($Usr_Password==""){
		echo"<script>alert('Password can not blank!!!');history.back();</script>";
		exit();
	}elseif(strlen($Usr_Password) < 6){
		echo "<script>alert('Password  can not less than 6 digit!!!');history.back();</script>";
		exit();
	}
		
	$sqlchk = "select * from Users where Usr_Account = '$Usr_Account' and Usr_Password='$Usr_Password'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num <=0)
	{
		echo"<script>alert('Your Account is none');history.back();</script>";
		exit();
	}	
	 else {
while ($rs = mssql_fetch_array($querychk) ) {
		$Usr_Name=$rs[Usr_Name];
		$Usr_Surname=$rs[Usr_Surname];
		$Usr_IdLogin=$rs[Usr_Id];	
		$Dep_Id=$rs[Dep_Id];	
		
$Url_Id='?Usr_IdLogin=';

$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));
	  ini_set('session.gc_maxlifetime', 600*60);
	  @session_start();
			$_SESSION[ses_userid] = session_id();
			$_SESSION[ses_Usr_Account] = $Usr_Account;
			$_SESSION[Usr_IdLogin] = $Usr_IdLogin;
			$_SESSION[Usr_IdLoginSesCode]=base64_encode(base64_encode($_SESSION[Usr_IdLogin]));
				if($Dep_Id=="19")
				{
			echo "<script>window.location=\"Camera_List.php?Usr_IdLogin=$Usr_IdLoginCode\"</script>";
				exit(); 
				}
			echo "<script>window.location=\"EmployeeList.php\"</script>";
exit(); 
		}
		}	
		
?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="cleaner"></div>    
</div>
    

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
	  <p><span class="style48">Copyright © 2014 OGURA CLUTCH(THAILAND)   CO.,LTD</span>
	</div> 
	</div>
   

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../js/logging.js'></script>
</body>
</html>
