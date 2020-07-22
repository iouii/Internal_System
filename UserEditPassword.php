<?php
//mysql_query('SET CHARACTER SET utf8');

	//include "chksession.php";
	include "connect.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>
<meta name="keywords" content="business theme, biz, blue, free css template, web design, 2-column" />
<meta name="description" content="Business Theme is a free CSS template from templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">


function clearText(field)
{
	if (field.defaultValue == field.value) field.value = '';
	else if (field.value == '') field.value = field.defaultValue;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>                
<style type="text/css">
<!--
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
.style82 {font-size: 12px; font-weight: bold; }
.style84 {
	font-size: 18px;
	color: #FF0000;
}
.style85 {
	font-family: Tahoma;
	font-size: 14px;
	color: #000000;
}

a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style87 {
	color: #FF0000;
	font-weight: bold;
	font-size: 12.8px;
}

-->





</style>
</head>
<body>
<div id="test">
                      <form action="UserEditPassword_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
                 <table  width="585" border="0" align="center" cellpadding="1">
                   <tr>
                     <td colspan="6" align="center" background="images/Menu list/blue_bg.jpg"><span class="style48 style33"><strong>Change Password</strong></span></td>
                   </tr>
                   <tr>
                     <td width="142" align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0">&nbsp;</td>
                     <td width="142" align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><div align="left"><span class="style33"><strong>Account</strong>:</span></div></td>
                     <td width="189" colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><input name="Usr_Account" type="text" id="Usr_Account" value="" size="15" maxlength="15" /></td>
                   </tr>
                   <tr>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><div align="left"><span class="style82">Old Password</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><input name="Usr_Password" type="password" id="Usr_Password" value="" size="15" maxlength="15" /></td>
                   </tr>
                   <tr>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><div align="left"><span class="style82">New Password</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><input name="New_Usr_Password" type="password" id="New_Usr_Password"  value="" size="15" maxlength="15" />
                     <span class="style84"><span class="style85"> </span></span></td>
                   </tr>
                   <tr>
                     <td align="center" valign="middle" bordercolor="#336699">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699"><div align="left"><span class="style82">Confirm Password</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699"><input name="Con_New_Usr_Password" type="password" id="Con_New_Usr_Password"  value="" size="15" maxlength="15" />
                     <span class="style84"><span class="style85"> </span></span></td>
                   </tr>
                   <tr>
                     <td colspan="6" align="center" valign="middle" bordercolor="#336699" bgcolor="#015EAC"><label></label>                       <input type="submit" name="button" id="button" value="Change Password" /></td>
                   </tr>
                 </table>
          </form>
          </div>
</body>
</html>
