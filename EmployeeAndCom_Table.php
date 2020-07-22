<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="select.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="jquery.min.js"></script>

    <script src="popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
    </script>
    <script src="bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">
    </script>
    <script src="bootstrap-select.min.js"></script>

    <title>OguraClutch</title>
</head>
<script language="JavaScript">
function toggle(it) {
    if ((it.style.backgroundColor == "none") || (it.style.backgroundColor == "")) {
        it.style.backgroundColor = "#D6EBFF";
    } else {
        it.style.backgroundColor = "";
    }
}
</script>
<style type="text/css">
#box-table-a {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;
    width: 480px;
    text-align: left;
    border-collapse: collapse;
    margin: 20px;
}

#box-table-a table {
    align: center;
}

#box-table-a th {
    font-size: 13px;
    font-weight: bold;
    background: #FCD496;
    border-top: 2px solid #fff;
    border-bottom: 1px solid #fff;
    color: #000;
    padding: 8px;
}

#box-table-a td {
    background: #FEE4BF;
    border-bottom: 1px solid #fff;
    color: #666;
    border-top: 1px solid transparent;
    padding: 8px;
}

#box-table-a tr:hover td {
    background: #FF9231;
    color: #000;
}

.col-form-label {
    text-align: right !important;
}

.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 14px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

table{
	font-size:10px;
}

tr {
	border: 1px solid #ddd !important;
   
}

td {

    border: 1px solid #ddd !important;
   
}
</style>


<table class="table">
    <thead>
        <tr class="thead">
            <td>No.
            </td>
            <td>IP Address
            </td>
            <td>Type
            </td>
            <td>Name
            </td>
            <td>Nick Name
            </td>
            <td>Department
            </td>
            <td>Serial Number
            </td>

            <td>&nbsp;&nbsp;Code &nbsp; &nbsp; &nbsp; &nbsp;
            </td>
            <td>Receive&nbsp;Date
            </td>
            <td>Warranty&nbsp;Date
            </td>
            <td> &nbsp;&nbsp;DocRefer1 &nbsp;&nbsp;
            </td>
            <td> &nbsp;&nbsp;DocRefer2 &nbsp;&nbsp;
            </td>
            <td>Brand
            </td>
            <td>Model
            </td>
            <td>CPU Brand
            </td>
            <td>CPU Speed
            </td>
            <td>Capacity
            </td>
            <td>Ram
            </td>
            <td>&nbsp;&nbsp;Detail&nbsp;1&nbsp;&nbsp;&nbsp;
            </td>
            <td>&nbsp;&nbsp;Detail&nbsp;2&nbsp;&nbsp;&nbsp;
            </td>
            <td>&nbsp;&nbsp;Detail&nbsp;3&nbsp;&nbsp;&nbsp;
            </td>
            <td>&nbsp;&nbsp;Detail&nbsp;4&nbsp;&nbsp;&nbsp;
            </td>
            <td>&nbsp;&nbsp;Detail&nbsp;5&nbsp;&nbsp;&nbsp;
            </td>
            <td>&nbsp;&nbsp;Detail&nbsp;6&nbsp;&nbsp;&nbsp;
            </td>
            <td>OS License
            </td>
            <td>OS Installed
            </td>
            <td>Note
            </td>
            <td>Location
            </td>
            <td>Software
            </td>
        </tr>
    </thead>
    
        <?	
	
	 	$no=1;

			include "connect.php";
			
			
			@session_start();
		$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];

		$Ast_Serial=$_POST[Ast_Serial];
		$Ast_Code=$_POST[Ast_Code];
		$Ast_Ip=$_POST[Ast_Ip];
		$Ast_ReceiveDate=$_POST[Ast_ReceiveDate];
		$Ast_Warranty=$_POST[Ast_Warranty];
		$Ast_DocRefer1=$_POST[Ast_DocRefer1];
		$Ast_DocRefer2=$_POST[Ast_DocRefer2];
		$Ast_Type=$_POST[Ast_Type];
		$Ast_Brand=$_POST[Ast_Brand];
		$Ast_Model=$_POST[Ast_Model];
		$Ast_CPUBrand=$_POST[Ast_CPUBrand];
		$Ast_CPUspeed=$_POST[Ast_CPUspeed];
		$Ast_Capacity=$_POST[Ast_Capacity];
		$Ast_Ram=$_POST[Ast_Ram];
		$Ast_Desc1=$_POST[Ast_Desc1];
		$Ast_Desc2=$_POST[Ast_Desc2];
		$Ast_Desc3=$_POST[Ast_Desc3];
		$Ast_Desc4=$_POST[Ast_Desc4];
		$Ast_Desc5=$_POST[Ast_Desc5];
		$Ast_Desc6=$_POST[Ast_Desc6];
		$Ast_OSLicense=$_POST[Ast_OSLicense];
		$Ast_OSInstalled=$_POST[Ast_OSInstalled];
		$Ast_Note=$_POST[Ast_Note];
		$Loc_Id=$_POST[Loc_Id];
		
		$key_Name=$_POST[key_Name];
		$key_Nick=$_POST[key_Nick];
		$key_Dep_Id=$_POST[key_Dep_Id];

		$sqlchk ="select * from ((((EmpAsset EA inner join Employee E on EA.Emp_Id = E.Emp_Id)";
		$sqlchk .= "inner join AssetIT A on A.Ast_Id = EA.Ast_Id)";
		$sqlchk .= "inner join Location L on L.Loc_Id = A.Loc_Id)";
		$sqlchk .= "inner join Department D on D.Dep_Id=E.Dep_Id)";
		$sqlchk .= "inner join Position P on P.Pos_Id=E.Pos_Id";
	
			
			
		$sqlchk .=" where A.Ast_Ip like '%$key_IP_Address%' and A.Ast_Type like '$key_Ast_Type%' and A.Ast_Brand like '%$key_Brand%'and L.Loc_Id like '$key_Loc_Id%' ";
		$sqlchk .="and A.Ast_Serial like '%$key_Serial%' and A.Ast_Warranty like '%$key_warranty%' and A.Ast_DocRefer1 like '%$key_DocRefer1%'";
		$sqlchk .="and A.Ast_CPUBrand like '%$key_Cpu_Brand%' and A.Ast_Model like '%$key_Model%' and A.Ast_Capacity like '%$key_Capacity%'";
		$sqlchk .="and A.Ast_OSLicense like '%$key_OSLicense%' and A.Ast_Ram like '%$key_Ram%' and A.Ast_OSInstalled like '%$key_OSInstalled%'";
		$sqlchk .="and E.Emp_Name like '$key_Name%' and E.Emp_NickName like '$key_Nick%' and D.Dep_Name like '$key_Dep_Id%'";
		$sqlchk .="and A.Ast_DocRefer2 like '%$key_DocRefer2%' and A.Ast_Code like '%$key_Ast_Code%'";
		$sqlchk.=" ORDER BY Right(A.Ast_Ip,3),A.Ast_Type ASC,D.Dep_Name ASC" ;

		
		$querysh = mssql_query($sqlchk);

		if(mssql_num_rows($querysh) <1){
			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<tdcolspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Asset IT Data</div></td>";
		echo"</tr>";			
		}else          

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
		
		$Emp_Id=$rs[Emp_Id];
		$Emp_Name=$rs[Emp_Name];
		$Emp_SurName=$rs[Emp_SurName];
		$Emp_NickName=$rs[Emp_NickName];
		$Dep_Id=$rs[Dep_Id];
		$Pos_Id=$rs[Pos_Id];
		$Dep_Name=$rs[Dep_Name]; 
		$Pos_Name=$rs[Pos_Name];
				


		$Ast_IdCode=base64_encode(base64_encode("$Ast_Id"));
		$Ast_IdCodeDel=base64_encode(base64_encode("$Ast_Id"));
		$Emp_IdCode=base64_encode(base64_encode("$Emp_Id"));

		$Ast_ReciveDate_Ori = $Ast_ReceiveDate;                     
		$Ast_ReciveDateNewformat = date_create($Ast_ReciveDate_Ori);
		$Ast_ReciveDateNewformat = date_format($Ast_ReciveDateNewformat,'Y-m-d');
                                         


		$Unit_Warranty='Month';
		$Unit_Capacity='GB.';
		$Unit_Ram='MB.';
		$Unit_Cpu='GHz';
							

		echo"<tr>";
		echo"<td><div align='center' class='style81'>$no</div></td>";
		echo"<td>&nbsp;$Ast_Ip</div></td>";
		echo"<td>$Ast_Type</div></td>";
		
		echo"<td><a herf=\"EmpAssetDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Emp_Id=$Emp_IdCode\" target=_top >$Emp_Name</a></div></td>";
		
		echo"<td>$Emp_NickName</div></td>";
		
		echo"<td>$Dep_Name</div></td>";
		echo"<td>$Ast_Serial</div></td>";
		echo"<td>$Ast_Code</div></td>";
		echo"<td>$Ast_ReciveDateNewformat</div></td>";
		echo"<td>$Ast_Warranty&nbsp;$Unit_Warranty</div></td>";
		echo"<td>$Ast_DocRefer1</div></td>";
		echo"<td>$Ast_DocRefer2</div></td>";
		
		
		echo"<td>$Ast_Brand</div></td>";
		echo"<td>$Ast_Model</div></td>";
		echo"<td>$Ast_CPUBrand</div></td>";
		echo"<td>$Ast_CPUspeed&nbsp;$Unit_Cpu</div></td>";
		echo"<td>$Ast_Capacity&nbsp;$Unit_Capacity</div></td>";
		echo"<td>$Ast_Ram&nbsp;$Unit_Ram</div></td>";
		
		echo"<td>$Ast_Desc1</div></td>";
		echo"<td>$Ast_Desc2</div></td>";
		echo"<td>$Ast_Desc3</div></td>";
		echo"<td>$Ast_Desc4</div></td>";
		echo"<td>$Ast_Desc5</div></td>";
		echo"<td>$Ast_Desc6</div></td>";
		echo"<td>$Ast_OSLicense</div></td>";
		echo"<td>$Ast_OSInstalled</div></td>";
		echo"<td>$Ast_Note</div></td>";
		echo"<td>$Loc_Name &nbsp; $Loc_Group</div></td>";
		
		echo"<td><div align='center' class='style81'><A HREF=\"SoftwareAssetDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Ast_Id=$Ast_IdCode&Link=EmpAndCom\" target=_top >
		<IMG SRC=images/icon/add_Software.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";

		echo"</tr>";
				$no++;

	} 
	
			
		$filName = "EmployeeAssetIT.csv"; 
		$objWrite = fopen("EmployeeAssetIT.csv", "w"); 
		$objQuery = mssql_query($sqlchk) or die ("Error Query [".$sqlchk."]"); 
		$no_Csv=1;
		
		
		fwrite($objWrite,"\"No.\",\"IP Address\",\"Type\",\"Name\",\"Nick Name\",\"Department\",\"Serial Number\",\"Code\",\"Receive Date\",\"Warranty Date\",\"DocRefer1\",\"DocRefer2\",\"Brand\",\"Model\",\"CPU Brand\",\"CPU Speed\",\"Capacity\",\"Ram\",\"Detail 1\",\"Detail 2\",\"Detail 3\",\"Detail 4\",\"Detail 5\",\"Detail 6\",\"OS License\",\"OS Installed\",\"Note\",\"Location\" \n");

		
		while($objResult = mssql_fetch_array($objQuery)) 
		{ 
		fwrite($objWrite, "\"$no_Csv\",\"$objResult[Ast_Ip]\",\"$objResult[Ast_Type]\","); 

		fwrite($objWrite, "\"$objResult[Emp_Name]\",\"$objResult[Emp_NickName]\","); 

		fwrite($objWrite, "\"$objResult[Dep_Name]\","); 

		fwrite($objWrite, "\"$objResult[Ast_Serial]\",\"$objResult[Ast_Code]\","); 

		fwrite($objWrite, "\"$objResult[Ast_ReceiveDate]\",\"$objResult[Ast_Warranty]\","); 

		fwrite($objWrite, "\"$objResult[Ast_DocRefer1]\",\"$objResult[Ast_DocRefer2]\","); 

		fwrite($objWrite, "\"$objResult[Ast_Brand]\",\"$objResult[Ast_Model]\","); 

		fwrite($objWrite, "\"$objResult[Ast_CPUBrand]\",\"$objResult[Ast_CPUspeed]\","); 

		fwrite($objWrite, "\"$objResult[Ast_Capacity]\",\"$objResult[Ast_Ram]\","); 

		fwrite($objWrite, "\"$objResult[Ast_Desc1]\",\"$objResult[Ast_Desc2]\","); 

		fwrite($objWrite, "\"$objResult[Ast_Desc3]\",\"$objResult[Ast_Desc4]\","); 

		fwrite($objWrite, "\"$objResult[Ast_Desc5]\",\"$objResult[Ast_Desc6]\","); 

		fwrite($objWrite, "\"$objResult[Ast_OSLicense]\",\"$objResult[Ast_OSInstalled]\","); 

		fwrite($objWrite, "\"$objResult[Ast_Note]\",\"$objResult[Loc_Name]$objResult[Loc_Group]\" \n"); 


		$no_Csv++;
		} 
		fclose($objWrite); 

		$Number_Search=($no-1);


		echo "<div align='left' class='style99'><a href=$filName><IMG SRC=images/icon/CSV.png border=0 WIDTH=50 HEIGHT=50 ALT=CSVDownload align=absmiddle></a>

		Search Information $Number_Search</div>" ;  
						   
		?>
    
</table>