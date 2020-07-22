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
	include "connect.php";	
	
	$Pos_Name=$_POST['Pos_Name'];
		
	if(empty($Pos_Name))
	{
	echo"<script>alert('please insert Data');history.back();</script>";
		exit();
	}	
	$sqlchk = "select * from Position where Pos_Name = '$Pos_Name'";
	$querychk = mssql_query($sqlchk);
	$num = mssql_num_rows($querychk);
	if($num!=0)
	{
	echo"<script>alert('your data is duplicate');history.back();</script>";
		exit();
	}	
	
	$sql="insert into Position values('$Pos_Name')";
	mssql_query($sql)or die("error=$sql");
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลเรียบร้อยค่ะ!');";
	echo"window.location='PositionSave.php?Usr_IdLogin=$Usr_IdLogin';";   
	echo "</script>"; 	
?>

</body>
</html>
