 <?
 
 	include "chksession.php";
	include "connect.php";	
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ogura Clutch Thailand</title>    

</head>

<body>
<?php
			  
	$Usr_IdLogin=$_POST["Usr_IdLogin"];
	$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));
	$Emp_Number=$_POST[Emp_Number];
	$Emp_Name=$_POST[Emp_Name];
	$Emp_SurName=$_POST[Emp_SurName];
	$Emp_NickName=$_POST[Emp_NickName];
	$Emp_Nationality=$_POST[Emp_Nationality];
	$Dep_Id=$_POST[Dep_Id];
	$Pos_Id=$_POST[Pos_Id];
	$Emp_Email=$_POST[Emp_Email];
	$Emp_ExtensionNumber=$_POST[Emp_ExtensionNumber];
	$Emp_Mobile=$_POST[Emp_Mobile];
	$Emp_SpeedDial=$_POST[Emp_SpeedDial];

	include "connect.php";	
 if($Emp_Number=="") 
	{
		echo"<script>alert('Employee number can not blank!!!');history.back();</script>";
		exit();
	}elseif($Emp_Name==""){
		echo"<script>alert('Employee name can not blank!!!');history.back();</script>";
		exit();
	}elseif($Emp_Nationality==""){
		echo"<script>alert('Nationality can not blank!!!');history.back();</script>";
		exit();
	}elseif(strlen($Emp_Number) < 4){
		echo "<script>alert('Employee number can not less than 4 digit!!!');history.back();</script>";
		exit();
	
	}elseif($Dep_Id==""){
		echo "<script>alert('Please select Department!!!');history.back();</script>";
		exit() ;
	}elseif($Pos_Id==""){
		echo "<script>alert('Please select position!!!');history.back();</script>";
		exit();
	
	}

	$sqlchk = "select * from Employee where Emp_Number = '$Emp_Number'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your Employee ID is duplicate');history.back();</script>";
		exit();
	}	
	$sql  = "insert into Employee " ;
	$sql .= "values('$Emp_Number','$Emp_Name','$Emp_SurName','$Emp_NickName','$Emp_Nationality', " ;
	$sql .= "'$Dep_Id','$Pos_Id','$Emp_Email','$Emp_ExtensionNumber','$Emp_Mobile','$Emp_SpeedDial','$Grp_Id') ";
	mssql_query($sql)or die("error=$sql");

	$log_Type  ='Employee';
	$tub='/';

	$log_Detail ="$Emp_Number";
	$log_Detail .="$tub";
	$log_Detail .="$Emp_Name";	
	$log_Detail .="$tub";
	$log_Detail .="$Emp_SurName";
	$log_Detail .="$tub";
	$log_Detail .="$Emp_Email";
	$log_Detail .="$tub";
	$log_Detail .="$Emp_SpeedDial";
	$log_Action ="Add";
	$timeformat="Y-m-d  H:i:s";
	$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
	$datetime=date($timeformat,$THdt);
	$log_Date=$datetime;
	$log_By=$ses_Usr_Account;
				
	$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
	$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;

	$objQuery = mssql_query($strSQL);
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลเรียบร้อยค่ะ!');";

	echo "</script>"; 
	
		echo "<script>window.location='EmployeeList.php?Usr_IdLogin=$Usr_IdLoginCode';</script>";
		
?>


</body>
</html>
