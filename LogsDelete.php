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

//keep session login id 
			session_start();
			
			$Usr_IdLogin=$_SESSION[Usr_IdLoginSesCode];
			$datefrom=$_POST[datefrom];
			$dateto=$_POST[dateto];
			$datefrom = $datefrom." "."00:00:00.000" ;
			$dateto = $dateto." "."23:59:59.000";
			$log_IdDelCode=$_GET["log_Id"];
			$log_Id=base64_decode(base64_decode("$log_IdDelCode"));
	
	include ("connect.php");
	$sql = "delete from Logs where log_Date BETWEEN '$datefrom' and '$dateto'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='LogsList.php?Usr_IdLogin=$Usr_IdLogin' target=_top </script>";
	
	
?>

</body>
</html>
