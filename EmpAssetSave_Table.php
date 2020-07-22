<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="unicorn/css/bootstrap.min.css">
    <link rel="stylesheet" href="unicorn/css/unicons.css">
    <link rel="stylesheet" href="unicorn/css/owl.carousel.min.css">
    <link rel="stylesheet" href="unicorn/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="unicorn/css/tooplate-style.css">
    <link rel="stylesheet" href="bbc.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <title>OguraClutch</title>
</head>
<style>
.table {
    border: 1px solid #fff !important;

    text-align: left !important;
    border-radius: 3px !important;


}
.hoz:hover {
    background-color: #cce4ff !important;

}
.ChkBox {

    margin-left: 8px !important;
}

.bodytable {

    background-color: #fff;
    border: 1px solid #000;
    border-radius: 3px !important;
    margin-top: 5px;
    font-size: 17px;

}

.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 18px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

tr {
    font-size: 12px !important;
}

td {

    border: 1px solid #fff !important;
    font-size: 14px;
}
</style>

<?

		$Ast_Id=$_POST[Ast_Id];	
	@session_start();
		$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
		$Emp_IdEditCode=$_SESSION[Emp_IdEditCode] ;
		$Emp_Id=$_SESSION[Emp_Id] ;
?>

<form id="form2" name="form2" method="post" action="EmpAssetSave_DB.php">
    <input name="Emp_Id22" type="hidden" id="Emp_Id22" value="<?="$Emp_Id";?>" />
    <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
    <input name="Ast_Id" type="hidden" id="Ast_Id" value="<?="$Ast_Id";?>" />
    <input type="image" name="button3" id="button3" value="Add Asset" src="images/icon/AssetSave.png" WIDTH="50"
        HEIGHT="50" BORDER="0" onmouseover="this.src='images/icon/AssetSave_b.png'"
        onmouseout="this.src='images/icon/AssetSave.png'" />


    <table class='table' id='myTable'>
        <thead>
            <tr class='thead'>
                <td>No.</td>
                <td>Add&nbsp;Asset</td>
                <td>IP&nbsp; Address</td>
                <td> Type </td>
                <td>Brand</td>
                <td>Model</td>
                <td>Serial No.</td>
                <td>Code</td>
                <td>Location</td>

            </tr>
        </thead>
        <p>&nbsp; </p>
        <? 	
			$no=1;

				include "connect.php";
				$sqlchk = "select * " ;
				$sqlchk .= "from (AssetIT A INNER JOIN Location L " ;
				$sqlchk .= "ON A.Loc_Id = L.Loc_Id) " ;
				$sqlchk .=" where A.Ast_Ip like '%$key_IP_Address%' and A.Ast_Type like '$key_Ast_Type%' and A.Ast_Brand like '%$key_Brand%'and L.Loc_Id like '$key_Loc_Id%' ";
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
				$bgcolor ='"#E0E0E0"';
				$TRhover='this.bgColor="#D6EBFF"';
				$TR_Nohover='this.bgColor="#E0E0E0"';
				$TR_Hi="toggle(this)";
				echo"<tr bgcolor=$bgcolor onMouseOver=$TRhover onMouseOut =$TR_Nohover onClick=$TR_Hi >";
				echo"<td><div align='center' class='style25'>$no</div></td>";
				echo"<td><div align='center' class='style25'><input type='checkbox' name='chkfri[]' value=$Ast_Id>
					<IMG SRC=images/icon/AssetSave.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
				echo"<td><div align='Left' class='style25'>&nbsp;$Ast_Ip</div></td>";
				echo"<td><div align='Left' class='style25'>&nbsp;$Ast_Type</div></td>";
				echo"<td><div align='Left' class='style25'>&nbsp;$Ast_Brand</div></td>";
				echo"<td><div align='Left' class='style25'>&nbsp;$Ast_Model</div></td>";
				echo"<td><div align='Left' class='style25'>&nbsp;$Ast_Serial</div></td>";
				echo"<td><div align='Left' class='style25'>&nbsp;$Ast_Code</div></td>";
				echo"<td><div align='Left' class='style25'>&nbsp;$Loc_Name&nbsp;$Loc_Group</div></td>";
				echo"</tr>";
					$no++;
	}  
		?>

    </table>
</form>