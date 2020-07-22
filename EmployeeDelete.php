
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ogura Clutch Thailand</title>
</head>

<body>
<?php
include "chksession.php";
include "connect.php";
	$Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
	$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
	$Emp_IdCode=$_GET["Emp_Id"];
	include ("connect.php");
	$sqlchk = " SELECT Emp_Id FROM GroupEmployee WHERE Emp_Id = '$Emp_IdCode'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	
	if($num!= 0)
	{
		echo"<script>alert('Delete does not work because the data is already in Groups');history.back();</script>";
		exit();
	}	
	$sqlchk =  "SELECT Emp_Id FROM EmpAsset WHERE Emp_Id = '$Emp_IdCode'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	
	if($num!= 0)
	{
		echo"<script>alert('Delete does not work because the data is already in Employee AssetIT');history.back();</script>";
		exit();
	}	

	
	$sqllog = "SELECT * FROM Employee WHERE Emp_Id = '$Emp_IdCode'";
	$querylog = mssql_query($sqllog);

	
while($rs=mssql_fetch_array($querylog))
{

	$Emp_Number=$rs[Emp_Number];
				$Emp_Name=$rs[Emp_Name];
				$Emp_SurName=$rs[Emp_SurName];
				$Emp_SpeedDial=$rs[Emp_SpeedDial];
				
	
	$log_Type  ='Employee';
	$tub='/';

	$log_Detail ="ID:$Emp_Number";
	$log_Detail .="$tub";
	$log_Detail .="$tub";
	$log_Detail .="Name:$Emp_Name";	
	$log_Detail .="$tub";
	$log_Detail .="$tub";
	$log_Detail .="Surname:$Emp_SurName";
	$log_Detail .="$tub";
	$log_Detail .="$tub";
	$log_Detail .="SpeedDial:$Emp_SpeedDial";
	$log_Action ="Delete";
	$timeformat="Y-m-d  H:i:s";
	$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
	$datetime=date($timeformat,$THdt);
	$log_Date=$datetime;
	$log_By=$ses_Usr_Account;
				
	$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
	$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;

	$objQuery = mssql_query($strSQL);

}

	$sql = "DELETE FROM Employee WHERE Emp_Id='$Emp_IdCode'";
	mssql_query($sql)or die("error=$sql");
	echo "<script type='text/javascript'>";
	echo "alert('ลบข้อมูลเรียบร้อยค่ะ!');";

	echo "</script>"; 
	
	echo "<script>window.location='EmployeeList.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	
	
?>

</body>
</html>
