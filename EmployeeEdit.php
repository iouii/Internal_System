<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="select.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="jquery.min.js"></script>

    <script src="popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
    </script>
    <script src="bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">
    </script>
    <script src="bootstrap-select.min.js"></script>

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

</head>
<style>
.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 16px !important;
    color: #fff;
    text-align: center !important;
    border-radius: 1px !important;
    border: 1px solid #DDDDDD !important;
}
table{
    font-size:14px;
}
tr{
    border: 1px solid #DDDDDD !important;
}
td{
    border: 1px solid #DDDDDD !important;
}
</style>

<body>
    <?php
include "connect.php";
  @session_start();

    $Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
    

    $Emp_Id=$_GET["Emp_Id"];
    $sqlMem = "SELECT * FROM Employee where Emp_Id='$Emp_Id'";
    $queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
    $rsT= mssql_fetch_array($queryMem); 
    
    

?>
    <?
	include "admin-menu.php";
				
    ?>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 ">
            </div>
            <div class="col-lg-6 col-md-12 col-12 ">
                <form action="EmployeeEditSave_DB.php" method="post" enctype="multipart/form-data" name="form2"
                    id="form2" >
                    <table class="table">

<tr class="thead">
<td colspan="2">
แก้ไขข้อมูลพนักงาน
<input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
</td>
</tr>
<tr>
<td align="center">Employee Number</td>
<td>  <input name="Emp_Number" class='form-control ' type="text" id="Emp_Number"
                                value="<?=$rsT['Emp_Number']?>" size="5" maxlength="5" required /></td>
                                <input name="Emp_NumberOri" type="hidden" id="Emp_NumberOri" value="<?=$rsT['Emp_Number']?>" />
                    <input name="Emp_Id" type="hidden" id="Emp_Id" class='form-control' value="<?=$rsT['Emp_Id']?>" />

</tr>
<tr>
<td align="center">Name</td>

<td><input name="Emp_Name" type="text" class='form-control' id="Emp_Name"
                                value="<?=$rsT['Emp_Name']?>" required /></td>
</tr>
<tr>

<td align="center">Sure Name </td>
<td><input name="Emp_SurName" type="text" id="Emp_SurName" class='form-control' value="<?=trim($rsT['Emp_SurName'])?>" />
</td>
</tr>
<tr>
<td align="center">Nick Name</td>
<td>
<input name="Emp_NickName" type="text" id="Emp_NickName" class='form-control'
                        value="<?=trim($rsT['Emp_NickName'])?>" size="15" maxlength="15" />
</td>
</tr>
                  
   <tr>
   <td align="center">Nationality</td>
   <td>
   <input name="Emp_Nationality" type="text" class='form-control' id="Emp_Nationality"
                        value="<?=$rsT['Emp_Nationality']?>" size="15" maxlength="15" required />
   </td>
   </tr>                     
                   
     <tr>
     <td align="center">Department</td>

     <td>     <?
							
                            include"connect.php"; 
                                $dbquery1=mssql_query("SELECT Dep_Id, Dep_Name FROM Department ORDER BY Dep_Name  ASC"); 
                         ?>
                        <select name="Dep_Id" id="Dep_Id" class='form-control'>
                            <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
                            <option value="<? echo $rs1['Dep_Id'];?>"
                                <?php if (!(strcmp($rs1['Dep_Id'], $rsT['Dep_Id']))) {echo "selected=\"selected\"";} ?>>
                                <? echo $rs1['Dep_Name'];?>
                            </option>
                            <? }?>
                        </select></td>
     </tr>           
            <tr>
            <td align="center">Position</td>
            <td><?
							
                            include"connect.php"; 
                                $dbquery2=mssql_query("SELECT Pos_Id, Pos_Name FROM Position ORDER BY Pos_Name  ASC"); 
                         ?>
                        <select name="Pos_Id" id="Pos_Id" class='form-control'>
                            <? while($rs2=mssql_fetch_array($dbquery2))  { ?>
                            <option value="<? echo $rs2['Pos_Id'];?>"
                                <?php if (!(strcmp($rs2['Pos_Id'], $rsT['Pos_Id']))) {echo "selected=\"selected\"";} ?>>
                                <? echo $rs2['Pos_Name'];?>
                            </option>
                            <? }?>
                        </select></td>
            </tr>           
                      
             <tr>
             <td align="center">Email</td>
             <td><input name="Emp_Email" type="text" class='form-control' id="Emp_Email"
                        value="<?=trim($rsT['Emp_Email'])?>" size="50"  /></td>
             </tr>       
              <tr>
              <td align="center">Extension No</td>
              <td> <input name="Emp_ExtensionNumber" class='form-control' type="text" id="Emp_ExtensionNumber"
                        value="<?=trim($rsT['Emp_ExtensionNumber'])?>" size="10" maxlength="10" /></td>
              </tr>
<tr>
<td align="center">Mobile</td>
<td> <input name="Emp_Mobile" type="text" class='form-control' id="Emp_Mobile"
                        value="<?=trim($rsT['Emp_Mobile'])?>" size="15" maxlength="15" />
</td>
</tr>
<tr>
<td align="center">Speed Dial</td>
<td><input name="Emp_SpeedDial" type="text" class='form-control' id="Emp_SpeedDial"
                        value="<?=trim($rsT['Emp_SpeedDial'])?>" size="10" maxlength="10" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="button" id="button" class="btn btn-primary" value="Save" />
                        <input type="reset" name="button2" id="button2" class="btn btn-warning" value="Clear" /></td>
</tr>

                    </table>
                </form>

<br>
            </div>
        </div>
    </div>


</body>
<script language="javascript" type="text/javascript">
function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

</html>