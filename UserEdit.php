<!DOCTYPE html>
<html lang="en">
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
<?php
//mysql_query('SET CHARACTER SET utf8');

	include "chksession.php";
	include "connect.php";
	$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
    $Usr_IdEditCode=$_GET["Usr_Id"];
    $Usr_Id=base64_decode(base64_decode("$Usr_IdEditCode"));
	$sqlMem = "select * from Users where Usr_Id='$Usr_Id'";
	$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
	$rsT= mssql_fetch_array($queryMem);

?>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-12 ">
<h3 class="ed-head">Edit User</h3>
<br>  
<form action="UserEdit_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <div class="form-group row ">
        <label for="Usr_Account" class="col-sm-4 col-form-label">Account:</label>
        <div class="col-sm-8">
        <input name="Usr_Id" type="hidden" id="Usr_Id" value="<?echo($Usr_Id);?>" size="15" maxlength="15" class='form-control in-pu' required />

        <input name="Usr_Account" type="text" id="Usr_Account" value="<?=$rsT['Usr_Account']?>" size="15" maxlength="15" class='form-control in-pu' required />
        </div>
    </div>
    <div class="form-group row">
        <label for="Usr_Password" class="col-sm-4 col-form-label">Password:</label>
        <div class="col-sm-8">
        <input name="Usr_Password" type="password" id="Usr_Password" value="<?=$rsT['Usr_Password']?>" size="10" maxlength="10"class='form-control in-pu'>       
    </div>
</div>
    <div class="form-group row">
        <label for="Usr_Name" class="col-sm-4 col-form-label">Name:</label>
        <div class="col-sm-8">
        <input name="Usr_Name" type="text" id="Usr_Name" value="<?=$rsT['Usr_Name']?>" size="30" maxlength="40"class='form-control in-pu'>      
        </div>
    </div>
    <div class="form-group row">
        <label for="Usr_Surname" class="col-sm-4 col-form-label">Sur Name:</label>
        <div class="col-sm-8">
        <input name="Usr_Surname" type="text" id="Usr_Surname" value="<?=$rsT['Usr_Surname']?>" size="30" maxlength="40"class='form-control in-pu'>

        </div>
    </div>
 <div class="form-group row">
    <label for="Dep_Id" class="col-sm-4 col-form-label">Department :</label>
        <div class="col-sm-8">
        <?							
            include"connect.php"; 
                $dbquery1=mssql_query("SELECT Dep_Id, Dep_Name FROM Department ORDER BY Dep_Name  ASC"); 
            ?>
        <select name="Dep_Id" id="Dep_Id" class='form-control' required>
            <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
            <option value="<? echo $rs1['Dep_Id'];?>"
                <?php if (!(strcmp($rs1['Dep_Id'], $rsT['Dep_Id']))) {echo "selected=\"selected\"";} ?>>
                <? echo $rs1['Dep_Name'];?>
            </option>
            <? }?>
        </select>
        </div>
        </div>
        <div class="form-group row">
            <label for="Pos_Id" class="col-sm-4 col-form-label">Position :</label>
            <div class="col-sm-8">
        <?							
            include"connect.php"; 
                $dbquery2=mssql_query("SELECT Pos_Id, Pos_Name FROM Position ORDER BY Pos_Name  ASC"); 
            ?>
        <select name="Pos_Id" id="Pos_Id" class='form-control ' required>
            <? while($rs2=mssql_fetch_array($dbquery2))  { ?>
            <option value="<? echo $rs2['Pos_Id'];?>"
                <?php if (!(strcmp($rs2['Pos_Id'], $rsT['Pos_Id']))) {echo "selected=\"selected\"";} ?>>
                <? echo $rs2['Pos_Name'];?>
            </option>
            <? }?>
        </select>
        </div>
        </div>
            <center>
            <hr>
                <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
                <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-primary" />
                <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
            </center>
             </div>

        </form>
        </div>
                
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../js/logging.js'></script>
</body>
</html>
