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

$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));  
$Usr_IdEditCode=$_GET["Usr_Id"];

 ?>
<style>
.btn {
    margin-left: 20px;
}
.table {
    border: 1px solid #fff !important;

    text-align: left !important;
    border-radius: 3px !important;


}

.hoz:hover {
    background-color: #cce4ff !important;

}

.ChkBox {

    margin-left: 8px !important;
}

.bodytable {

    background-color: #fff;
    border: 1px solid #000;
    border-radius: 3px !important;
    margin-top: 5px;
    font-size: 17px;

}

.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 18px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

tr {
    font-size: 12px !important;
}

td {

    border: 1px solid #fff !important;
    font-size: 14px;
}
</style>

<body>

<div class="container-fluid">

<div class="row">
<div class="col-lg-4 col-md-12 col-12 ">

</div>
<div class="col-lg-4 col-md-12 col-12 ">
<h3 class="ed-head">User Rights Edit </h3>


<form action="UserRightsEdit_DB.php" method="post" enctype="multipart/form-data" name="form2"
    id="form2">
    <table class='table' id='myTable'>
        <input name="Usr_Id" type="hidden" id="Usr_Id" value="<?="$Usr_IdEditCode";?>" />
        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
        <?php            

	include "connect.php";		
	$sqlMem = "select * from (Users U INNER JOIN Department D " ;
	$sqlMem .= "ON U.Dep_Id = D.Dep_Id) " ;
	$sqlMem .= "INNER JOIN Position P " ;
	$sqlMem .= "ON U.Pos_Id = P.Pos_Id " ;
	$sqlMem .="where U.Usr_Id='$Usr_Id'";		
	$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");	
	while($rs=mssql_fetch_array($queryMem))
	{
    $Usr_Id=$rs[Usr_Id];
    $Usr_Account=$rs[Usr_Account];
    $Usr_Password=$rs[Usr_Password];
    $Usr_Name=$rs[Usr_Name];
    $Usr_Surname=$rs[Usr_Surname];
    $Dep_Id=$rs[Dep_Id];
    $Pos_Id=$rs[Pos_Id];
    $Dep_Name=$rs[Dep_Name]; 
    $Pos_Name=$rs[Pos_Name];
            
    echo"<tr>";
    echo"<td>Account:</td>";
    echo"<td>$Usr_Account</td>";
    echo"</tr>";		
    echo"<tr>";
    echo"<td>Name:</td>";
    echo"<td>$Usr_Name</td>";
    echo"</tr>";		
    echo"<tr>";
    echo"<td>Department:</td>";
    echo"<td>$Dep_Name</td>";
    echo"</tr>";		
    echo"<tr>";
    echo"<td>Position:</td>";
    echo"<td>$Pos_Name</td>";
    echo"</tr>";
    
		}
	$sqlRig = "select * from Rights ";
		
	$queryRig = mssql_query($sqlRig);
	while($rs=mssql_fetch_array($queryRig))
	{
		$Rig_Id=$rs[Rig_Id];
		$Rig_Name=$rs[Rig_Name];
		$Rig_PageLink=$rs[Rig_PageLink];
		
    echo"<tr>";
    echo"<td>$Rig_Name:</td>";
    echo"<td><span><input type='checkbox' name='chkfri[]' value=$Rig_Id>&nbsp;	$Rig_PageLink</a></span></td>";
    echo"</tr>";		
	}  
	
		
?>
    </table>
    <input type="submit" name="button" id="button" class="btn btn-primary" value="Submit" />
    <input type="reset" name="button2" id="button2" class="btn btn-primary" value="Reset" />
    <a href="UserAll.php?Usr_IdLogin=$Usr_IdLoginCode" class="btn btn-primary">Back</a>


</form>







</body>

</html>