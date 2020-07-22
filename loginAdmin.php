<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=9">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<title>Login</title>
<!--position text and button-->
	<style>
		 body{

		 	margin:0 auto;
		 	width:400px;
		 	/*margin-top:200px;*/
		 	background:#e6ffff;
		 
		 }
	 table{

		 	background:#b3e6ff;
		 	border-radius:20px ;

		 }
		 tr,th,td{
		 	padding:15px;
		 	color: #999966;
		 }
		 	
	</style>

<!--position text and button-->

<!--popup -->
	<script type="text/javascript">
			function exit(){
			
				window.close();
			}
			
	</script>

<!--popup -->

</head>
<body>
<img src="img/oct.png" style="width:397px;border:2px solid #33adff">
<form name ="form1" method="post" action="Load_login.php">
	<br><table >
		<tr>
			<th>
				<h1 style="color:#3d3d29;">Login:</h1>
			</th>
		</tr>
		<tr>
			<th></th>
		</tr>
		<tr>
			<th>UserName: <input type="text" name="user" placeholder="ชื่อ" style="width:160px;"></th>
			<th>PassWord: <input type="password" name="password" placeholder="พาสเวริด์" style="width:160px;"><br></th>
		</tr>

		<tr>
			<td></td>
			<td>
				<input class="btn btn-info" type="submit" name="save" value="LOGIN" style="font-size:18px; ">
				<input class="btn btn-info" type="button" name="exits" onclick="exit()" value="EXIT" style="font-size:18px;" >
			</td>
		</tr>
		
	</table>
</form>

</body>
<script type="text/javascript">
	
</script>
</html>
