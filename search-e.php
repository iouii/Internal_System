<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <link rel="stylesheet" href="unicorn/css/bootstrap.min.css">
    <link rel="stylesheet" href="unicorn/css/unicons.css">
    <link rel="stylesheet" href="unicorn/css/owl.carousel.min.css">
    <link rel="stylesheet" href="unicorn/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="unicorn/css/tooplate-style.css">
    <link rel="stylesheet" href="bbc.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script> 
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>

    <title>Document</title>
</head>
<style>


.meu-ii {
    margin-top: 20px;
    margin-bottom: 20px;
}

select {
    align: right;
    font-size: 15px !important;
}

.fb {
    margin-top: 20px;
    border-radius: 5px;
    padding: 15px;
    background-color: #0288df;
}

.mai-p {
    color: #fff;
    font-size: 17px !important;
}

h3 {
    color: #fff;

}
</style>

 <body>
 <?
 
 	include "chksession.php";
	include "connect.php";	
	
  $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
  $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
					//echo"$Usr_IdLogin";
 
 ?>

     <?
					include "admin-menu.php";
				
     ?>

     <?
     
                    include "email-index.php";

     ?>
