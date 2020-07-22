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
			$Usr_Id=$_POST["Usr_Id"];

	for($i=0;$i<count($_POST["chkfri"]);$i++)

		{
			if($_POST["chkfri"][$i] != ""){		
				$Rig_Id=$_POST["chkfri"][$i] ;				
				}
				
//----------------------------------------Check Duplicate Data--------------------------------------------------
	$sqlchk = "SELECT * FROM UserFunction WHERE Rig_Id = '$Rig_Id' AND Usr_Id='$Usr_Id'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your Rights is duplicate');history.back();</script>";
		exit();
	}	
	//-------------------------------------------Add Data-------------------------------------------------
				$strSQL = "INSERT INTO UserFunction VALUES('$Usr_Id','$Rig_Id')";

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
	echo "<script>alert('Add Rights finish');</script>";
	echo "<script>window.location=\"USerAll.php?Usr_IdLogin=$Usr_IdLogin&Usr_Id=$Usr_IdCode\"</script>";
	
?>
</body>
</html>
