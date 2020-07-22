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
	
	$Loc_Id=$_POST['Loc_Id2'];
	$Loc_Name_Ori=$_POST['Loc_Name2'];
	$Loc_Group_Ori=$_POST['Loc_Group2'];
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
	$CheckDuplicate = 0 ;
	
	if($Loc_Name!=$Loc_Name_Ori and $Loc_Group!=$Loc_Group_Ori )
	{
	$sqlchk = "select * from Location where Loc_Name = '$Loc_Name' and Loc_Group='$Loc_Group' ";
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
	
		echo"<script>alert('Your  $Loc_Name and $Loc_Group is duplicate ');history.back();</script>";
		exit();
		
	}else{
		
			$sql  = "update Location ";
			$sql .= " set Loc_Name='$Loc_Name',Loc_Group='$Loc_Group',Loc_Note='$Loc_Note'";
			$sql .=" where Loc_Id = '$Loc_Id' ";

			mssql_query($sql)or die("error=$sql");
	echo "<script>window.location='LocationSave.php?Usr_IdLogin=$Usr_IdLogin';</script>";	
	}
?>	
              

</body>
</html>
