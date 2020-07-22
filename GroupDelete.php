<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>
</head>

<body>
<?php
include "chksession.php";
	
	include ("connect.php");
	
	$Usr_IdLogin=$_GET["Usr_IdLogin"];
	$Grp_IdDelCode=$_GET["Grp_Id"];
	$Grp_Id=base64_decode(base64_decode("$Grp_IdDelCode"));
	$ses_Usr_Account=$_SESSION[ses_Usr_Account];
	$sqlchk = "select * from GroupEmployee where Grp_Id = '$Grp_Id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num>0)
	{
		echo"<script>alert('Can not delete data Because the data is correlated with Member information.');history.back();</script>";
		exit();
	}	
	$strSQL = " select * from Groups where Grp_Id = '$Grp_Id'";
	$querysh = mssql_query($strSQL);

while($rs=mssql_fetch_array($querysh))
{

	$Grp_Name=$rs[Grp_Name];
	$Grp_Note=$rs[Grp_Note];
	$log_Type  ='Groups';
	$tub='/';
	$log_Detail  ="$Grp_Name";
	$log_Detail .="$tub";
	$log_Detail .="$Grp_Note";
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
	$sql = "delete from Groups where Grp_Id='$Grp_Id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='GroupSave.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	
?>

</body>
</html>
