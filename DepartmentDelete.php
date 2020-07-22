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
	$Usr_IdLogin=$_GET["Usr_IdLogin"];
	$Dep_idDelCode=$_GET["Dep_id"];
	$Dep_id=base64_decode(base64_decode("$Dep_idDelCode"));
	$sqlchk = "select * from Employee where Dep_id = '$Dep_id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num>0)
	{
		echo"<script>alert('Can not delete data Because the data is correlated with employee information.');history.back();</script>";
		exit();
	}	
	$sqlchk = "select * from Users where Dep_id = '$Dep_id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num>0)
	{
		echo"<script>alert('Can not delete data Because the data is correlated with Users information.');history.back();</script>";
		exit();
	}	

	$sql = "delete from Department where Dep_id='$Dep_id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='DepartmentSave.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	
?>

</body>
</html>
