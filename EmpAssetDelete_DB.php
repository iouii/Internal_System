<!DOCTYPE html>
<html lang="en">

<head>
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
<?php
			  
			include "chksession.php";  
			include "connect.php";	
	  

			$Emp_Id=$_GET["Emp_Id"];
			$Ast_Id=$_GET["Ast_Id"];
			$Grp_Name_log_add=$_POST["Grp_Name_log"];
			$ses_Usr_Account=$_SESSION[ses_Usr_Account];

			$strSQL =" DELETE FROM EmpAsset WHERE Emp_Id ='$Emp_Id' AND Ast_Id ='$Ast_Id' ";
			$objQuery = mssql_query($strSQL);
			$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
			$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
	
			echo "<script>window.top.location=\"EmpAssetDelete.php?Usr_IdLogin=$Usr_IdLogin&Emp_Id=$Emp_Id\"</script>";

?>


</body>

</html>