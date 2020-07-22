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
			 
			$Grp_Id=$_POST["Grp_Id22"];
			$Grp_Name_log_add=$_POST["Grp_Name_log"];
			$ses_Usr_Account=$_SESSION[ses_Usr_Account];

			for($i=0;$i<count($_POST["chkfri"]);$i++)

				{			
			if($_POST["chkfri"][$i] != "")
				{				
				$Emp_Id=$_POST["chkfri"][$i] ;				
				}

//--------------------------------variable log add------------------------------------------------------
			$strSQL  = " select * from ((((GroupEmployee GE inner join Employee E on GE.Emp_Id = E.Emp_Id)";
			$strSQL .= "inner join Groups G on G.Grp_Id = GE.Grp_Id)";
			$strSQL .="inner join Department D on D.Dep_Id = E.Dep_Id)";
			$strSQL .="inner join Position P on P.Pos_Id = E.Pos_Id)";
			$strSQL .="where GE.Grp_Id =$Grp_Id and E.Emp_Id=$Emp_Id";					
			$querysh = mssql_query($strSQL);

			while($rs=mssql_fetch_array($querysh))
			{

			$Emp_Id2=$rs[Emp_Id];
			$Emp_Name=$rs[Emp_Name];
			$Emp_NickName=$rs[Emp_NickName];
			$Dep_Id=$rs[Dep_Id];
			$Pos_Id=$rs[Pos_Id];
			$Dep_Name=$rs[Dep_Name]; 
			$Pos_Name=$rs[Pos_Name];
	
				
			$log_Type  ='Groups';
			$log_Type .=' ';
			$log_Type .="$Grp_Name_log_add";
				
			$tub='/';
			$log_Detail  ="$Emp_Name";
			$log_Detail .="$tub";
			$log_Detail .="$Emp_NickName";
			$log_Detail .="$tub";
			$log_Detail .="$Dep_Name";
			$log_Detail .="$tub";
			$log_Detail .="$Pos_Name";
	

			$log_Action ="Delete";

			$timeformat="Y-m-d  H:i:s";
			$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
			$datetime=date($timeformat,$THdt);			
			$log_Date=$datetime;	
			$log_By=$ses_Usr_Account;

//-------------------------------Add Log--------------------------------------------------------------------

				$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
				$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;

//-------------------------------------------Delete Data-------------------------------------------------
				$delSQL = "delete from GroupEmployee where Grp_Id ='$Grp_Id' and Emp_Id = '$Emp_Id'";
				
//--------------------------------------------------------------------------------------------------------------
	
				$objQuery = mssql_query($strSQL);
				$objQuery .= mssql_query($delSQL);
				
				}
				}
//-----------------------Check Blank Data------------------------------------------------
	if($Emp_Id == "")
			{
			
		echo"<script>alert('Please Select Members!!!');history.back();</script>";
		exit();

			
			}		
//---------------------------------------------------------------------------------------
	
				$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
				$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));	  
				$Grp_IdCode=base64_encode(base64_encode("$Grp_Id"));
	
		
	 echo "<script>window.location=\"GroupSave.php?Usr_IdLogin=$Usr_IdLogin&Grp_Id=$Grp_IdCode\"</script>";
	
?>
</body>
</html>
