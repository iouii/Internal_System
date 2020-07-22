<script language="JavaScript">
 
 
 function toggle(it) {
  if ((it.style.backgroundColor == "none") || (it.style.backgroundColor == ""))
    {it.style.backgroundColor = "#D6EBFF";}
  else
    {it.style.backgroundColor = "";}
}
 
</script>



<style type="text/css">
<!--
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

.style81 {font-family: Tahoma; font-size: 12px; }

-->
</style>
     
	 
<table width="2000" border="0" align="center" name="details">
  <tr bgcolor="#FFFF00">
    <td width="44" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>No.</strong></span></div></td>
    <td width="137" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>Serial Code </strong></span></div></td>
    <td width="162" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style79">Serial Number</div></td>
    <td width="194" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>Software</strong></span></div></td>
    <td width="145" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>Version</strong></span></div></td>
    <td width="94" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Receive Date </strong></div></td>
    <td width="93" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Expire Date </strong></div></td>
    <td width="220" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Detail1 </strong></div></td>
    <td width="220" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Detail2 </strong></div></td>
    <td width="220" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Detail3</strong></div></td>
    <td width="297" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Note </strong></div></td>
    <td width="60" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Edit </strong></div></td>
    <td width="60" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Delete</strong></div></td>
  </tr>
  <p>&nbsp; </p>
  <p>
    <?	
	
	 	$no=1;

			include "connect.php";
			
			
			@session_start();
			$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
			
		$Sof_Id=$rs[Sof_Id];
		$Sof_SerialCode=$rs[Sof_SerialCode];
		$Sof_SerialNo=$rs[Sof_SerialNo];
		$Sof_Name=$rs[Sof_Name];
		$Sof_Version=$rs[Sof_Version];
		$Sof_ReceiveDate=$rs[Sof_ReceiveDate];
		$Sof_ExpireDate=$rs[Sof_ExpireDate];
		$Sof_Desc1=$rs[Sof_Desc1];
		$Sof_Desc2=$rs[Sof_Desc2];
		$Sof_Desc3=$rs[Sof_Desc3];
		$Sof_Note=$rs[Sof_Note];
					

			
			
			$sqlchk = "select * " ;
			$sqlchk .= "from Software " ;
			
		$sqlchk .="where Sof_Name like '%$key_name%' and Sof_Version like '$key_Version%' and Sof_SerialCode like '%$key_Code%'and Sof_SerialNo like '$key_Number%' ";
		
			if($_POST['key_Receive_from'] or $_POST['key_Receive_to'])
			{
			$sqlchk .="and Sof_ReceiveDate BETWEEN '$key_Receive_from' and '$key_Receive_to'";
			}



			//-------------------------------------------------------------------------------------
			
		$sqlchk.=" ORDER BY Sof_Name ASC, Sof_Version ASC, Sof_ExpireDate ASC ; " ;
		
		$querysh = mssql_query($sqlchk);
		
		
		//--------------Search No Data Show--------------------------------------------------
		if(mssql_num_rows($querysh) <1){
			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Software Data</div></TD>";
		echo"</tr>";			
		}else          
//---------------------------------------------------------------------------------

			while($rs=mssql_fetch_array($querysh))
			{
			
		$Sof_Id=$rs[Sof_Id];
		$Sof_SerialCode=$rs[Sof_SerialCode];
		$Sof_SerialNo=$rs[Sof_SerialNo];
		$Sof_Name=$rs[Sof_Name];
		$Sof_Version=$rs[Sof_Version];
		$Sof_ReceiveDate=$rs[Sof_ReceiveDate];
		$Sof_ExpireDate=$rs[Sof_ExpireDate];
		$Sof_Desc1=$rs[Sof_Desc1];
		$Sof_Desc2=$rs[Sof_Desc2];
		$Sof_Desc3=$rs[Sof_Desc3];
		$Sof_Note=$rs[Sof_Note];
					

//-------------------Encode---------------------------------------------------

 $Sof_IdCode=base64_encode(base64_encode("$Sof_Id"));
 $Sof_IdCodeDel=base64_encode(base64_encode("$Sof_Id"));



//------------------------------------------------------------------------------

 //----------------------Format Date-------------------------------------------------------------  
                $Sof_ReceiveDate_Ori = $Sof_ReceiveDate;                     
				$Sof_ReceiveDateNewformat = date_create($Sof_ReceiveDate_Ori);
				$Sof_ReceiveDateNewformat = date_format($Sof_ReceiveDateNewformat,'Y-m-d');
//-----------------------------------------------------------------------------------------------
 //----------------------Format Date-------------------------------------------------------------  
                $Sof_ExpireDate_Ori = $Sof_ExpireDate;                     
				$Sof_ExpireDateNewformat = date_create($Sof_ExpireDate_Ori);
				$Sof_ExpireDateNewformat = date_format($Sof_ExpireDateNewformat,'Y-m-d');
//-----------------------------------------------------------------------------------------------


			
/*---------------------Number Grp_Id------------------------------//
			$sqlsh = "select * from Groups where Grp_Id='$Grp_Id2'";
			$Grp_Id2=$rs[Grp_Id];

			$objQuery2 = mssql_query($sqlsh) or die ("Error Query [".$sqlsh."]");
			$Num_Rows2 = mssql_num_rows($objQuery2);	
			
//-----------------------------------------------------------------------                     
/*
			
				$iLoop++;
    $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;
	*/
	 $bgcolor ='"#E0E0E0"';
	
//-----------------Table Color---------------------------------------------------	
	$TRhover='this.bgColor="#D6EBFF"';
	$TR_Nohover='this.bgColor="#E0E0E0"';
	
	//#F4F4F4
	$TR_Hi="toggle(this)";


//---------------------------------------------------------------------

	

		echo"<tr bgcolor=$bgcolor onMouseOver=$TRhover onMouseOut =$TR_Nohover onClick=$TR_Hi >";
		echo"<TD><div align='center' class='style81'>$no</div></TD>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_SerialCode</div></TD>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_SerialNo</div></TD>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_Name</div></td>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_Version</div></td>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_ReceiveDateNewformat</div></td>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_ExpireDateNewformat</div></td>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_Desc1</div></td>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_Desc2</div></td>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_Desc3</div></td>";
		echo"<TD><div align='left' class='style81'>&nbsp;$Sof_Note</div></td>";

		echo"<TD><div align='center' class='style81'><A HREF=\"SoftwareEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Sof_Id=$Sof_IdCode\" target=_top >
		<IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
		echo"<TD><div align='center' class='style81'><A HREF=\"SoftwareDelete.php?Usr_IdLogin=$Usr_IdLoginCodeDel&Sof_Id=$Sof_IdCodeDel\" target=_top  onclick=\" return confirm('Are you sure delete ($Sof_Name  $Sof_Version)  ') \">
		<IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a></div></td>";
		echo"</tr>";
				$no++;

	} 
						   
	//echo"$Usr_IdLoginCode";
		?>
  </p>
</table>
