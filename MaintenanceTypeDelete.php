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

	
	include ("connect.php");
	
	
//-----------------------------Decode----------------------------------------------------
		$Usr_IdLogin=$_GET["Usr_IdLogin"];

		
		$Mtt_IdDelCode=$_GET["Mtt_Id"];
   		$Mtt_Id=base64_decode(base64_decode("$Mtt_IdDelCode"));
		$sqlchk = "select * from Maintenance where Mtt_Id = '$Mtt_Id'";
		$querychk = mssql_query($sqlchk);
		$num = mssql_num_rows($querychk);
		if($num>0)
		{
		echo"<script>alert('Can not delete data Because the data is correlated with Maintenance information.');history.back();</script>";
			exit();
		}	
		$sql = "delete from MaintenanceType where Mtt_Id='$Mtt_Id'";
		mssql_query($sql)or die("error=$sql");
		echo "<script>window.location='MaintenanceTypeSave.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	
	
?>

</body>
</html>
