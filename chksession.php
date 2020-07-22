
<?php @session_start();
$ses_userid=$_SESSION[ses_userid];
$ses_Usr_Account=$_SESSION[ses_Usr_Account];
if ($ses_userid<>session_id() or $ses_Usr_Account=="") {
echo" 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center><b><img src=images/icon/wait.gif width='100' height='100'/><br><br>Please Login...<br></center>";
	echo"<meta http-equiv='refresh' content='3;URL=login.php'>"; 	

						unset( $_SESSION['ses_userid']);
						unset( $_SESSION['ses_Usr_Account']);
						session_destroy();

	exit();
} 
?>
   