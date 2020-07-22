<script type="text/javascript">
 
 
 function toggle(it) {
  if ((it.style.backgroundColor == "none") || (it.style.backgroundColor == ""))
    {it.style.backgroundColor = "#D6EBFF";}
  else
    {it.style.backgroundColor = "";}
}
 

</script>
<style >

</style>
     
	 
<table width="667" border="0" align="center" name="details">
  <tr bgcolor="#FFFF00">
    <td width="20" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>No.</strong></span></div></td>
    <td width="112" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>Name </strong></span></div></td>
    <td width="74" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style79">Nick Name</div></td>
    <td width="185" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>Department</strong></span></div></td>
    <td width="109" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>Position</strong></span></div></td>
    <td width="46" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center" class="style80"><span class="style48"><strong>Asset</strong></span></div></td>
    <td width="41" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Edit </strong></div></td>
    <td width="46" background="/Web_ITS/images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center" class="style80"><strong>Delete</strong></div></td>
  </tr>
  <p>&nbsp; </p>
  <p>
    <?	
	
	 	$no=1;

			include "connect.php";
			
			
			@session_start();
			$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
			$sqlchk = "select E.Emp_Id, E.Emp_Number, " ;
			$sqlchk .= "E.Emp_Name, E.Emp_SurName, E.Emp_NickName, " ;
			$sqlchk .= "E.Emp_Nationality, E.Dep_Id, E.Pos_Id, " ;
			$sqlchk .= "E.Emp_Email, E.Emp_ExtensionNumber, E.Emp_Mobile, " ;
			$sqlchk .= "E.Emp_SpeedDial, D.Dep_Name, P.Pos_Name " ;
			$sqlchk .= "from (Employee E INNER JOIN Department D " ;
			$sqlchk .= "ON E.Dep_Id = D.Dep_Id) " ;
			$sqlchk .= "INNER JOIN Position P " ;
			$sqlchk .= "ON E.Pos_Id = P.Pos_Id " ;
			if($_POST['key_name'] or $_POST['key_nick'] or $_POST['key_Dep_Id'] or $_POST['key_Pos_Id'])
			{
			$sqlchk .=" where E.Emp_Name like '$key_name%' and E.Emp_NickName like '$key_nick%' and D.Dep_Name like '$key_Dep_Id%'and P.Pos_Name like '$key_Pos_Id%' ";
			}
			$sqlchk.=" ORDER BY D.Dep_Name ASC, P.Pos_Name ASC, E.Emp_Name ASC ; " ;
			
			$querysh = mssql_query($sqlchk);
			if(mssql_num_rows($querysh) <1){
				
			echo"<tr bgcolor=$bgcolor>";	
			echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
	<br>No Employee Data</div></TD>";
			echo"</tr>";			
			}else          

			while($rs=mssql_fetch_array($querysh))
			{

				$Emp_Id=$rs[Emp_Id];
				$Emp_Name=$rs[Emp_Name];
				$Emp_SurName=$rs[Emp_SurName];
				$Emp_NickName=$rs[Emp_NickName];
				$Dep_Id=$rs[Dep_Id];
				$Pos_Id=$rs[Pos_Id];
				$Dep_Name=$rs[Dep_Name]; 
				$Pos_Name=$rs[Pos_Name];

				$Emp_IdCode=base64_encode(base64_encode("$Emp_Id"));
				$Emp_IdCodeDel=base64_encode(base64_encode("$Emp_Id"));

				$bgcolor ='"#E0E0E0"';
				
				$TRhover='this.bgColor="#D6EBFF"';
				$TR_Nohover='this.bgColor="#E0E0E0"';
				
				$TR_Hi="toggle(this)";

				echo"<tr bgcolor=$bgcolor onMouseOver=$TRhover onMouseOut =$TR_Nohover onClick=$TR_Hi >";
				echo"<TD><div align='center' class='style81'>$no</div></TD>";
				echo"<TD><div align='left' class='style81'>&nbsp;&nbsp;$Emp_Name</div></TD>";
				echo"<TD><div align='left' class='style81'>&nbsp;$Emp_NickName</div></TD>";
				echo"<TD><div align='left' class='style81'>&nbsp;$Dep_Name</div></td>";
				echo"<TD><div align='left' class='style81'>&nbsp;$Pos_Name</div></td>";
				
				echo"<TD><div align='center' class='style81'><A HREF=\"EmpAssetDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Emp_Id=$Emp_IdCode\" target=_top >
				<IMG SRC=images/icon/Asset.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";

				echo"<TD><div align='center' class='style81'><A HREF=\"EmployeeEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Emp_Id=$Emp_IdCode\" target=_top >
				<IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
				echo"<TD><div align='center' class='style81'><A HREF=\"EmployeeDelete.php?Usr_IdLogin=$Usr_IdLoginCodeDel&Emp_Id=$Emp_IdCodeDel\" target=_top  onclick=\" return confirm('Are you sure delete ($Emp_Name  $Emp_SurName)  ') \">
				<IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a></div></td>";
				echo"</tr>";
						$no++;

	} 
		?>
  </p>
</table>
