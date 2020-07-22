<table class="table">
  <tr class="thead">
    <td >No.</td>
    <td >Type</td>
    <td>Detail</td>
    <td>Date</td>
    <td>Duration</td>
    <td>Do By</td>
    <td>Request By</td>
    <td>AssetIT</td>
    <td>Name</td>
    <td>Edit </td>
    <td>Delete</td>
  </tr>
    <?		
	 	$no=1;
			include "connect.php";						
			@session_start();
			$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
									
			$sqlchk = "select * from ((((Maintenance M inner join MaintenanceType MT on M.Mtt_Id = MT.Mtt_Id)" ;
			$sqlchk .= "inner join AssetIT A on M.Ast_Id = A.Ast_Id)" ;
			$sqlchk .= "left join EmpAsset EA on M.Ast_Id = EA.Ast_Id)";
			$sqlchk .= "left join Employee E on EA.Emp_Id = E.Emp_Id)";						  
			$sqlchk .="where MT.Mtt_TypeName like '$Key_Mtt_Id%' and M.Mtn_Detail like '%$key_Detail%' and M.Mtn_Duration like '%$key_Duration%'";
			$sqlchk .="and M.Mtn_DoBy like '%$key_Do_by%'and M.Mtn_RequestBy like '%$key_Request_By%' and M.Ast_Id like '$Key_Ast_Id%'";
			$sqlchk .="and A.Ast_Type like '$key_Ast_Type%'";
			
			if($_POST['key_Date_from'] or $_POST['key_Date_to'])
				{
				$sqlchk .="and M.Mtn_Date BETWEEN '$key_Date_from' and '$key_Date_to'";
				}				
			if($_POST['key_Nickname_By'])
				{
				$sqlchk .="and E.Emp_NickName like '%$key_Nickname_By%'";
				}
			$sqlchk.=" ORDER BY M.Mtn_Date DESC, M.Mtt_Id ASC, M.Mtn_DoBy ASC ; " ;			
			$querysh = mssql_query($sqlchk);
		
		//--------------Search No Data Show--------------------------------------------------
			if(mssql_num_rows($querysh) <1){
				
			echo"<tr bgcolor=$bgcolor>";	
			echo "<td colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
				<br>No Maintenance Data</div></td>";
			echo"</tr>";			
			}else          
//---------------------------------------------------------------------------------
			while($rs=mssql_fetch_array($querysh))
			{
			$Mtn_Id=$rs[Mtn_Id];
			$Mtt_Id=$rs[Mtt_Id];
			$Mtt_TypeName=$rs[Mtt_TypeName];
			$Mtn_Detail=$rs[Mtn_Detail];
			$Mtn_Date=$rs[Mtn_Date];
			$Mtn_Duration=$rs[Mtn_Duration];
			$Mtn_DoBy=$rs[Mtn_DoBy];
			$Mtn_RequestBy=$rs[Mtn_RequestBy];
			$Ast_Id=$rs[Ast_Id];
			$Ast_Ip=$rs[Ast_Ip];
			$Ast_Type=$rs[Ast_Type];
			$Ast_Brand=$rs[Ast_Brand];
			$Emp_Id=$rs[Emp_Id];
			$Emp_Name=$rs[Emp_Name];
			$Emp_SurName=$rs[Emp_SurName];
			$Emp_NickName=$rs[Emp_NickName];
//-------------------Encode---------------------------------------------------
			$Mtn_IdCode=base64_encode(base64_encode("$Mtn_Id"));
			$Mtn_IdCodeDel=base64_encode(base64_encode("$Mtn_Id"));
 //----------------------Format Date-------------------------------------------------------------  
			$Mtn_Date_Ori = $Mtn_Date;                     
			$Mtn_DateNewformat = date_create($Mtn_Date_Ori);
			$Mtn_DateNewformat = date_format($Mtn_DateNewformat,'Y-m-d');
//-----------------------------------------------------------------------------------------------
//----------------------Chk Null NickName---------------------------------------------------------
			if(is_Null($Emp_NickName))
			{
			$Emp_NickName='Center';	
			}
			echo"<tr >";
			echo"<td align='center'>$no</td>";
			echo"<td>&nbsp;$Mtt_TypeName</td>";
			echo nl2br("<td>&nbsp;$Mtn_Detail</td>");
			echo"<td>$Mtn_DateNewformat</td>";
			echo"<td>$Mtn_Duration</td>";
			echo"<td>$Mtn_DoBy</td>";
			echo"<td>$Mtn_RequestBy</td>";
			echo"<td>$Ast_Ip $Ast_Type $Ast_Brand</td>";
			echo"<td>$Emp_Name $Emp_SurName ($Emp_NickName)</td>";
			echo"<td><a class='btn btn-outline-warning btn-sm' href=\"MaintenanceEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Mtn_Id=$Mtn_IdCode\" target=_top >
			Edit</a></div></td>";
			echo"<td><a class='btn btn-outline-danger btn-sm' href=\"MaintenanceDelete.php?Usr_IdLogin=$Usr_IdLoginCodeDel&Mtn_Id=$Mtn_IdCodeDel\" target=_top  onclick=\" return confirm('Are you sure delete ($Mtt_TypeName  $Mtn_DateNewformat)  ') \">
			Delete</a></div></td>";
			echo"</tr>";
				$no++;
	} 						   
		?>

</table>
