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
		$Emp_Id=$_POST["Emp_Id22"];
		$Grp_Name_log_add=$_POST["Grp_Name_log"];
		$ses_Usr_Account=$_SESSION[ses_Usr_Account];
	for($i=0;$i<count($_POST["chkfri"]);$i++)

		{
			if($_POST["chkfri"][$i] != ""){
		$Ast_Id=$_POST["chkfri"][$i] ;
				
				}
		$sqlchk = " select * from ((((EmpAsset EA inner join Employee E on EA.Emp_Id = E.Emp_Id)";
		$sqlchk .= "inner join AssetIT A on A.Ast_Id = EA.Ast_Id)";
		$sqlchk .="inner join Department D on D.Dep_Id = E.Dep_Id)";
		$sqlchk .="inner join Position P on P.Pos_Id = E.Pos_Id)";
		$sqlchk .="where EA.Ast_Id =$Ast_Id and E.Emp_Id=$Emp_Id";	

	$querychk = mssql_query($sqlchk);
	
	while($rs=mssql_fetch_array($querychk))
			{
		$Ast_Ip=$rs[Ast_Ip];

			
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your IP Address ($Ast_Ip) is duplicate');history.back();</script>";
				exit() ;
		
	
	}	
	}
		$strSQL  = "insert into EmpAsset values('$Emp_Id','$Ast_Id') ";
		$objQuery = mssql_query($strSQL);
			}
	if($Ast_Id == ""){
			
	echo"<script>alert('Please Select Asset IT!!!');history.back();</script>";
		exit();

			}		
	  	$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	  	$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
	echo "<script>window.top.location=\"EmpAssetDelete.php?Usr_IdLogin=$Usr_IdLogin&Emp_Id=$Emp_Id\"</script>";


	
?>


</body>
</html>
