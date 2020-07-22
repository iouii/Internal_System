<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>    

</head>

<body>
<?php			  
include "chksession.php";		  
	$Usr_IdLogin=$_POST["Usr_IdLogin"];	
	$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));		  
	$Usr_Id=$_POST[Usr_Id];
	$Usr_Account= trim($_POST[Usr_Account]);
	$Usr_Password= trim($_POST[Usr_Password]);
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
		exit() ;
	}elseif($Pos_Id==""){
		echo "<script>alert('Please select position!!!');history.back();</script>";
		exit();
	}	
	$sqlchk = "select * from Users where Usr_Account = '$Usr_Account'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your Account ID is duplicate');history.back();</script>";
		exit();
	}		
	$sql  = "insert into Users " ;
	$sql .= "values('$Usr_Account','$Usr_Password','$Usr_Name','$Usr_Surname'," ;
	$sql .= "'$Dep_Id','$Pos_Id') ";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='UserAll.php?Usr_IdLogin=$Usr_IdLoginCode';</script>";	
?>

</body>
</html>
