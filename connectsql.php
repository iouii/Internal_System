<?php
	$con =  mssql_connect("192.168.10.8","webits","webits12");
	mssql_select_db("Web_news",$con);
	mssql_close($con);
?>