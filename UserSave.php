

 <?
 
 	include "chksession.php";
	include "connect.php";
	
	$Usr_IdLogin=$_POST["Usr_IdLogin"];	
	$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));	
 
 
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
.style79 {color: #999999}
.style80 {color: #F0F0F0; }
.style82 {font-size: 12px; font-weight: bold; }
.style84 {
	font-size: 18px;
	color: #FF0000;
}
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
-->
</style>
</head>
<body>

<div id="templatemo_wrapper">

    <div id="templatemo_sidebar">
    
		<div id="site_title">
            <h1 align="center" class="style1"><img src="images/icon/oct.png" alt="OGURA CLUTCH(THAILAND)CO.,LTD." width="100%" align="top" /><span class="style50">OGURA CLUTCH(THAILAND)CO.,LTD.</span></h1>
      </div> <!-- end of site_title -->
      <div class="sidebar_box">
        	<h3 class="style18">Menu List</h3>
        	<div class="sidebar_content">
				<ul id="news_box">
				 <? include ('Menu.php') ?>
              </ul>
        </div>
      </div>   
        
        <div class="service_four">
       	  <h6 class="style20"><span class="style39"><? include ('Update.html') ?><hr size="1" class="style73"></td>
  </tr><p>&nbsp;</p>
       	  <div class="sidebar_content"></div>
      </div>
  </div>
    
    <div id="templatemo_content">
    	
        <div id="templatemo_menu">
			<ul>
                 <? include ('Head_Menu.html') ?>
            </ul>    	
	        <div class="cleaner"></div>
        </div> <!-- end of templatemo_menu -->
        
        <div class="content_box">
          <div class="content_box_inner">
              <table width="585" border="0">
                <tr>
                  <td><? 
//-----------------------------------------------Login Show Button-------------------------------------------------------				  
					include "ButtonMenuAdmin.php";
				
 									 ?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td></td>
                </tr>
              </table>
          </div>
      </div>
        
   <div class="content_box last">
           <div class="col_w380">
             <div class="cleaner">
                      <form action="UserSave_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
                 <table width="585" border="0" align="center" cellpadding="1">
                   <tr>
                     <td align="left"><img src="images/sidebar_box_icon.png" alt="" width="5" height="18" /> <span class="style55">Add User:</span></td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                     <td colspan="2" rowspan="4" align="center"><table width="62" align="right">
                       <tr>
                         <td>
                         	<a href='UserAll.php?Usr_IdLogin=<? echo"$Usr_IdLoginCode"; ?>'><img border='0' src='images/icon/back1.png' onmouseover="this.src='images/icon/back1_b.png'" onmouseout="this.src='images/icon/back1.png'"    width='56' height='56'/>
                         </td>
                       </tr>
                       <tr>
                         <td><div align="center" class="style87">BACK</div></td>
                       </tr>
                     </table></td>
                   </tr>
                   <tr>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                   </tr>
                   <tr>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                   </tr>
                   <tr>
                     <td align="center"><input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" /></td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                     <td align="center">&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="6" align="center" background="images/Menu list/blue_bg.jpg"><span class="style48 style33"><strong>Add User</strong></span></td>
                   </tr>
                   <tr>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><div align="left"><span class="style33"><strong>Account</strong>:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><label>
                       <input name="Usr_Account" type="text" id="Usr_Account" size="15" maxlength="15" />
                     <span class="style84">*</span></label></td>
                   </tr>
                   <tr>
                     <td width="142" align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                     <td width="142" align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><div align="left"><span class="style82">Password</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><label>
                       <input name="Usr_Password" type="password" id="Usr_Password" size="10" maxlength="10" />
                       <span class="style84">*</span></label></td>
                   </tr>
                   <tr>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><div align="left"><span class="style82">Name</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><input name="Usr_Name" type="text" id="Usr_Name" size="40" maxlength="40" /></td>
                   </tr>
                   <tr>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><div align="left"><span class="style82">Sure Name</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><input name="Usr_Surname" type="text" id="Usr_Surname" size="40" maxlength="40" /></td>
                   </tr>
                   <tr bgcolor="#E0E0E0">
                     <td align="center" valign="middle" bordercolor="#336699">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699"><div align="left"><span class="style82">Department</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699"><label>
                       <?
							
						include"connect.php"; 
							$dbquery1=mssql_query("SELECT Dep_Id, Dep_Name FROM Department"); 
			         ?>
                <select name="Dep_Id" id="Dep_Id" >
                <option value="">&lt;Please select&gt;</option>
                <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
                <option value="<? echo $rs1['Dep_Id'];?>"> <? echo $rs1['Dep_Name'];?></option>
                <? }?>
                       </select>
                     <span class="style84">*</span></label></td>
                   </tr>
                   <tr bgcolor="#FFFFFF">
                     <td align="center" valign="middle" bordercolor="#336699">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699"><div align="left"><span class="style82">Position</span><span class="style33">:</span></div></td>
                     <td colspan="4" align="left" valign="middle" bordercolor="#336699"><label><?
							
						include"connect.php"; 
							$dbquery1=mssql_query("SELECT Pos_Id, Pos_Name FROM Position"); 
			         ?>
                       <select name="Pos_Id" id="Pos_Id" >
                         <option value="">&lt;Please select&gt;</option>
                         <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
                         <option value="<? echo $rs1['Pos_Id'];?>"> <? echo $rs1['Pos_Name'];?></option>
                         <? }?>
                       </select>
                       <span class="style84">*</span></label></td>
                   </tr>
                   <tr>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                     <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                     <td width="14" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><label></label></td>
                     <td width="158" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="Save" />
                     <input type="reset" name="button2" id="button2" value="Clear" /></td>
                     <td width="149" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                     <td width="3" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                   </tr>
                 </table>
               </form>
               <p>&nbsp;</p>
             </div>
       	   </div>
           <div class="cleaner"></div>
      </div>
  </div>
  <p>&nbsp;</p>
  <div class="cleaner"></div>    
</div>
    
    


<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
	  <p><span class="style48">Copyright  2014 OGURA CLUTCH(THAILAND)   CO.,LTD</span>
	</div> 
	<!-- end of templatemo_footer --></div>
   

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../js/logging.js'></script>
</body>
</html>
