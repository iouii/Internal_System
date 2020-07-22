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

<? 		
	include "connect.php";	
	
 			$Usr_IdLogin=$_POST["Usr_IdLogin"];	
			 $Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));

	
			$Rig_Name=$_POST['Rig_Name'];
			$Rig_Id=$_POST['Rig_Id'];
			$Rig_PageLink=$_POST['Rig_PageLink'];
			
		
	if($Rig_Name=="") 
	{
		echo"<script>alert('Button name can not blank!!!');history.back();</script>";
		exit();
	}elseif($Rig_PageLink==""){
		echo"<script>alert('Link button can not blank!!!');history.back();</script>";
		exit();
		
		}		
		
	$sqlchk = "select * from Rights where Rig_Name = '$Rig_Name' or Rig_PageLink = '$Rig_PageLink'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your Button is duplicate');history.back();</script>";
		exit();
	}					
	$log_Type  ='Rights';
	$tub='/';
	$log_Detail  ="$Rig_Name";
	$log_Detail .="$tub";
	$log_Detail .="$Rig_PageLink";
	$log_Action ="Add";	
	$timeformat="Y-m-d  H:i:s";
	$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
	$datetime=date($timeformat,$THdt);	
	$log_Date=$datetime;
	$log_By=$ses_Usr_Account;

				$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
				$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;

				
				$objQuery = mssql_query($strSQL);
	$sql="insert into Rights values('$Rig_Name','$Rig_PageLink')";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='ButtonSave.php?Usr_IdLogin=$Usr_IdLoginCode';</script>";
	
?>

</body>
</html>
