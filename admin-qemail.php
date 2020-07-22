<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <title>Document</title>
</head>
<style>
.imgk {
    background: #fff;
    border: none;
}

.table {
    border: 1px solid #fff !important;

    text-align: center !important;
    border-radius: 3px !important;
}
.hoz {
    background-color: #e6e6e6 !important;
}
.hoz:hover{
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
<? 
include "connect.php";
     
@session_start();
$Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
$sqlMem = "select * from Employee where Emp_Id='$Emp_Id'";
$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
$rsT= mssql_fetch_array($queryMem);
?>
<?php 
include "connect.php";
include "chksession.php";    
$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
$EDepId= $_POST["EDepId"];
$i=1;
$dbquery ="SELECT Employee.Emp_Id, Employee.Emp_ExtensionNumber,Employee.Emp_SurName,Employee.Emp_SpeedDial,Employee.Emp_Mobile, Employee.Emp_Name,Employee.Pos_Id,Employee.Dep_Id ,Employee.Emp_Nationality,Employee.Emp_Email,Employee.Emp_NickName ,Department.Dep_Id ,Department.Dep_Name,Position.Pos_Id,Position.Pos_Name   
      FROM ((Employee 
        INNER JOIN Department ON Employee.Dep_Id  = Department.Dep_Id )
        INNER JOIN Position ON Employee.Pos_Id  = Position.Pos_Id)
        WHERE  ( Department.Dep_Name LIKE '%$EDepId%') AND ( Employee.Emp_Name LIKE '$EEmpName%')  AND ( Employee.Emp_NickName LIKE '$EEmpNickName%' )  
        ORDER BY  Position.Pos_Name ASC " ;
    $query = mssql_query($dbquery);
    if(mssql_num_rows($query) <1){
        echo "<h4>No Data</h4>";        
        }else{
    echo"<br><br>";
    echo"<table class='table' id='myTable'>";
	echo"<thead >";
    echo "<tr class='thead'>
    <td>No.</td>
    <td >NickName</td>
    <td >Name</td>
    <td >SurName</td>    
    <td >Position</td>
    <td >Department</td>
    <!--<td >Asset</td>-->
    <td >Edit</td>
    <td >Delete</td>
    </tr>";

    while($qry=mssql_fetch_array($query)){ 
       
    $Emp_Id=$qry[Emp_Id];
    $Emp_Number=$qry[Emp_Number];
    $Emp_Name=$qry[Emp_Name];
    $Emp_SurName=$qry[Emp_SurName];
    $Emp_NickName=$qry[Emp_NickName];
    $Emp_Nationality=$qry[Emp_Nationality];
    $Dep_Id=$qry[Dep_Id];
    $Pos_Id=$qry[Pos_Id];
    $Emp_Email=$qry[Emp_Email];
    $Emp_ExtensionNumber=$qry[Emp_ExtensionNumber];
    $Emp_Mobile=$qry[Emp_Mobile];
    $Emp_SpeedDial=$qry[Emp_SpeedDial];
    $Dep_Name=$qry[Dep_Name]; 
    $Pos_Name=$qry[Pos_Name];
    
        ?>
<?echo" <tr>  ";?>
<? echo"<td > $i </td>"; ?>
<? $i++; ?>
<? echo"<td> $Emp_NickName </td>"; ?>
<? echo"<td> $Emp_Name </td>"; ?>
<? echo"<td> $Emp_SurName </td>"; ?>
<? echo"<td> $Pos_Name </td>"; ?>
<? echo"<td> $Dep_Name </td>"; ?>

<? echo"<td ><A HREF=\"EmployeeEdit.php?Usr_IdLogin=$Usr_IdLogin&Emp_Id=$Emp_Id\" target=_top >
    <IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a>"; ?>
<? echo" <td ><A HREF=\"EmployeeDelete.php?Usr_IdLogin=$Usr_IdLogin&Emp_Id=$Emp_Id\" target=_top  onclick=\" return confirm('Are you sure delete ($Emp_Name  $Emp_SurName)  ') \">
    <IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a>
</td>
"; ?>
<?echo"</tr>";?>
<?}?>
<?echo"</table>";?>
<?}?>
</body>
</html>

