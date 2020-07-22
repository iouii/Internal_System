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
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                </tr>
              </table>
          </div>
      </div>
        
   <div class="content_box last">
<div class="col_w380">
  <form id="form1" name="form1" method="post"  action="" >
<table width="589" border="0" cellpadding="1">
                        <tr>
                          <td align="left"><img src="images/sidebar_box_icon.png" alt="" width="5" height="18" /> <span class="style55"> Rights</span><span class="style51">:</span></td>
                          <td align="center">&nbsp;</td>
                          <td rowspan="4" align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" align="center" background="images/Menu list/blue_bg.jpg"><span class="style48 style33"><strong>User Rights</strong></span></td>
</tr>
                        <tr>
                          <td width="213" align="center" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><label>
                          <div align="right">
                            <select name="select" id="select" >
                              <option value="Account">Account</option>
                              <option value="Name">Name</option>
                              <option value="Department">Department</option>
                              <option value="Position">Position</option>
                              </select>
                          </div>
                          </label></td>
                        <td align="left" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0"><label>
                            <input name="key_word" type="text" id="key_word" />
                          </label></td>
                          <td width="209" align="left" valign="middle" bordercolor="#336699" bgcolor="#E0E0E0">&nbsp; </td>
                        </tr>
                        <tr>
                          <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
<td width="153" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><label>
                            <input type="submit" name="button" id="button" value="Search" />
                            <input type="reset" name="button2" id="button2" value="Clear" />
</label></td>
                          <td align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
                        </tr>
          </table>
        </p>
      </form>
        <label></label>
     <form id="form2" name="form2" method="post" action="UserFriAdd_DB.php" >
        <table width="584" border="0" align="center" name="details">
          <tr bgcolor="#FFFF00">
            <td width="20" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>No.</strong></span></div></td>
            <td width="133" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>Account</strong></span></div></td>
            <td width="145" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style48"><strong>Name</strong></div></td>
            <td width="96" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>Department</strong></span></div></td>
            <td width="97" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>Position</strong></span></div></td>
            <td width="67" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center"><strong>Rights</strong></div></td>
          </tr>
          <p>&nbsp; </p>
          <p>
            <? 	$no=1;

			include "connect.php";

		 	/*$sqlchk = "select * from (((Employee E LEFT join GroupEmployee GE on E.Emp_Id = GE.Emp_Id)" ;
			$sqlchk .= "LEFT join Groups G on G.Grp_Id = GE.Grp_Id)" ;
			$sqlchk .= "inner join Department D on E.Dep_Id = D.Dep_Id)" ;
			$sqlchk .= "inner join Position P on E.Pos_Id = P.Pos_Id" ;
			*/
			
			$sqlchk = "select * from (Users U INNER JOIN Department D " ;
			$sqlchk .= "ON U.Dep_Id = D.Dep_Id) " ;
			$sqlchk .= "INNER JOIN Position P " ;
			$sqlchk .= "ON U.Pos_Id = P.Pos_Id " ;

				  
			
			//echo "$select";
			if ($_POST['key_word']and($select==Name) )
			{$sqlchk.=" where U.Usr_Name like '%$key_word%'";
			
			
			}elseif($_POST['key_word']and($select==Account) )
			{$sqlchk.=" where U.Usr_Account like '%$key_word%'";
			
			
			
			}elseif($_POST['key_word']and($select==Department) )
			{$sqlchk.=" where D.Dep_Name like '%$key_word%'";
			
			
			}elseif($_POST['key_word']and($select==Position))
			{$sqlchk.=" where P.Pos_Name like '%$key_word%'";

			}  
			//-------------------------------------------------------------------------------------
			
		$sqlchk.=" ORDER BY D.Dep_Name ASC, P.Pos_Name ASC, U.Usr_Account ASC ; " ;
		
		$querysh = mssql_query($sqlchk);

			while($rs=mssql_fetch_array($querysh))
			{

		$Usr_Id=$rs[Usr_Id];
		$Usr_Account=$rs[Usr_Account];
		$Usr_Password=$rs[Usr_Password];
		$Usr_Name=$rs[Usr_Name];
		$Usr_Surname=$rs[Usr_Surname];
		$Dep_Id=$rs[Dep_Id];
		$Pos_Id=$rs[Pos_Id];
		$Dep_Name=$rs[Dep_Name]; 
		$Pos_Name=$rs[Pos_Name];
		
//--------------------------------------------------------------------------------

//------------------------------Encode---------------------------------------------------------			
			 $Usr_IdEditCode=base64_encode(base64_encode("$Usr_Id"));
			 $Usr_IdDelCode=base64_encode(base64_encode("$Usr_Id"));

//----------------------------------------------------------------------------------------			


			
				$iLoop++;
    $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;

		echo"<tr bgcolor=$bgcolor>";
		echo"<TD><div align='center' class='style29'>$no</div></TD>";
		echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;<A HREF=\"UserRightsShowAll.php?Usr_IdLogin=$Usr_IdLoginCode&Usr_Id=$Usr_IdEditCode\">$Usr_Account</a></div></TD>";
		echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Usr_Name</div></TD>";
		echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Dep_Name</div></td>";
		echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Pos_Name</div></td>";
		echo"<TD><div align='center' class='style29'><A HREF=\"UserRightsEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Usr_Id=$Usr_IdDelCode\">
		<IMG SRC=images/icon/login.png WIDTH=35 HEIGHT=35 BORDER=0 ALT=Edit></a></div></td>";
		echo"</tr>";
				$no++;

	}  
		?>
          </p>
        </table>
     </form>
      </div>
<div class="cleaner"></div>
      </div>
  </div>
    <p>&nbsp;</p>
  <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
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
