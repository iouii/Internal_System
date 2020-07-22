 <?
 	include "chksession.php";
	include "connect.php";

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>
</head>
<body>
<?php
session_start();			
	$Usr_IdLogin=$_SESSION[Usr_IdLoginSesCode];
	$Ast_IdDelCode=$_GET["Ast_Id"];
	$Ast_Id=base64_decode(base64_decode("$Ast_IdDelCode"));	
include ("connect.php");

	$sqlchk =  "select Ast_Id from EmpAsset where Ast_Id = '$Ast_Id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	
	if($num!= 0)
	{
		echo"<script>alert('Delete does not work because the data is already in Employee Asset');history.back();</script>";
		exit();
	}	
	
	$sqlchk =  "select Ast_Id from SoftwareAsset where Ast_Id = '$Ast_Id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	
	if($num!= 0)
	{
		echo"<script>alert('Delete does not work because the data is already in Software Asset');history.back();</script>";
		exit();
	}	

	
		$strSQL = " select * from AssetIT where Ast_Id = '$Ast_Id'";
				
				
				$querysh = mssql_query($strSQL);

			while($rs=mssql_fetch_array($querysh))
			{

		
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

				
		$log_Type  ='AssetIT';

		$tub='/';
		$log_Detail  ="$Ast_Serial";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Code";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Ip";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_ReceiveDate";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Warranty";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_DocRefer1";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_DocRefer2";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Type";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Brand";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Model";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_CPUBrand";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_CPUspeed";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Capacity";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Ram";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc1";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc2";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc3";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc4";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc5";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc6";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_OSLicense";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_OSInstalled";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Note";
		$log_Detail .="$tub";
		$log_Detail .="$Loc_Id";

	
	$log_Action ="Delete";		
	$timeformat="Y-m-d  H:i:s";
	$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
	$datetime=date($timeformat,$THdt);	
	$log_Date=$datetime;
	$log_By=$ses_Usr_Account;
			
				$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
				$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;
				$objQuery = mssql_query($strSQL);
			}
	$sql = "delete from AssetIT where Ast_Id='$Ast_Id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='AssetITList.php?Usr_IdLogin=$Usr_IdLogin'</script>";

?>

</body>
</html>
