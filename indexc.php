<?php
$ToDay = date("Y-m-d");
$to = "2020-06-21";
$tom ="2020-06-19";

$tome = strtotime($tom)/ ( 60 * 60 * 24 );
$today = strtotime($ToDay)/ ( 60 * 60 * 24 );  
$too = strtotime($to)/ ( 60 * 60 * 24 );
$cal  = $today - $tome;

 


if($cal == -1 OR $cal > 0 ){

    echo $cal;

 }else{

    echo"11";
    echo $cal;
 }



?>