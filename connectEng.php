<?php
$host="192.168.10.8";
	$user="webits";
	$pass="webits12";
     $dbname="OCTIIS_WEBAPP";
	
	$sql=mssql_connect($host,$user,$pass);
        
	mssql_select_db($dbname,$sql);

?>