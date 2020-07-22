<?php 
include "connectOCT.php";
require_once "Classes/phpmailer/class.phpmailer.php";


//Send Email Outlook
//SQL
$sqlmail = "SELECT LName_EN,DatePasSportExpire,In_Email FROM EmpList WHERE Nation = 'Japanese' AND DatePasSportExpire IS NOT NULL";
$querymail = mssql_query($sqlmail);
$rsmail = mssql_num_rows($querymail);
$arrEmail = array();
$i = 0;
while($rsquery = mssql_fetch_array($querymail)){
 	$NameEml = $rsquery["LName_EN"];
 	$PasExpEml = $rsquery["DatePasSportExpire"]; 
 	$Eml = $rsquery["In_Email"];
//getDate
 	$today =  getDate(date("U"));//Getdate Current

	$d1 = strtotime($PasExpEml);
	$d2 = ceil(($d1-time())/60/60/24);

 //getDate In sql Date PassExpire

 //getDate
	if($d2 == 15 || $d2 == 10){
			//Variable
			$account="";
			$password="";
			$to= $Eml;
			$from="HR-System@ogura-thai.com";
			$from_name="Passport Exprire";
			if($NameEml == "Arai"){
			$msg ="<h3><b> Dear ".$NameEml." Shachou </b></h3>";
			}else{
			$msg ="<h3><b> Dear ".$NameEml." San </b></h3>";	
			}
			$msg .="<p><dd>Your passport  expire  will be in ".$d2." day. In date ".$PasExpEml." So please contact HR department  for proceed to the next step <p></dd> <br>"; // HTML message
			$msgs ="<p>*This Email Send Automatic You can't reply this e-mail </p>";
			$subject="Passport Expire";
			$ccmail = array(
							't-limsakul@ogura-thai.com' => 'Thidarat Limsakul',
							'w-limsakul@ogura-thai.com' => 'Waranya Limsakul',
							'a-santitham@ogura-thai.com' => 'Und Kasinnthut',
							't-intajorn@ogura-thai.com' => 'Titikarn  Intajorn'
							);
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
			foreach($ccmail as $email => $name){
				$mail->AddCC($email,$name);
			}

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