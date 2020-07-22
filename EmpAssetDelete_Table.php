<?
$Ast_Id=$_POST[Ast_Id];	
	@session_start();
			$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
			 $Emp_IdEditCode=$_SESSION[Emp_IdEditCode] ;
			  $Emp_Id=$_SESSION[Emp_Id] ;
?>
     
      <form id="form2" name="form2" method="post" action="EmpAssetDelete_DB.php">
        <input name="Emp_Id22" type="hidden" id="Emp_Id22" value="<?="$Emp_Id";?>" />
        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
        <input name="Ast_Id" type="hidden" id="Ast_Id" value="<?="$Ast_Id";?>" />
        <table width="1050" border="0" align="center" name="details">
          <tr bgcolor="#FFFF00">
            <td colspan="4" bgcolor="#FFFFFF">
            <a href="EmpAssetSave.php?Usr_IdLogin=<? echo"$Usr_IdLoginCode"; ?>&Emp_Id=<? echo"$Emp_IdEditCode"; ?>" target="_top"><img border="0" src="images/icon/AssetSave.png"    onmouseover="this.src='images/icon/AssetSave_b.png'" onmouseout="this.src='images/icon/AssetSave.png'"  WIDTH="50" HEIGHT="50"/></a>
            <input  type="image" name="button3" id="button3" value="Delete Asset"  src="images/icon/Asset_No.png"  WIDTH="50" HEIGHT="50" BORDER="0"  onmouseover="this.src='images/icon/Asset_No_b.png'" onmouseout="this.src='images/icon/Asset_No.png'" />
            	
              <table width="161" border="0" align="right">
                <tr>
                  <td><div align="center"><span class="style88"> All Asset </span></div></td>
                </tr>
              </table></td>
            <td width="93" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="121" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="158" bgcolor="#FFFFFF" class="style48">&nbsp;</td>
            <td width="88" bgcolor="#FFFFFF" class="style48">&nbsp;</td>
            <td width="179" bgcolor="#FFFFFF" class="style48">&nbsp;</td>
            <td width="51" bgcolor="#FFFFFF" class="style48">&nbsp;</td>
            </tr>
          <tr bgcolor="#FFFF00">
            <td width="24" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>No.</strong></span></div></td>
            <td width="120" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><strong class="style48">Delete Asset </strong></div></td>
            <td width="87" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>IP Address</strong></span></div></td>
            <td width="87" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>Type</strong></span></div></td>
            <td width="93" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>Brand</strong></span></div></td>
            <td width="121" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF"><div align="center"><span class="style48"><strong>Model</strong></span></div></td>
            <td width="158" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center"><strong>Serial No.</strong></div></td>
            <td width="88" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center"><strong>Code</strong></div></td>
             <td width="179" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><div align="center"><strong>Location</strong></div></td>
             <td width="51" align="center" background="images/Menu list/blue_bg.jpg" bgcolor="#FFFFFF" class="style48"><strong>Detail</strong></td>
          </tr>
          <p>&nbsp; </p>
          <p>
            <? 	$no=1;

			include "connect.php";
    	
			$sqlchk = " select * from (((EmpAsset EA inner join Employee E on EA.Emp_Id = E.Emp_Id)";
			$sqlchk .= "inner join AssetIT A on A.Ast_Id = EA.Ast_Id)";
			$sqlchk .="inner join Location L on L.Loc_Id = A.Loc_Id)";
			$sqlchk .="where E.Emp_Id=$Emp_Id";	

			$sqlchk .=" and A.Ast_Ip like '%$key_IP_Address%' and A.Ast_Type like '$key_Ast_Type%' and A.Ast_Brand like '%$key_Brand%'and L.Loc_Id like '$key_Loc_Id%' ";
			$sqlchk .="and A.Ast_Serial like '%$key_Serial%' ";
			$sqlchk .="and A.Ast_Model like '%$key_Model%' and A.Ast_Code like '%$key_Code%'";				
			$sqlchk.=" ORDER BY Right(A.Ast_Ip,3),A.Ast_Type ASC,L.Loc_Name ASC" ;
		
			$querysh = mssql_query($sqlchk);
			while($rs=mssql_fetch_array($querysh))
			{
			$Ast_Id=$rs[Ast_Id];		
			$Ast_Serial=$rs[Ast_Serial];
			$Ast_Code=$rs[Ast_Code];
			$Ast_Ip=$rs[Ast_Ip];
			$Ast_ReceiveDate=$rs[Ast_ReceiveDate];
			$Ast_Warranty=$rs[Ast_Warranty];
			$Ast_DocRefer1=$rs[Ast_DocRefer1];
			$Ast_DocRefer2=$rs[Ast_DocRefer2];
			$Ast_Type=$rs[Ast_Type];
			$Ast_Brand=$rs[Ast_Brand];
			$Ast_Model=$rs[Ast_Model];
			$Ast_CPUBrand=$rs[Ast_CPUBrand];
			$Ast_CPUspeed=$rs[Ast_CPUspeed];
			$Ast_Capacity=$rs[Ast_Capacity];
			$Ast_Ram=$rs[Ast_Ram];
			$Ast_Desc1=$rs[Ast_Desc1];
			$Ast_Desc2=$rs[Ast_Desc2];
			$Ast_Desc3=$rs[Ast_Desc3];
			$Ast_Desc4=$rs[Ast_Desc4];
			$Ast_Desc5=$rs[Ast_Desc5];
			$Ast_Desc6=$rs[Ast_Desc6];
			$Ast_OSLicense=$rs[Ast_OSLicense];
			$Ast_OSInstalled=$rs[Ast_OSInstalled];
			$Ast_Note=$rs[Ast_Note];
			$Loc_Id=$rs[Loc_Id];		
			$Loc_Name=$rs[Loc_Name];
			$Loc_Group=$rs[Loc_Group];

		 	$Ast_IdCode=base64_encode(base64_encode("$Ast_Id"));

	 		$bgcolor ='"#E0E0E0"';

			$TRhover='this.bgColor="#D6EBFF"';
			$TR_Nohover='this.bgColor="#E0E0E0"';

			$TR_Hi="toggle(this)";

			echo"<tr bgcolor=$bgcolor onMouseOver=$TRhover onMouseOut =$TR_Nohover onClick=$TR_Hi >";
			echo"<TD><div align='center' class='style25'>$no</div></TD>";
			echo"<TD><div align='center' class='style25'><input type='checkbox' name='chkfri[]' value=$Ast_Id>
				<IMG SRC=images/icon/Asset_No.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
				
			echo"<TD><div align='Left' class='style25'>&nbsp;$Ast_Ip</div></TD>";
			echo"<TD><div align='Left' class='style25'>&nbsp;$Ast_Type</div></TD>";
			echo"<TD><div align='Left' class='style25'>&nbsp;$Ast_Brand</div></td>";
			echo"<TD><div align='Left' class='style25'>&nbsp;$Ast_Model</div></td>";
			echo"<TD><div align='Left' class='style25'>&nbsp;$Ast_Serial</div></td>";
			echo"<TD><div align='Left' class='style25'>&nbsp;$Ast_Code</div></td>";
			echo"<TD><div align='Left' class='style25'>&nbsp;$Loc_Name&nbsp;$Loc_Group</div></td>";
			echo"<TD><div align='center' class='style81'><A HREF=\"AssetITDetailEmp.php?Usr_IdLogin=$Usr_IdLoginCode&Ast_Id=$Ast_IdCode\" target=_top >
			<IMG SRC=images/icon/Detail.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
			echo"</tr>";
				$no++;
	}  
	$number=$no-1;
		?>
          </p>
        </table>
        </form>
