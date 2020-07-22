 <?
 	include "chksession.php";
	include "connect.php";	
	  $Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	  $Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
 ?>
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

<body>
<? 
	include "connect.php";	
	$Rig_Id=$_POST['Rig_Id2'];	
	$Rig_Name=$_POST['Rig_Name2'];
	$Rig_PageLink=$_POST['Rig_PageLink2'];
	$Rig_NameOri=$_POST['Rig_NameOri'];
	$Rig_PageLinkOri=$_POST['Rig_PageLinkOri'];
			$ses_Usr_Account=$_SESSION[ses_Usr_Account];	
	if($Rig_Name=="") 
	{
		echo"<script>alert('Button name can not blank!!!');history.back();</script>";
		exit();
	}elseif($Rig_PageLink==""){
		echo"<script>alert('Link button can not blank!!!');history.back();</script>";
		exit();
		
		}	
	$CheckDuplicate = 0 ;
	
	if($Rig_Name != $Rig_NameOri )
	{
	$sqlchk = "select Rig_Name from Rights where Rig_Name = '$Rig_Name' ";
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
		echo"<script>alert('Your Rights name ($Rig_Name) is duplicate ');history.back();</script>";
		exit();
		
	}else{
		
	  		$sql="update Rights set 
			Rig_Name = '$Rig_Name' ,Rig_PageLink = '$Rig_PageLink'				
			where Rig_Id = '$Rig_Id'";
			mssql_query($sql)or die("error=$sql");
	}
	$log_Type  ='Rights';
	$tub='/';
	$log_Detail  ="$Rig_Name";
	$log_Detail .="$tub";
	$log_Detail .="$Rig_PageLink";
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
