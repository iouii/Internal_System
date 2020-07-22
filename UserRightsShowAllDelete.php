<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>    
</head>
<body>

<?php
include "chksession.php";		  
include "connect.php";	
			$_GET["Usr_IdLog"];	
			$Usr_Id=$_POST["Usr_Id88"];
		 
	for($i=0;$i<count($_POST["chkfri"]);$i++)

		{
			if($_POST["chkfri"][$i] != ""){

			$Rig_Id=$_POST["chkfri"][$i] ;
				
				}
	//-------------------------------------------Delete Data-------------------------------------------------
			$strSQL = "delete from UserFunction where Rig_Id ='$Rig_Id' and Usr_Id = '$Usr_Id'";

				$objQuery = mssql_query($strSQL);
				
				
}
	//-----------------------Check Blank Data------------------------------------------------
	if($Rig_Id == ""){					
		echo"<script>alert('Please Select Rights!!!');history.back();</script>";		
		exit();
			
			}		

	$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));  
    $Usr_IdCode=base64_encode(base64_encode("$Usr_Id"));		
	echo "<script>window.location=\"UserRightsShowAll.php?Usr_IdLogin=$Usr_IdLogin&Usr_Id=$Usr_IdCode\"</script>";
	
?>
</body>
</html>
