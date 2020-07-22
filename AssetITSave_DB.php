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
		$Ast_Serial=$_POST[Ast_Serial];
		$Ast_Code=$_POST[Ast_Code];
		$Ast_Ip=$_POST[Ast_Ip];
		$Ast_ReceiveDate=$_POST[Ast_ReceiveDate];
		$Ast_Warranty=$_POST[Ast_Warranty];
		$Ast_DocRefer1=$_POST[Ast_DocRefer1];
		$Ast_DocRefer2=$_POST[Ast_DocRefer2];
		$Ast_Type=$_POST[Ast_Type];
		$Ast_Brand=$_POST[Ast_Brand];
		$Ast_Model=$_POST[Ast_Model];
		$Ast_CPUBrand=$_POST[Ast_CPUBrand];
		$Ast_CPUspeed=$_POST[Ast_CPUspeed];
		$Ast_Capacity=$_POST[Ast_Capacity];
		$Ast_Ram=$_POST[Ast_Ram];
		$Ast_Desc1=$_POST[Ast_Desc1];
		$Ast_Desc2=$_POST[Ast_Desc2];
		$Ast_Desc3=$_POST[Ast_Desc3];
		$Ast_Desc4=$_POST[Ast_Desc4];
		$Ast_Desc5=$_POST[Ast_Desc5];
		$Ast_Desc6=$_POST[Ast_Desc6];
		$Ast_OSLicense=$_POST[Ast_OSLicense];
		$Ast_OSInstalled=$_POST[Ast_OSInstalled];
		$Ast_Note=$_POST[Ast_Note];
		$Loc_Id=$_POST[Loc_Id];
	include "connect.php";	
 if($Ast_Serial=="") 
	{
		echo"<script>alert('Serial Number can not blank!!!');history.back();</script>";
		exit();
	}elseif($Ast_ReceiveDate==""){
		echo"<script>alert('Receive Date  can not blank!!!');history.back();</script>";
		exit();
		}elseif($Ast_Type==""){
		echo"<script>alert('Type can not blank!!!');history.back();</script>";
		exit();
	}elseif($Loc_Id==""){
		echo"<script>alert('Location can not blank!!!');history.back();</script>";
		exit();	
	}
		$log_Type  ='AssetIT';
		$tub='/';
		$log_Detail  ="$Ast_Serial";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Code";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Ip";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_ReceiveDate";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Warranty";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_DocRefer1";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_DocRefer2";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Type";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Brand";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Model";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_CPUBrand";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_CPUspeed";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Capacity";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Ram";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc1";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc2";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc3";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc4";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc5";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Desc6";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_OSLicense";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_OSInstalled";
		$log_Detail .="$tub";
		$log_Detail .="$Ast_Note";
		$log_Detail .="$tub";
		$log_Detail .="$Loc_Id";
		$log_Action ="Add";
		$timeformat="Y-m-d  H:i:s";
		$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
		$datetime=date($timeformat,$THdt);
		$log_Date=$datetime;
		$log_By=$ses_Usr_Account;
		$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
		$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;
					$objQuery = mssql_query($strSQL);
		$sql  = "insert into AssetIT " ;
		$sql .= "values('$Ast_Serial','$Ast_Code','$Ast_Ip','$Ast_ReceiveDate','$Ast_DocRefer1', " ;
		$sql .= "'$Ast_DocRefer2','$Ast_Type','$Ast_Brand','$Ast_Model','$Ast_CPUBrand','$Ast_CPUspeed','$Ast_Capacity', ";
		$sql .= "'$Ast_Ram','$Ast_Desc1','$Ast_Desc2','$Ast_Desc3','$Ast_Desc4','$Ast_Desc5','$Ast_Desc6', ";
		$sql .= "'$Ast_OSLicense','$Ast_OSInstalled','$Ast_Note','$Loc_Id','$Ast_Warranty') ";
		mssql_query($sql)or die("error=$sql");
			echo "<script>window.location='AssetITList.php?Usr_IdLogin=$Usr_IdLoginCode';</script>";
			?>
</body>
</html>
