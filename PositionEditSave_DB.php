<!DOCTYPE html>

<head>
    <meta charset="utf-8">
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


    <title>OguraClutch</title>
</head>
 <?
 
 	include "chksession.php";
	include "connect.php";
	
	 $Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	  $Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));	
 
 
 ?>



<body>
<? 
	include "chksession.php";
	include "connect.php";	
	$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));
 
	$Pos_Id=$_POST['Pos_id2'];	
	$Pos_Name=$_POST['Pos_Name2'];
	
	
	if(empty($Pos_Name))
	{
		echo"<script>alert('please insert Position');history.back();</script>";
		exit();
	}		
	
	$sqlchk = "SELECT * FROM Position where Pos_Name='$Pos_Name'";  
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
		echo"<script>alert('your Position is duplicate');history.back();</script>";
	}
		
	$sql="update Position set 
			Pos_Name = '$Pos_Name'			
			where Pos_Id = '$Pos_Id'";
	mssql_query($sql)or die("error=$sql");
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลเรียบร้อยค่ะ!');";
	echo"window.close();";
	echo"self.opener.location.reload();";   
   
  
	echo "</script>"; ?>
              

</body>
</html>
