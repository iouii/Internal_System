<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>    

</head>

<body>

<?php
			//  include "chksession.php";
include "connect.php";
$Usr_Account_Post= trim($_POST[Usr_Account]);
$Usr_Password_Post= trim($_POST[Usr_Password]);
$New_Usr_Password_Post= trim($_POST[New_Usr_Password]);
$Con_New_Usr_Password_Post= trim($_POST[Con_New_Usr_Password]);
$sqlMem = "select  * from Users Where Usr_Account='$Usr_Account_Post'";
$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
	while($rsT=mssql_fetch_array($queryMem))
	//	while($rsT=mssql_fetch_array($queryMem))
	{
	$Usr_Id=$rsT[Usr_Id];
	$Usr_Account=$rsT[Usr_Account];
	$Usr_Password=$rsT[Usr_Password];
	$Usr_Name=$rsT[Usr_Name];
	$Usr_Surname=$rsT[Usr_Surname];
	$Dep_Id=$rsT[Dep_Id];
	$Pos_Id=$rsT[Pos_Id];

	}
//---------------------------------Chk Account------------------------------------------------------------------------------------	
if($Usr_Id ==""){
	echo"<script>alert('Account is none $Usr_Account !!!');history.back();</script>";
	exit();	
	
//-----------------------Funtion Chk Password----------------------------------------------------------------------------------------------------------------------------	
 }elseif($Usr_Password_Post=="") 
	{
		echo"<script>alert('Old Password can not blank!!!');history.back();</script>";
		exit();
	}elseif($New_Usr_Password_Post==""){
		echo"<script>alert('New Password can not blank!!!');history.back();</script>";
		exit();
	}elseif($Con_New_Usr_Password_Post==""){
		echo"<script>alert('Confirm Password can not blank!!!');history.back();</script>";
		exit();
	}elseif(strlen($Usr_Password_Post) < 6){
		echo "<script>alert('Old Password  can not less than 6 digit!!!');history.back();</script>";
		exit();
	}elseif(strlen($New_Usr_Password_Post) < 6){
		echo "<script>alert('New Password  can not less than 6 digit!!!');history.back();</script>";
		exit();
	}elseif(strlen($Con_New_Usr_Password_Post) < 6){
		echo "<script>alert('Confirm Password  can not less than 6 digit!!!');history.back();</script>";
		exit();		
	}elseif($Usr_Password!="$Usr_Password_Post"){
		echo"<script>alert('Old Password incorrect !!!');history.back();</script>";
		exit();
	}elseif($Usr_Password_Post=="$New_Usr_Password_Post"){
		echo"<script>alert('Old Password and New Password duplicate !!!');history.back();</script>";
		exit();
	}elseif($Usr_Password_Post=="$Con_New_Usr_Password_Post"){
		echo"<script>alert('Old Password and Confirm Password duplicate !!!');history.back();</script>";
		exit();
	}elseif($New_Usr_Password_Post != "$Con_New_Usr_Password_Post"){
		echo"<script>alert('New Password and Confirm Password incorrect !!!');history.back();</script>";
		exit();
	}
	$sql  = "update Users " ;
	$sql .= "set Usr_Account='$Usr_Account',Usr_Password='$Con_New_Usr_Password_Post',Usr_Name='$Usr_Name',Usr_Surname='$Usr_Surname'," ;
	$sql .= "Dep_Id='$Dep_Id',Pos_Id='$Pos_Id' ";
	$sql .= "where Usr_Id = '$Usr_Id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script>top.location='Login.php';</script>";
?>
</body>
</html>
