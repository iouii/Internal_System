<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="unicorn/css/bootstrap.min.css">
    <link rel="stylesheet" href="unicorn/css/unicons.css">
    <link rel="stylesheet" href="unicorn/css/owl.carousel.min.css">
    <link rel="stylesheet" href="unicorn/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="unicorn/css/tooplate-style.css">
    <link rel="stylesheet" href="bbc.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>


    <title>OguraClutch</title>
</head>
 <?
 
 	include "chksession.php";
	include "connect.php";
	
	$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));	
 
 
 ?>
<body>
<? 
	include "chksession.php";
	include "connect.php";	

	$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
	$Grp_Id=$_POST[Grp_Id];
	$Grp_Name=$_POST[Grp_Name];
	$Grp_NameOri=$_POST[Grp_NameOri];
	$Grp_Note=$_POST[Grp_Note];
	$ses_Usr_Account=$_SESSION[ses_Usr_Account];	
	if(empty($Grp_Name))
	{
		echo"<script>alert('Groups Name can not blank!!!');history.back();</script>";
		exit();
	}		
	$CheckDuplicate = 0 ;
	
	if($Grp_Name!=$Grp_NameOri)
	{
	$sqlchk = "select Grp_Name from Groups where Grp_Name = '$Grp_Name'";
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
	
		echo"<script>alert('Your Groups name ($Grp_Name) is duplicate ');history.back();</script>";
		exit();
		
	}else{
		
			$sql="update Groups ";
			$sql.= "set Grp_Name = '$Grp_Name', Grp_Note = '$Grp_Note'";
			$sql.= "where Grp_Id = '$Grp_Id'";
			mssql_query($sql)or die("error=$sql");
	}
	$log_Type  ='Groups';
	$tub='/';
	$log_Detail  ="$Grp_Name";
	$log_Detail .="$tub";
	$log_Detail .="$Grp_Note";
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
	echo"window.close();";
	echo"self.opener.location.reload();";   
	echo "</script>"; 
				
				

?>
              

</body>
</html>
