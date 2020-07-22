 <?
 
 	include "chksession.php";
	include "connect.php";	
		$Usr_IdLoginCode=$_POST["Usr_IdLogin"];	
			 $Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
 
 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>
</head>

<body>

<? 		
	include "connect.php";	

	$Mtt_TypeName=$_POST['Mtt_TypeName'];
	$Mtt_Note=$_POST['Mtt_Note'];

		
	if(($Mtt_TypeName==""))
	{
		echo"<script>alert('Name can not blank!!!');history.back();</script>";
		exit();
		}

	
	$sqlchk = "select * from MaintenanceType where Mtt_TypeName = '$Mtt_TypeName' ";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your $Mtt_TypeName is duplicate');history.back();</script>";
		exit();
	}	
	
	$sql="insert into MaintenanceType values('$Mtt_TypeName','$Mtt_Note')";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='MaintenanceTypeSave.php?Usr_IdLogin=$Usr_IdLogin';</script>";
?>

</body>
</html>
