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
//keep session id
	session_start();
			
	$Usr_IdLogin=$_SESSION[Usr_IdLoginSesCode];
	$Mtn_IdDelCode=$_GET["Mtn_Id"];
	$Mtn_Id=base64_decode(base64_decode("$Mtn_IdDelCode"));
	
	include ("connect.php");
	$sql = "delete from Maintenance where Mtn_Id='$Mtn_Id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='MaintenanceList.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	
	
?>

</body>
</html>
