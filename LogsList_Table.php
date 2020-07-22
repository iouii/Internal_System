<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <title>Ogura Clutch Thailand</title>
</head>
<style type="text/css">
<!--

.style29 {font-size: 14px}

.style48 {color: #FFFFFF}
a:link {
	text-decoration: none;
	color: #2d7ad1;
}
a:visited {
	text-decoration: none;
	color: #2d7ad1;
}
a:hover {
	text-decoration: none;
	color: #CC0000;
}
a:active {
	text-decoration: none;
}
.style79 {
	color: #FFFFFF;
	font-family: Tahoma;
	font-weight: bold;
	font-size: 12.8px;
}
.style80 {font-family: Tahoma; font-size: 12.8px; }



</style>

<body>
	

<table  border="0" align="center" name="details">
  <tr>
    <td  align="center" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><span class="style79">No.</span></td>
    <td  align="center" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><span class="style79">Type</span></td>
    <td  align="center" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><span class="style79">Detail</span></td>
    <td  align="center" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><span class="style79">Action</span></td>
    <td  align="center" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><span class="style79">Date</span></td>
    <td  align="center" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><span class="style79">By</span></td>
  </tr>
  <p>&nbsp; </p>
  <p>
    <?	
	
	 	$no=1;

			include "connect.php";
			
			
			@session_start();
			$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
			$sqlchk = "SELECT * FROM Logs ";
			$datefrom = $datefrom." "."00:00:00.000" ;
			$dateto = $dateto." "."23:59:59.000";
			
//---------------------Search_New---------------------------------------------------------------------------------
			if($_POST['key_Type'] or $_POST['key_Detail'] or $_POST['key_log_Action'] or $_POST['key_log_By'] or $_POST['datefrom'] or $_POST['dateto'])
			{
			$sqlchk .=" where log_Type like '%$key_Type%' and log_Detail like '%$key_Detail%' and log_Action like '%$key_log_Action%'and log_By like '%$key_log_By%' and log_Date BETWEEN '$datefrom' and '$dateto'";
			
			}
//--------------------------------------------------------------------------------------------			
			$sqlchk.=" ORDER BY log_Date DESC ; " ;
			
			$querysh = mssql_query($sqlchk);
			
//--------------Search No Data Show--------------------------------------------------
			if(mssql_num_rows($querysh) <1){
				
			echo"<tr bgcolor=$bgcolor>";	
			echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
					<br>No Logs Data</div></TD>";
			echo"</tr>";			
			}else          
//---------------------------------------------------------------------------------

			while($rs=mssql_fetch_array($querysh))
			{

			$log_Id=$rs[log_Id];
			$log_Type=$rs[log_Type];
			$log_Detail=$rs[log_Detail];
			$log_Action=$rs[log_Action];
			$log_Date=$rs[log_Date];
			$log_By=$rs[log_By];
//------------------encode Log_Id----------------------------------------------------------------		
		
   			$log_IdDelCode=base64_encode(base64_encode("$log_Id"));
//----------------------DateTime Format----------------------------------------------------------

			$log_DateNewformat = date_create($log_Date);
			$log_DateNewformat = date_format($log_DateNewformat,'Y-M-d H:i:s');
				$iLoop++;
			
			$bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;


			echo"<tr bgcolor=$bgcolor>";
			echo"<TD height=30><div align='center' class='style29'>$no</div></TD>";
			echo"<TD><div align='left' class='style29'>&nbsp;&nbsp;$log_Type</div></TD>";
			echo"<TD><div align='left' class='style29'>$log_Detail</div></TD>";
			echo"<TD><div align='center' class='style29'>$log_Action</div></td>";
			echo"<TD><div align='center' class='style29'>$log_DateNewformat</div></td>";
			echo"<TD><div align='center' class='style29'>&nbsp;&nbsp;$log_By</div></td>";
			echo"</tr>";
				$no++;

	} 
						   
		?>
  </p>
  <!-- log_Type ASC,-->
</table>
</body>