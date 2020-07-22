<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <title>OguraClutch</title>
</head>
<style>


.hoz:hover{
    background-color: #cce4ff !important;
    
}

.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 16px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #ddd !important;
}
table{
    font-size:14px;
    border: 1px solid #ddd !important;
}

</style>

<body>  

<?php 
include "connect.php";

$EType= "e-mail";
    
if ($EType=="e-mail"){
$i=1;

//--copy all e-mail don't care everting -----------WHERE Emp_Email != ''
$sqlCopy = " SELECT EMP_Email FROM Employee  ";
$queryCopy = mssql_query($sqlCopy);
	while($resultCopy = mssql_fetch_array($queryCopy)){
		$emailCopy1 = $resultCopy[0];
		$emailCopy2 .=";".trim($emailCopy1);
		
	}
	$emailCopy3 =  substr($emailCopy2,1);
    mssql_close();
  //-----------------------------------------------------------  
 
$ENaId= $_POST["ENaId"];
$EDepId= $_POST["EDepId"];
$EPosId= $_POST["EPosId"];
$EEmpName= $_POST["EEmpName"];
$EEmpNickName= $_POST["EEmpNickName"];
 

//--------------------------------------------------------------
   
$dbquery_email ="SELECT DISTINCT Employee.Emp_Id,Employee.Emp_Number, Employee.Emp_ExtensionNumber,Employee.Emp_SurName,Employee.Emp_SpeedDial,Employee.Emp_Mobile, Employee.Emp_Name,Employee.Pos_Id,Employee.Dep_Id ,Employee.Emp_Nationality,Employee.Emp_Email,Employee.Emp_NickName ,Department.Dep_Id ,Department.Dep_Name,Position.Pos_Id,Position.Pos_Name   
      FROM ((Employee 
        INNER JOIN Department ON Employee.Dep_Id  = Department.Dep_Id )
        INNER JOIN Position ON Employee.Pos_Id  = Position.Pos_Id)
        WHERE  (Employee.Emp_Nationality LIKE '$ENaId%') AND ( Department.Dep_Name LIKE '%$EDepId%') AND ( Position.Pos_Name LIKE '$EPosId%' ) AND ( Employee.Emp_Name LIKE '$EEmpName%')  AND ( Employee.Emp_NickName LIKE '$EEmpNickName%' )  
        ORDER BY  Department.Dep_Name ASC " ;
     //ORDER BY  Department.Dep_Name ASC  AND LEN (Employee.Emp_Email) > 0 
$query = mssql_query($dbquery_email);


//------------------------------------------------------------------------------------------------
if(mssql_num_rows($query) <1){

echo "<h4>No Data</h4>";

}else{
  
    echo"<table class='table table-sm' id='myTable'>";
    echo "<tr class='thead'>
    <td >No.</td>
    <td onclick='sortTable(3)'>NickName</td>
    <td onclick='sortTable(4)'>Name</td>
    <td >SurName</td>    
    <td onclick='sortTable(6)'>Position</td>
    <td onclick='sortTable(7)'>Department</td>
    <td >Nationality </td>
    <td >AssetIt </td>
    <td >Edit </td>
    <td >Delete </td>    
    </tr>
    ";
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
<?echo" <tr >  ";?>
<? echo"<td align='center'> $i  </td>"; ?>
<?$i++;  ?>
<!--<? //echo"<td ><input type='checkbox' name='chkk' value='$Emp_Email' class='ChkBox'></td>";?>
<?// echo"<td><a href=\"mailto:$Emp_Email\"> $Emp_Email  </a></td>"; ?>-->
<? echo"<td>$Emp_NickName</td>"; ?>
<? echo"<td>$Emp_Name</td>"; ?>
<? echo"<td>$Emp_SurName</td>"; ?>
<? echo"<td>$Pos_Name</td>"; ?>
<? echo"<td>$Dep_Name</td>"; ?>
<? echo"<td align='center'> $Emp_Nationality </td>"; ?>
<?echo"<td align='center'><a class='btn btn-outline-info btn-sm' href=\"EmpAssetDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Emp_Id=$Emp_Id\" target=_top >Edit Asset</a></td>";?>
<?echo"<td align='center'><a class='btn btn-outline-warning btn-sm' href=\"EmployeeEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Emp_Id=$Emp_Id\" target=_top >Edit</a></td>";?>
<?echo"<td align='center'><a  class='btn btn-outline-danger btn-sm' href=\"EmployeeDelete.php?Usr_IdLogin=$Usr_IdLoginCodeDel&Emp_Id=$Emp_Id\" target=_top  onclick=\" return confirm('Are you sure delete ($Emp_Name  $Emp_SurName)  ') \">Delete </a></td>";?>
<?echo"</tr>";?>
<?}?>
<?echo"</table>";?>
<?}?>
<?}?>

</body>

<script>
$("#selectAll").click(function() {
    var checkAll = $(this).prop("checked");
    $("input.ChkBox").each(function() {
        $(this).prop({
            "checked": checkAll
        });
    });
});
</script>

<script>
function ShowEmail() {
    var NaId = $("#EmpNation").val();
    var DepId = $("#DepId").val();
    var PosId = $("#PosId").val();
    var EmpName = $("#EmpName").val();
    var EmpNickName = $("#EmpNickName").val();
    var Type = $("#Type").val();
    var Group = $("#Group").val();
    $.post("qeemp.php", {
        ENaId: NaId,
        EDepId: DepId,
        EPosId: PosId,
        EEmpName: EmpName,
        EEmpNickName: EmpNickName,
        EType: Type,
        EGroup: Group
    }, function(data) {
        //alert(data);
        $("#ShowEmail").html(data);
    });
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("button").click(function() {
        var maill = [];
        $.each($("input[name='chkk']:checked"), function() {
            maill.push($(this).val());
        });

        window.location.href = 'mailto:' + maill;

    });
});
</script>

<script>
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
</script>
<script>
 function toggle(it) {
  if ((it.style.backgroundColor == "none") || (it.style.backgroundColor == ""))
    {it.style.backgroundColor = "#D6EBFF";}
  else
    {it.style.backgroundColor = "";}
}

</script>

</html>