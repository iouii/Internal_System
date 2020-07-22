<!DOCTYPE html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>    

</head>

<body>

<?php
	include "chksession.php";						  
	$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));			  
	$Usr_Id=$_POST[Usr_Id];
	$Usr_Account= $_POST[Usr_Account];
	$Usr_Password= $_POST[Usr_Password];
	$New_Password= $_POST[New_Password];
	$Usr_Name=$_POST[Usr_Name];
	$Usr_Surname=$_POST[Usr_Surname];
	$Dep_Id=$_POST[Dep_Id];
	$Pos_Id=$_POST[Pos_Id];

	include "connect.php";	
	
 if($Usr_Account=="") 
	{
		echo"<script>alert('Account can not blank!!!');history.back();</script>";
		exit();
	}elseif($Usr_Password==""){
		echo"<script>alert('Password can not blank!!!');history.back();</script>";
		exit();
	}elseif(strlen($Usr_Password) < 6){
		echo "<script>alert('Password  can not less than 6 digit!!!');history.back();</script>";
		exit();
	}elseif($Dep_Id==""){
		echo "<script>alert('Please select Department!!!');history.back();</script>";
		exit();
	}elseif($Pos_Id==""){
		echo "<script>alert('Please select position!!!');history.back();</script>";
		exit();
	}	

	$sql  = "update Users ";
	$sql .= "set Usr_Account='$Usr_Account',Usr_Password='$Usr_Password',Usr_Name='$Usr_Name',Usr_Surname='$Usr_Surname'," ;
	$sql .= "Dep_Id='$Dep_Id',Pos_Id='$Pos_Id' ";
	$sql .= "where Usr_Id = '$Usr_Id'";
	mssql_query($sql)or die("error=$sql");
	
	echo "<script>alert('Success!!!');</script>";
	echo "<script>window.close();</script>";		
?>


</body>
</html>
