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
	  

			$Link=$_POST["Link"];
			  $Ast_Id=$_POST["Ast_Id22"];
			 // $Grp_Name_log_add=$_POST["Grp_Name_log"];
			  $ses_Usr_Account=$_SESSION[ses_Usr_Account];
			//  $chkDel=$_POST["chkfri"];
			  //$GrpEmp_Id=$_POST["GrpEmp_Id"];
			  
  
	
			 
	for($i=0;$i<count($_POST["chkfri"]);$i++)

		{
			

			if($_POST["chkfri"][$i] != ""){

			/*
				echo "<br/>" ;
				echo $_POST["chkfri"][$i] ;
				echo "<br/>" ;   
*/
				
				$Sof_Id=$_POST["chkfri"][$i] ;
				
				}
				
			
//----------------------------------------Check Duplicate Data--------------------------------------------------
	//$sqlchk = "select * from GroupEmployee where Grp_Id = '$Grp_Id' and Emp_Id='$Emp_Id'";
				$sqlchk = " select * from ((SoftwareAsset SA inner join AssetIT A on SA.Ast_Id = A.Ast_Id)";
				$sqlchk .= "inner join Software S on S.Sof_Id = SA.Sof_Id)";
				$sqlchk .="where SA.Ast_Id =$Ast_Id and S.Sof_Id=$Sof_Id";	

	$querychk = mssql_query($sqlchk);
	
	while($rs=mssql_fetch_array($querychk))
			{
		$Sof_Name=$rs[Sof_Name];
		$Sof_Version=$rs[Sof_Version];
			
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your Software ($Sof_Name $Sof_Version) is duplicate');history.back();</script>";
				exit() ;
		
	
	}	
	}
	//---------------------------------------------------------------------------------------------------------


	//-------------------------------------------Add Data-------------------------------------------------
			
				$strSQL  = "insert into SoftwareAsset values('$Sof_Id','$Ast_Id') ";

	//--------------------------------------------------------------------------------------------------------
	
	
	
	
				
				$objQuery = mssql_query($strSQL);
			}
//-----------------------------------------------------------------------------------------------------------



	//-----------------------Check Blank Data------------------------------------------------
	if($Sof_Id == ""){
			
		echo"<script>alert('Please Select Software!!!');history.back();</script>";
		exit();

			
			}		
//---------------------------------------------------------------------------------------
	
	
	
	  $Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	  $Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
	  
	   $Ast_IdCode=base64_encode(base64_encode("$Ast_Id"));

	
		
	echo "<script>window.location=\"SoftwareAssetDelete.php?Usr_IdLogin=$Usr_IdLogin&Ast_Id=$Ast_IdCode&Link=$Link\"</script>";
	 
		 

	
?>


</body>
</html>
