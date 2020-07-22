<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
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
<style>
.col-form-label {
    text-align: right !important;
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
.table {
    border: 1px solid #fff !important;
    text-align: center !important;
    border-radius: 3px !important;
}
tr {
    font-size: 12px !important;
}
td {

    border: 1px solid #fff !important;
    font-size: 12px;
}
</style>
<?
include "chksession.php";
include "connect.php";	
include "connect.php";	
@session_start();
    $Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
    $Emaillink= $_SESSION['Emaillink'];
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
$sqlShow = "SELECT * FROM Users WHERE Usr_Id='$Usr_IdLogin'";
$queryShow = mssql_query($sqlShow)or die("error=$sqlShow");
  while($rs=mssql_fetch_array($queryShow))
    {
      $Show_Usr_Account=$rs[Usr_Account];
      $Show_Usr_Name=$rs[Usr_Name];
   }
?>
<body>
    <table class="table">
        <thead>
            <tr class="thead">
                <td>No. </td>
                <td>IP Address </td>
                <td>Type </td>
                <td>Serial Number</td>
                <td>Code</td>
                <td>ReceiveDate</td>
                <td>Warranty&nbsp;Date</td>
                <td>DocRefer1</td>
                <td>DocRefer2</td>
                <td>Brand</td>
                <td>Model</td>
                <td>CPU&nbsp;Brand</td>
                <td>CPU&nbsp;Speed </td>
                <td>Capacity</td>
                <td>Ram </td>
                <td>Detail 1 </td>
                <td>Detail 2 </td>
                <td>Detail 3 </td>
                <td>Detail 4 </td>
                <td>Detail&nbsp;5</td>
                <td>Detail&nbsp;6</td>
                <td>OS License</td>
                <td>OS Installed</td>
                <td>Note</td>
                <td>Location</td>
                <td>Software</td>
                <td>Printer </td>
                <td>Edit</td>
                <td>Delete</td>
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
		$sqlchk = "select *" ;
		$sqlchk .= "from (AssetIT A INNER JOIN Location L " ;
		$sqlchk .= "ON A.Loc_Id = L.Loc_Id) " ;
		$sqlchk .=" where A.Ast_Ip like '%$key_IP_Address%' and A.Ast_Type like '$key_Ast_Type%' and A.Ast_Brand like '%$key_Brand%'and L.Loc_Id like '$key_Loc_Id%' ";
		$sqlchk .="and A.Ast_Serial like '%$key_Serial%' and A.Ast_Warranty like '%$key_warranty%' and A.Ast_DocRefer1 like '%$key_DocRefer1%'";
		$sqlchk .="and A.Ast_CPUBrand like '%$key_Cpu_Brand%' and A.Ast_Model like '%$key_Model%' and A.Ast_Capacity like '%$key_Capacity%'";
		$sqlchk .="and A.Ast_OSLicense like '%$key_OSLicense%' and A.Ast_Ram like '%$key_Ram%' and A.Ast_OSInstalled like '%$key_OSInstalled%'";
		$sqlchk .="and A.Ast_DocRefer2 like '%$key_DocRefer2%' and A.Ast_Code like '%$key_Ast_Code%'";
		if($_POST['key_Receive_from'] or $_POST['key_Receive_to'])
		{
		$sqlchk .="and A.Ast_ReceiveDate BETWEEN '$key_Receive_from' and '$key_Receive_to'";
		}
		$sqlchk.=" ORDER BY len(A.Ast_Ip),A.Ast_Ip ASC,A.Ast_Type ASC,L.Loc_Name ASC" ;
		$querysh = mssql_query($sqlchk);
		if(mssql_num_rows($querysh) <1){
		echo"<tr bgcolor=$bgcolor>";	
		echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Asset IT Data</div></TD>";
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
		$Ast_IdCode=base64_encode(base64_encode("$Ast_Id"));
		$Ast_IdCodeDel=base64_encode(base64_encode("$Ast_Id"));
		$Ast_ReciveDate_Ori = $Ast_ReceiveDate;                     
		$Ast_ReciveDateNewformat = date_create($Ast_ReciveDate_Ori);
		$Ast_ReciveDateNewformat = date_format($Ast_ReciveDateNewformat,'Y-m-d');
		$Unit_Warranty='Month';
		$Unit_Capacity='GB.';
		$Unit_Ram='MB.';
		$Unit_Cpu='GHz';
		echo"<tr >";
		echo"<td>$no</TD>";
		echo"<td>$Ast_Ip</TD>";
		echo"<td>$Ast_Type</TD>";
		echo"<td>$Ast_Serial</td>";
		echo"<td>$Ast_Code</td>";
		echo"<td>$Ast_ReciveDateNewformat</td>";
		echo"<td>$Ast_Warranty&nbsp;$Unit_Warranty</td>";
		echo"<td>$Ast_DocRefer1</td>";
		echo"<td>$Ast_DocRefer2</td>";
		echo"<td>$Ast_Brand</td>";
		echo"<td>$Ast_Model</td>";
		echo"<td>$Ast_CPUBrand</td>";
		echo"<td>$Ast_CPUspeed&nbsp;$Unit_Cpu</td>";
		echo"<td>$Ast_Capacity&nbsp;$Unit_Capacity</td>";
		echo"<td>$Ast_Ram&nbsp;$Unit_Ram</td>";
		echo"<td>$Ast_Desc1</td>";
		echo"<td>$Ast_Desc2</td>";
		echo"<td>$Ast_Desc3</td>";
		echo"<td>$Ast_Desc4</td>";
		echo"<td>$Ast_Desc5</td>";
		echo"<td>$Ast_Desc6</td>";
		echo"<td>$Ast_OSLicense</td>";
		echo"<td>$Ast_OSInstalled</td>";
		echo"<td>$Ast_Note</td>";
		echo"<td>$Loc_Name &nbsp; $Loc_Group</td>";
		echo"<td><A HREF=\"SoftwareAssetDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Ast_Id=$Ast_IdCode&Link=AssetIt\" target=_top >
		<IMG SRC=images/icon/add_Software.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></td>";
		echo"<td><A HREF=\"AssetITDetail.php?Usr_IdLogin=$Usr_IdLoginCode&Ast_Id=$Ast_IdCode\" target=_black >
		<IMG SRC=images/icon/Print.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></td>";
		echo"<td><A HREF=\"AssetITEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Ast_Id=$Ast_IdCode\" target=_top >
		<IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></td>";
		echo"<td><A HREF=\"AssetITDelete.php?Usr_IdLogin=$Usr_IdLoginCodeDel&Ast_Id=$Ast_IdCodeDel\" target=_top  onclick=\" return confirm('Are you sure delete ($Ast_Ip  $Ast_Type)  ') \">
		<IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a></td>";
		echo"</tr>";
				$no++;

	} 
$filName = "AssetIT.csv"; 
$objWrite = fopen("AssetIT.csv", "w"); 
$objQuery = mssql_query($sqlchk) or die ("Error Query [".$sqlchk."]"); 
$no_Csv=1;
  
   
fwrite($objWrite,"\"No.\",\"IP Address\",\"Type\",\"Serial Number\",\"Code\",\"Receive Date\",\"Warranty Date\",\"DocRefer1\",\"DocRefer2\",\"Brand\",\"Model\",\"CPU Brand\",\"CPU Speed\",\"Capacity\",\"Ram\",\"Detail 1\",\"Detail 2\",\"Detail 3\",\"Detail 4\",\"Detail 5\",\"Detail 6\",\"OS License\",\"OS Installed\",\"Note\",\"Location\" \n");

  
while($objResult = mssql_fetch_array($objQuery)) 
{ 
fwrite($objWrite, "\"$no_Csv\",\"$objResult[Ast_Ip]\",\"$objResult[Ast_Type]\","); 

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
echo "<div align='left'><a href=$filName><IMG SRC=images/icon/CSV.png border=0 WIDTH=50 HEIGHT=50 ALT=CSVDownload align=absmiddle></a>
Search Information $Number_Search</div>" ;  
?>

</tbody>
</table>