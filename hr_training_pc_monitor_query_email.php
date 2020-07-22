<?php

//include('connectWebIT.php');    


$EEDepart = $_POST["EDepart"];



$dbquery_email ="SELECT DISTINCT Employee.Emp_ExtensionNumber,Employee.Emp_SurName,Employee.Emp_SpeedDial,Employee.Emp_Mobile, Employee.Emp_Name,Employee.Pos_Id,Employee.Dep_Id ,Employee.Emp_Nationality,Employee.Emp_Email,Employee.Emp_NickName ,Department.Dep_Id ,Department.Dep_Name,Position.Pos_Id,Position.Pos_Name   
FROM ((Employee 
    INNER JOIN Department ON Employee.Dep_Id  = Department.Dep_Id )
    INNER JOIN Position ON Employee.Pos_Id  = Position.Pos_Id)
    WHERE  Department.Dep_Name LIKE '$EEDepart%'  AND LEN (Employee.Emp_Email) > 0 
    ORDER BY  Department.Dep_Name ,Position.Pos_Name ASC " ;

$query = mssql_query($dbquery_email);




if(mssql_num_rows($query) <1){

echo " no data";

}else{

    
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

echo"

<h4> $Emp_Id ==> $Emp_Email </h4>


";


}

}


?>