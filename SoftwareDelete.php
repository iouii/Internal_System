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
			//$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginSes"));
			
	/*echo"<script>alert('$Usr_IdLogin');history.back();</script>";*/

			
			
  	
	//$Usr_IdLogin=$_GET["Usr_IdLogin"];
	
	$Sof_IdDelCode=$_GET["Sof_Id"];
   $Sof_Id=base64_decode(base64_decode("$Sof_IdDelCode"));
	
	include ("connect.php");
	//echo $Dept_Id ;
	
	$sqlchk =  "select Sof_Id from SoftwareAsset where Sof_Id = '$Sof_Id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	
	if($num!= 0)
	{
		echo"<script>alert('Delete does not work because the data is already in Software Asset');history.back();</script>";
		exit();
	}	
	
	

	$sql = "delete from Software where Sof_Id='$Sof_Id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='SoftwareList.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	
	
?>

</body>
</html>
