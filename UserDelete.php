<?php

	include "chksession.php";
	include ("connect.php");
	//echo $Dept_Id ;		
	$Usr_IdLogin=$_GET["Usr_IdLogin"];
	$Usr_IdDelCode=$_GET["Usr_Id"];
	$Usr_Id=base64_decode(base64_decode("$Usr_IdDelCode"));		 
	$sqlchk =  "delete from UserFunction where Usr_Id = '$Usr_Id'";
	$querychk = mssql_query($sqlchk);
	$querychk = "delete from Users where Usr_Id='$Usr_Id'";
	mssql_query($querychk)or die("error=$querychk");
	echo "<script>window.location='UserAll.php?Usr_IdLogin=$Usr_IdLogin'</script>";
	 
	 
?>

