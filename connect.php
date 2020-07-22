<?php
	$host="192.168.10.8";
	$user="webits";
	$pass="webits12";
	$dbname="Web_ITS";
	
	
	
	$sql=mssql_connect($host,$user,$pass);
	$sqll=mssql_select_db($dbname,$sql);
 	
/*	if($sql) {

	print('nice');


 }

*/
?> 

