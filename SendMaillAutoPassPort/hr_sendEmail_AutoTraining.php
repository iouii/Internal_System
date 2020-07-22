<?php 
include "OCT/connectOCT.php";
require_once "OCT/Classes/phpmailer/class.phpmailer.php";


//Send Email Outlook
//SQL
$sqlmail ="SELECT ETT.Train_NumberWS,ETT.Train_Header,ETT.Train_DateWS,ETT.Train_Status,ETH.Train_SendEmail "; 
$sqlmail .="FROM Emp_TrainingWS_temporary ETT INNER JOIN Emp_TrainingHeader ETH ";
$sqlmail .="ON  ";
$sqlmail .="WHERE Train_Status = 1 ";
$querymail = mssql_query($sqlmail);
$rsmail = mssql_num_rows($querymail);
$arrEmail = array();
$i = 0;
while($rsquery = mssql_fetch_array($querymail)){
 	$numberWs = $rsquery["Train_NumberWS"];
 	$dateWs = $rsquery["Train_DateWS"]; 
 	$headerWs = $rsquery["Train_Header"];
 	$email = $rsquery["Train_SendEmail"];
//getDate
 	$today =  getDate(date("U"));//Getdate Current

	$d1 = strtotime($dateWs);
	$d2 = ceil(($d1-time())/60/60/24);

 //getDate In sql Date PassExpire
	echo "<script>alert($d);</script>";
 //getDate
	if($d2 == 1){
			//Variable
			$account="";
			$password="";
			$to= $email;
			$from="HR-System@ogura-thai.com";
			$from_name="Alert Uploade list name employee into working standard ";		
			$msg ="<h3><b> Dear  San </b></h3>";	
			$msg .="<p><dd> Please update list name of employee into WS number : ".$numberWs." ".$headerWs." <p></dd> <br>"; // HTML message
			$msgs ="<p>*This Email Send Automatic You can't reply this e-mail </p>";
			$subject="Update the data working standard";
			/*$ccmail = array(
							't-limsakul@ogura-thai.com' => 'Thidarat Limsakul',
							'w-limsakul@ogura-thai.com' => 'Waranya Limsakul',
							'a-santitham@ogura-thai.com' => 'Und Kasinnthut',
							't-intajorn@ogura-thai.com' => 'Titikarn  Intajorn'
							);*/
			//Variable

			$mail = new PHPMailer();
			$mail->Mailer = "mail";
			$mail->CharSet = 'UTF-8';
			$mail->Host = "smtp.ogura-thai.com";
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
			/*foreach($ccmail as $email => $name){
				$mail->AddCC($email,$name);
			}*

			$sql = "SELECT Name FROM Emp_sendEmailSession WHERE Date_Input = '".date("d/m/y")."' AND Name = '".$NameEml."'";
			$query = mssql_query($sql);
			$rs = mssql_num_rows($query);
			if($rs == 0){
				//Send Mail 
				$mail->send();
				//Send mail
				$sqlip = "INSERT INTO Emp_sendEmailSession (Name,Email,PssExpire,Date_Input,Time_Input)VALUES ('".$NameEml."','".$Eml."','".$PasExpEml."','".date("d/m/y")."','".date("h:m:s")."')";
				$queryip = mssql_query($sqlip);
			}

			//Add CC Email

			//Send Email
			/*if(!$mail->send()){
			 echo "Mailer Error: ".$mail->ErrorInfo;
			}else{
			 echo "E-Mail has been sent";
			}*/
			//Send Email

			//Send Email Outlook
		}

}	

?>