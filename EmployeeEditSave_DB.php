<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Ogura Clutch Thailand</title>

</head>

<body>
<? 
		$Usr_IdLogin=$_POST["Usr_IdLogin"];
		$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));
		include "chksession.php";
	
		include "connect.php";	
		$Emp_Id=$_POST['Emp_Id'];
		$Emp_Number=$_POST['Emp_Number'];
		$Emp_NumberOri=$_POST['Emp_NumberOri'];
		$Emp_Name=$_POST['Emp_Name'];
		$Emp_SurName=$_POST['Emp_SurName'];
		$Emp_NickName=$_POST['Emp_NickName'];
		$Emp_Nationality=$_POST['Emp_Nationality'];
		$Dep_Id=$_POST['Dep_Id'];
		$Pos_Id=$_POST['Pos_Id'];
		$Emp_Email=$_POST['Emp_Email'];
		$Emp_ExtensionNumber=$_POST['Emp_ExtensionNumber'];
		$Emp_Mobile=$_POST['Emp_Mobile'];
		$Emp_SpeedDial=$_POST['Emp_SpeedDial'];
		
		
		@session_start();
		$Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
		$ses_Usr_Account=$_SESSION[ses_Usr_Account];
		$Emaillink= $_SESSION['Emaillink'];
	

		$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));


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
	$CheckDuplicate = 0 ;
	
	if($Emp_Number!=$Emp_NumberOri)
	{
		$sqlchk = "select Emp_Number from Employee where Emp_Number = '$Emp_Number'";
		$querychk = mssql_query($sqlchk);
		$num = mssql_num_rows($querychk);
		
		if($num!=0){
			$CheckDuplicate = 1 ;
		}else{
			$CheckDuplicate = 0 ;
		}
	
	}
	if($CheckDuplicate==1)
	{
	
		echo"<script>alert('Your Number $Emp_Number is duplicate ');history.back();</script>";
		exit();
		
	}else{
		
		$sql  = "update Employee ";
		$sql .= " set Emp_Number='$Emp_Number',Emp_Name='$Emp_Name',Emp_SurName='$Emp_SurName',Emp_NickName='$Emp_NickName',";
		$sql .= " Emp_Nationality='$Emp_Nationality',Dep_Id='$Dep_Id',Pos_Id='$Pos_Id',Emp_Email='$Emp_Email',"; 
		$sql .= "Emp_ExtensionNumber='$Emp_ExtensionNumber',Emp_Mobile='$Emp_Mobile',Emp_SpeedDial='$Emp_SpeedDial'";
		$sql .=" where Emp_Id = '$Emp_Id' ";

		mssql_query($sql)or die("error=$sql");
	

	}


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
	$log_Action ="Edit";
	$timeformat="Y-m-d  H:i:s";
	$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
	$datetime=date($timeformat,$THdt);
	$log_Date=$datetime;
	$log_By=$ses_Usr_Account;
				
	$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
	$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;

	$objQuery = mssql_query($strSQL);
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลเรียบร้อยค่ะ!');";

	echo "</script>"; 
	echo "<script>window.location='EmployeeList.php?Usr_IdLogin=$Usr_IdLogin';</script>"; 

?>
              

</body>
</html>
