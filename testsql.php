<?php

$host = "192.168.10.8";
$user = "webits";
$pass = "webits12";
$dbname = "web_its";

$sql =mssql_connect($host,$user,$pass);
$sqll =mssql_select_db($dbname,$sql);

if($sqll){
   
    print('nice');

}


?>