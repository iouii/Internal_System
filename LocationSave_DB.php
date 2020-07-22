 <?
 
 	include "chksession.php";
	include "connect.php";	
		$Usr_IdLoginCode=$_POST["Usr_IdLogin"];	
			 $Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
 
 
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

	$Loc_Name=$_POST['Loc_Name'];
	$Loc_Group=$_POST['Loc_Group'];
	$Loc_Note=$_POST['Loc_Note'];

		
	if(($Loc_Name==""))
	{
		echo"<script>alert('Name can not blank!!!');history.back();</script>";
		exit();
	}elseif($Loc_Group==""){
		echo"<script>alert('Groups can not blank!!!');history.back();</script>";
		exit();
		}

	
	$sqlchk = "select * from Location where Loc_Name = '$Loc_Name' and  Loc_Group ='$Loc_Group'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your $Loc_Name and $Loc_Group  is duplicate');history.back();</script>";
		exit();
	}	
	
	$sql="insert into Location values('$Loc_Name','$Loc_Group','$Loc_Note')";
	mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='LocationSave.php?Usr_IdLogin=$Usr_IdLogin';</script>";
?>

</body>
</html>
