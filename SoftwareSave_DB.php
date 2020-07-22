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


              <?php
			  
			  $Usr_IdLogin=$_POST["Usr_IdLogin"];
			  $Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));

			  
			  /*
			 echo "$Ast_Ip";
			  echo "<br>";
			  echo "$Ast_ReceiveDate";
			    echo "<br>";
			 echo "$Ast_Warranty";
			   echo "<br>";
			  echo "$Ast_Type";
			    echo "<br>";
			 echo "$Ast_OSLicense";
			   echo "<br>";
			 echo "$Ast_OSInstalled";
			  echo "$Dep_Id";
			   echo "$Pos_Id";
			    echo "$Emp_Email";
			 echo "$Emp_ExtensionNumber";
			  echo "$Emp_Mobile";
			    echo "$Emp_SpeedDial";
			 */

		//$Sof_Id=$_POST[Sof_Id];
		$Sof_SerialCode=$_POST[Sof_SerialCode];
		$Sof_SerialNo=$_POST[Sof_SerialNo];
		$Sof_Name=$_POST[Sof_Name];
		$Sof_Version=$_POST[Sof_Version];
		$Sof_ReceiveDate=$_POST[Sof_ReceiveDate];
		$Sof_ExpireDate=$_POST[Sof_ExpireDate];
		$Sof_Desc1=$_POST[Sof_Desc1];
		$Sof_Desc2=$_POST[Sof_Desc2];
		$Sof_Desc3=$_POST[Sof_Desc3];
		$Sof_Note=$_POST[Sof_Note];
			
		
		
	include "connect.php";	


		
 if($Sof_SerialCode=="") 
	{
		echo"<script>alert('Serial Code can not blank!!!');history.back();</script>";
		exit();
	}elseif($Sof_SerialNo==""){
		echo"<script>alert('Serial Number can not blank!!!');history.back();</script>";
		exit();
	}elseif($Sof_ReceiveDate==""){
		echo"<script>alert('Receive Date  can not blank!!!');history.back();</script>";
		exit();
	}
	//------------------------Null to (-)-------------------------------------------------------------------------------------------------------------------------
	/*
		if($Emp_SurName==""){
		$Emp_SurName="-";
		
			}
			if($Emp_NickName==""){
		$Emp_NickName="-";
	
	}	
	if($Emp_Email==""){
		$Emp_Email="-";
		
			}
			if($Emp_ExtensionNumber==""){
		$Emp_ExtensionNumber="-";
		
	
	}	
	if($Emp_Mobile==""){
		$Emp_Mobile="-";
		
			}
			if($Emp_SpeedDial==""){
		$Emp_SpeedDial="-";
	
	}	
*/
	//--------------------------------------------------------------------------------------------------------------------------------------------------
	$sqlchk = "select * from Software where  Sof_SerialCode = '$Sof_SerialCode'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('Your Serial Code $Sof_SerialCode is duplicate');history.back();</script>";
		exit();
	}
	
			$Sof_SerialCode=$_POST[Sof_SerialCode];
		$Sof_SerialNo=$_POST[Sof_SerialNo];
		$Sof_Name=$_POST[Sof_Name];
		$Sof_Version=$_POST[Sof_Version];
		$Sof_ReceiveDate=$_POST[Sof_ReceiveDate];
		$Sof_ExpireDate=$_POST[Sof_ExpireDate];
		$Sof_Desc1=$_POST[Sof_Desc1];
		$Sof_Desc2=$_POST[Sof_Desc2];
		$Sof_Desc3=$_POST[Sof_Desc3];
		$Sof_Note=$_POST[Sof_Note];

	
		
	$sql  = "insert into Software " ;
	$sql .= "values('$Sof_SerialCode','$Sof_SerialNo','$Sof_Name','$Sof_Version','$Sof_ReceiveDate', " ;
	$sql .= "'$Sof_ExpireDate','$Sof_Desc1','$Sof_Desc2','$Sof_Desc3','$Sof_Note') ";


	mssql_query($sql)or die("error=$sql");
		echo "<script>window.location='SoftwareList.php?Usr_IdLogin=$Usr_IdLoginCode';</script>";
		
		?>


</body>
</html>
