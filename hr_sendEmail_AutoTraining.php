<?php 
include "connectOCT.php";
require_once "phpmailer/class.phpmailer.php";


//Send Email Outlook
//SQL
$sqlmail ="SELECT ETT.Train_NumberWS,ETT.Train_Header,ETT.Train_DateChkSendMail,ETT.Train_Status,WIEmp.Emp_Name,ETT.Trai_NameArea,WIEmp.Emp_Email,ETT.Train_HeaderThai  "; 
$sqlmail .="FROM Emp_TrainingWS_temporary ETT INNER JOIN Emp_TrainingWsHeader ETH ";
$sqlmail .="ON  ETT.Id = ETH.Trai_Temporary_Id  ";
$sqlmail .="INNER JOIN Web_ITS.dbo.Employee  WIEmp ";
$sqlmail .="ON ETH.Train_EmpId = WIEmp.Emp_Number ";
$sqlmail .="WHERE Train_Status = 1 ";
$querymail = mssql_query($sqlmail);
$rsmail = mssql_num_rows($querymail);
$arrEmail = array();
$i = 0;

while($rsquery = mssql_fetch_array($querymail)){
 	$numberWs = $rsquery["Train_NumberWS"];
 	$dateWs = $rsquery["Train_DateChkSendMail"]; 
 	$headerWs = $rsquery["Train_Header"];
 	$nameTo = $rsquery["Emp_Name"];
 	$email = $rsquery["Emp_Email"];
 	$process =$rsquery["Trai_NameArea"];
 	$wsThai = $rsquery["Train_HeaderThai"];
//getDate
 	$today =  getDate(date("U"));//Getdate Current

	$d1 = strtotime($dateWs);
	$d2 = ceil((time()-$d1)/60/60/24); 

 //getDate In sql Date PassExpire
	//echo "<script>alert($d2);</script>";
 //getDate

	if($d2 > 7 ){

			//Variable
			$account="";
			$password="";
			$to= $email; //'a-getpiboon@ogura-thai.com';
			$from="HR-System@ogura-thai.com";
			$from_name="Alert Uploade list name employee into working standard ";		
			$msg ="<h3><b> Dear K.".$nameTo." </b></h3>";	
			$msg .="<p><dd> Please update list name of employee into WS number : ".$numberWs.". <br>  WS Name : ".$headerWs." ".iconv("tis-620", "UTF-8",$wsThai)." <br> Process : ".$process." <br>  Because due 7 day  <p></dd> <br>"; // HTML message
			$msg .="<p><dd>กรุณาอัพเดทรายชื่อพนักงานไปยัง Working standard ของคุณ เลขที่ WS : ".$numberWs."<br> ";
			$msg .="ชื่อ WS : ".$headerWs." ".iconv("tis-620", "UTF-8",$wsThai)."<br>";
			$msg .="กระบวนการ : ".$process."<br>";
			$msg .="เนื่องจากครบกำหนด 7 วันที่จะต้องเพิ่มข้อมูล</dd></p><br>";
			$msgs ="<p>*This Email Send Automatic You can't reply this e-mail </p>";
			$subject="Update the data working standard because due 7 day";
			$ccmail = array(
								't-limsakul@ogura-thai.com' => 'Thidarat Limsakul',
								'a-getpiboon@ogura-thai.com' => 'Aneg Getpiboon',
								'p-boonhor@ogura-thai.com' => 'pongpipat boonhor'
							);
			//Variable Working Standard Name:

			$mail = new PHPMailer();
			$mail->Mailer = "mail";
			$mail->CharSet = 'UTF-8';
			//$mail->Host = "smtp.ogura-thai.com";
			$mail->SMTPAuth= true;
			$mail->Port = 25;
			//$mail->Username= $account;
			//$mail->Password= $password;
			$mail->SMTPSecure = 'tls';
			$mail->From = $from;
			$mail->FromName= $from_name;
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $msg.$msgs;
			$mail->addAddress($to);

			//Add CC Email
			foreach($ccmail as $emails => $name){
				$mail->AddCC($emails,$name);
			}

			$sql = "SELECT Name FROM Emp_sendEmailSession WHERE Date_Input = '".date("d/m/y")."' AND Name = '".$nameTo."' AND WSnumber = '".$numberWs."' AND WSLine = '".$process."'";
			$query = mssql_query($sql);
			$rs = mssql_num_rows($query);
			if($rs == 0){
				//Send Mail 
				$mail->send();
				//Send mail
				$sqlip = "INSERT INTO Emp_sendEmailSession (Name,Email,PssExpire,Date_Input,Time_Input,WSnumber,WSLine)VALUES ('".$nameTo."','".$email."','".$dateWs."','".date("d/m/y")."','".date("h:m:s")."','".trim($numberWs)."','".trim($process)."')";
				$queryip = mssql_query($sqlip);
			}

			//Add CC Email
			
			
		}

}	

?>