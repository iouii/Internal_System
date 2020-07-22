<?
 
 include "chksession.php";
 include "connect.php";
     
 @session_start();
    $Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
    $Emaillink= $_SESSION['Emaillink'];
    

    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
    $sqlMem = "select * from Employee where Emp_Id='$Emp_Id'";
    $queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
    $rsT= mssql_fetch_array($queryMem);

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <title>Ogura Clutch Thailand</title>
</head>
<style>
.meu {}

.meu-ii {
    margin-top: 20px;
    margin-bottom: 20px;
}

select {
    align: right;
    font-size:15px !important;
}

.fb {
    margin-top: 20px;
    border-radius: 5px;
    padding: 15px;
    background-color: #0288df;
}

.mai-p {
    color: #fff;
    font-size:17px !important;
}
h3{
    color:#fff;
    
}

</style>

<body>

<?php

$dbquery_position=mssql_query(" SELECT Pos_Name,Pos_Id FROM Position ORDER BY Pos_Name  ASC"); 

$dbquery_department=mssql_query(" SELECT Dep_Name,Dep_Id FROM Department ORDER BY Dep_Name  ASC"); 

$dbquery_nationality=mssql_query(" SELECT DISTINCT Emp_Nationality FROM Employee "); 

$dbquery_group=mssql_query(" SELECT  * FROM Groups "); 

?>
    <div class="container fb">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-12 meu">
                <div class="row ">

                  

                    <div class="col-lg-4 col-md-12 col-12 ">
                        <span class="mai-p">Name :</span>
                        <input type="text" name="EmpName" id="EmpName" OnKeyPress="ShowEmail();" style="width:70%;">

                    </div>

                    <div class="col-lg-4 col-md-12 col-12 ">
                        <span class="mai-p"> NickName :</span>
                        <input type="text" name="EmpNickName" id="EmpNickName" OnKeyPress="ShowEmail();"
                            style="width:70%;">

                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <span class="mai-p"> Department :</span>
                        <select name="DepId" id="DepId" OnChange="ShowEmail();" style="width:58%;">
                            <option value="">Department All</option>
                            <? while($qry=mssql_fetch_array($dbquery_department))  { ?>
                            <option value="<? echo $qry['Dep_Name'];?>">
                                <? echo $qry['Dep_Name'];?>

                            </option>

                            <? }?>
                        </select>
                    </div>



                </div>
            </div>
                       
        </div>
    </div>

    <br>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 ">




                <div id="ShowEmail"></div>



            </div>
        </div>
    </div>

</body>
<script>
function ShowEmail() {
    
    var DepId = $("#DepId").val();
  
    var EmpName = $("#EmpName").val();
    var EmpNickName = $("#EmpNickName").val();
    
    $.post("admin-qemail.php", {
       
        EDepId: DepId,       
        EEmpName: EmpName,
        EEmpNickName: EmpNickName,
        
    }, function(data) {
        //alert(data);
        $("#ShowEmail").html(data);
    });


}
</script>


</html>