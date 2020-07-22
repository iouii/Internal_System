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
	$Pos_IdDelCode=$_GET["Pos_Id"];
	$Pos_Id=base64_decode(base64_decode("$Pos_IdDelCode"));


	$sqlchk = "select * from Employee where Pos_Id = '$Pos_Id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num>0)
	{
		echo"<script>alert('Can not delete data Because the data is correlated with employee information.');history.back();</script>";
		exit();
	}	
	
		
	$sqlchk = "select * from Users where Pos_Id = '$Pos_Id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num>0)
	{
		echo"<script>alert('Can not delete data Because the data is correlated with Users information.');history.back();</script>";
		exit();
	}	



	$sql = "delete from Position where Pos_Id='$Pos_Id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='PositionSave.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	
?>

</body>
</html>
