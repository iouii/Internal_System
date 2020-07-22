<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Ogura Clutch Thailand</title>

</head>

<body>
<? 
//---------------------------------------------------------------------------
			  $Usr_IdLogin=$_POST["Usr_IdLogin"];
			  $Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));

//-----------------------------------------------------------------
		include "chksession.php";
	
		include "connect.php";	

//----------------IP Address Ori---------------------------------------------------------------------
		$Sof_SerialCode=$_POST['Sof_SerialCode'];
		$Sof_SerialCodeOri=$_POST['Sof_SerialCodeOri'];
//-------------------------------------------------------------------------------------------
		$Sof_Id=$_POST[Sof_Id];
		//$Sof_SerialCode=$_POST[Sof_SerialCode];
		$Sof_SerialNo=$_POST[Sof_SerialNo];
		$Sof_Name=$_POST[Sof_Name];
		$Sof_Version=$_POST[Sof_Version];
		$Sof_ReceiveDate=$_POST[Sof_ReceiveDate];
		$Sof_ExpireDate=$_POST[Sof_ExpireDate];
		$Sof_Desc1=$_POST[Sof_Desc1];
		$Sof_Desc2=$_POST[Sof_Desc2];
		$Sof_Desc3=$_POST[Sof_Desc3];
		$Sof_Note=$_POST[Sof_Note];


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
//---------------------Check IP Address Duplicate-----------------------------------------------------------	
	$CheckDuplicate = 0 ;
	
	if($Sof_SerialCode!=$Sof_SerialCodeOri)
	{
	$sqlchk = "select Sof_SerialCode from Software where Sof_SerialCode = '$Sof_SerialCode'";
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
	
		echo"<script>alert('Your Serial Code $Sof_SerialCode is duplicate ');history.back();</script>";
		exit();
		
	}else{

			$sql  = "update Software ";
			$sql .= " set Sof_SerialCode='$Sof_SerialCode',Sof_SerialNo='$Sof_SerialNo',Sof_Name='$Sof_Name',Sof_Version='$Sof_Version',";
			$sql .= " Sof_ReceiveDate='$Sof_ReceiveDate',Sof_ExpireDate='$Sof_ExpireDate',Sof_Desc1='$Sof_Desc1',Sof_Desc2='$Sof_Desc2',";
			$sql .= "Sof_Desc3='$Sof_Desc3',Sof_Note='$Sof_Note'";						
			$sql .=" where Sof_Id = '$Sof_Id' ";

			mssql_query($sql)or die("error=$sql");
			echo "<script>window.location='SoftwareList.php?Usr_IdLogin=$Usr_IdLoginCode';</script>"; 
		
	}
	
	
//---------------------------------------------------------------------------------------------------------------	
?>
              

</body>
</html>
