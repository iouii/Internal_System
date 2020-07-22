<!--<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TEst</title>
</head>
<body>
	<form method="post" action="hr_temporary.php"> 
		<p>Id</p><input type="id" name="id">
		<p>Data Update</p><input type="namews" name="namews">
		<input type="submit" name="wq">
	</form>
</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php 
include "connectOCT.php";

	$id = $_POST["id"];
	$namews = $_POST["namews"];
	if($id != " "){
		$sql = "UPDATE Emp_TrainingWsHeader SET CourseHeader = '".$namews."' WHERE Id = '".$id."'";
		mssql_query($sql);
	}
?>