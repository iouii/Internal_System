<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>
</head>

<body>
<?php
			  
include "chksession.php";
	$Usr_IdLogin=$_POST["Usr_IdLogin"];	
	$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));
	$Grp_Id=$_POST[Grp_Id];
	$Grp_Name=$_POST[Grp_Name];
	$Grp_Note=$_POST[Grp_Note];	
	$ses_Usr_Account=$_SESSION[ses_Usr_Account];	
	include "connect.php";
 if($Grp_Name=="") 
	{
		echo"<script>alert('Groups name can not blank!!!');history.back();</script>";
		exit();
	}	
	$sqlchk = "select * from Groups where Grp_Name = '$Grp_Name'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your Groups name is duplicate');history.back();</script>";
		exit();
	}	
	$log_Type  ='Groups';
	$tub='/';
	$log_Detail  ="$Grp_Name";
	$log_Detail .="$tub";
	$log_Detail .="$Grp_Note";
	
	$log_Action ="Add";

	$timeformat="Y-m-d  H:i:s";
	$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
	$datetime=date($timeformat,$THdt);
	
	$log_Date=$datetime;
	
	
	$log_By=$ses_Usr_Account;
				
	$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
	$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;
	$objQuery = mssql_query($strSQL);
	$sql  = "insert into Groups " ;
	$sql .= "values('$Grp_Name','$Grp_Note') " ;
	
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='GroupSave.php?Usr_IdLogin=$Usr_IdLoginCode';</script>";
		
?>

</body>
</html>
