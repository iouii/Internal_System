<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
<?php
	
	include "connectsql.php";
	
	mssql_select_db("Web_News");
	$strSQL = "SELECT * FROM admin_gallery where U_name = '".$_POST['user']."' and P_word = '".$_POST['password']."' ";
	$objQuery = mssql_query($strSQL);
	$objResult = mssql_fetch_array($objQuery);

	if(!$objResult)
	{
?>
		<!-- โค๊ชแจ้งเตือนการทำงาน-->
		<?php  if ($_POST['save'] != "") { ?>
			<script type="text/javascript">
					alert("Not found data of you");
					window.location="loginAdmin.php";

			</script>
		<?}?>	
		<!-- โค๊ชแจ้งเตือนการทำงาน-->

<?php			
	}
	else
	{
			if(($_POST['user'] == $objResult['U_name'] )&& ($_POST['password'] == $objResult['P_word']))
			{
				
			$_SESSION["user"] = $objResult["U_name"];
			
?>				
			<script type="text/javascript">
					
					 window.open("Add_Gallery.php","Login","toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=600,width=1000,height=550");
					session_destroy();

			</script>
<?php				
			}
			if(($_POST['user'] != $objResult['U_name'] ) || ($_POST['password'] != $objResult['P_word']))
			{
?>			<script type="text/javascript">
					alert("User and password incorrect")
					window.location="loginAdmin.php";
			</script>
				
<?			}
	}
	mssql_close();
?>
