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
	
	$Usr_IdLogin=$_POST["Usr_IdLogin"];
	$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));
	$Mtt_Id=$_POST[Mtt_Id];
	$Mtn_Detail=$_POST[Mtn_Detail];
	$Mtn_Date=$_POST[Mtn_Date];
	$Mtn_Duration=$_POST[Mtn_Duration];
	$Mtn_DoBy=$_POST[Mtn_DoBy];
	$Mtn_RequestBy=$_POST[Mtn_RequestBy];
	$Ast_Id=$_POST[Ast_Id];

		
		
		
	include "connect.php";	


		
 if($Mtt_Id=="") 
	{
		echo"<script>alert('Maintenance Type can not blank!!!');history.back();</script>";
		exit();
	}elseif($Mtn_Detail==""){
		echo"<script>alert('Maintenance Detail  can not blank!!!');history.back();</script>";
		exit();		
		}elseif($Mtn_Date==""){
		echo"<script>alert('Date can not blank!!!');history.back();</script>";
		exit();
	}elseif($Mtn_Duration==""){
		echo"<script>alert('Duration can not blank!!!');history.back();</script>";
		exit();
	}elseif($Mtn_DoBy==""){
		echo"<script>alert('Do By can not blank!!!');history.back();</script>";
		exit();	
	}elseif($Mtn_RequestBy==""){
		echo"<script>alert('Request By can not blank!!!');history.back();</script>";
		exit();
	}elseif($Ast_Id==""){
		echo"<script>alert('AssetIT can not blank!!!');history.back();</script>";
		exit();
	}
	$sql  = "insert into Maintenance " ;
	$sql .= "values('$Mtt_Id','$Mtn_Detail','$Mtn_Date','$Mtn_Duration','$Mtn_DoBy', " ;
	$sql .= "'$Mtn_RequestBy','$Ast_Id')";


	mssql_query($sql)or die("error=$sql");
		echo "<script>window.location='MaintenanceList.php?Usr_IdLogin=$Usr_IdLoginCode';</script>";
		
		?>


</body>
</html>
