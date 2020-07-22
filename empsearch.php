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

    <title>OguraClutch</title>
</head>
<style>
.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 16px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}
tr{
    border: 1px solid #ddd !important;
}
td{
    border: 1px solid #ddd !important;
}
table{
    font-size:14px;
}
.mr-2{
    font-weight: bold !important;
}
.sub{
    background-color:#1C83FA;
}

</style>

<?php
$dbquery_position=mssql_query(" SELECT Pos_Name,Pos_Id FROM Position ORDER BY Pos_Name  ASC"); 

$dbquery_department=mssql_query(" SELECT Dep_Name,Dep_Id FROM Department ORDER BY Dep_Name  ASC"); 

$dbquery_nationality=mssql_query(" SELECT DISTINCT Emp_Nationality FROM Employee "); 

$dbquery_group=mssql_query(" SELECT  * FROM Groups "); 

?>
<div class="container-fluid ">
    <div class="row">       
        <div class="col-lg-8 col-md-12 col-12 ">
            <table class="table the ">  
               <tr class="thead">
               <td colspan="4" align="center">ค้นหาข้อมูลพนักงาน</td>
               </tr>
                    <tr >
                        <td align="right">
                            Name 
                        </td>
                        <td>
                            <input type="text" id="EmpName" class="form-control" aria-describedby="passwordHelpInline"
                                name="EmpName" onkeyup="ShowEmail();">
                        </td>
                        <td align="right">
                            Nick Name 
                        </td>
                        <td>
                            <input type="text" id="EmpNickName" class="form-control"
                                aria-describedby="passwordHelpInline" name="EmpNickName" onkeyup="ShowEmail();">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                           Department
                        </td>
                        <td>
                            <select name="DepId" id="DepId" OnChange="ShowEmail();" class='custom-select'>
                                <option value="">Department All</option>
                                <? while($qry=mssql_fetch_array($dbquery_department))  { ?>
                                <option value="<? echo $qry['Dep_Name'];?>">
                                    <? echo $qry['Dep_Name'];?>
                                </option>
                                <? }?>
                            </select>
                        </td>
                        <td align="right">

                            Position
                        </td>
                        <td>
                            <select name="PosId" id="PosId" OnChange="ShowEmail();" class='custom-select'>
                                <option value="">Position All</option>
                                <? while($qry=mssql_fetch_array($dbquery_position))  { ?>
                                <option value="<? echo $qry['Pos_Name'];?>">
                                    <? echo $qry['Pos_Name'];?>
                                </option>
                                <? }?>
                            </select>
                        </td>
                    </tr>
               
            </table>

        </div>

        <div class="col-lg-2 col-md-12 col-12 ">
        <table class='table'>
        <tr class="thead"><td  align="center">เพิ่มข้อมูลพนักงาน</td></tr>
        <tr>
        <td align="center"><a href='EmployeeSave.php?Usr_IdLogin=' class="btn btn-info" role="button" <?
                        echo"$Usr_IdLoginCode"; ?>'>+ AddEmployee</a></td>
        </tr>
        </table>
       
        </div>
        <div class="col-lg-2 col-md-12 col-12 ">
        <table class='table'>
        <tr class="thead"><td  align="center">ค้นหาข้อมูล Asset IT</td></tr>
        <tr>
        <td align="center"><a href='EmployeeAndCom.php?Usr_IdLogin=' class="btn btn-info" role="button" <?
                        echo"$Usr_IdLoginCode"; ?>'>AssetIt</a></td>
        </tr>
        </table>
        
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 ">
            <div id="ShowEmail"></div>
        </div>
    </div>
</div>