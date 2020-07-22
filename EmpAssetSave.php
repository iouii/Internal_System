<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
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

.hoz:hover {
    background-color: #cce4ff !important;

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
  border: 1px solid #ddd !important;
}

td {

    border: 1px solid #ddd !important;
}
</style>
<?php
@session_start();


    include "chksession.php";
    include "connect.php";	


    $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));

    $Emp_IdEditCode=$_GET["Emp_Id"];



    $sqlMem = "select E.Emp_Id, E.Emp_Number, " ;
    $sqlMem .= "E.Emp_Name, E.Emp_SurName, E.Emp_NickName, " ;
    $sqlMem .= "E.Emp_Nationality, E.Dep_Id, E.Pos_Id, " ;
    $sqlMem .= "E.Emp_Email, E.Emp_ExtensionNumber, E.Emp_Mobile, " ;
    $sqlMem .= "E.Emp_SpeedDial, D.Dep_Name, P.Pos_Name " ;
    $sqlMem .= "from (Employee E INNER JOIN Department D " ;
    $sqlMem .= "ON E.Dep_Id = D.Dep_Id) " ;
    $sqlMem .= "INNER JOIN Position P " ;
    $sqlMem .= "ON E.Pos_Id = P.Pos_Id " ;
    $sqlMem .= "where Emp_Id='$Emp_Id'" ;

    $queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
	
		while($rs=mssql_fetch_array($queryMem))
			{

    $Emp_Id=$rs[Emp_Id];
    $Emp_Name22=$rs[Emp_Name];
    $Emp_SurName22=$rs[Emp_SurName];
    $Dep_Name22=$rs[Dep_Name];
    $Pos_Name22=$rs[Pos_Name];

      @session_start();
    $_SESSION[Emp_IdEditCode] =$Emp_IdEditCode;
    $_SESSION[Emp_Id] =$Emp_Id;


		
		}
?>
  <?
include "admin-menu.php";

?>
    <hr>
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-4 col-md-12 col-12 ">

  <form action="EmpAssetSave_Table.php" name="frmMain" method="post" target="iframe_target" id="my_form">
  <table class="table">
                    <tr class="thead">
                        <td colspan="2">
                           Employee
                        </td>
                        
                    </tr>
                    <tr>
                    <td>Department</td>
                    <td>

<? echo "$Dep_Name22"; ?>

</td>
<tr>

<td>Name</td>
<td>

                         <? echo "$Emp_Name22 &nbsp;&nbsp; $Emp_SurName22"
                                                   ?>
                        </td>
</tr>
       
        </table>    
        </div>
        <div class="col-lg-8 col-md-12 col-12 ">
        <table class="table">            
                        <tr class="thead">

                          <td colspan="4"> Asset</td>
</tr>
                        <tr>
                          <td align="right" >IP Address</td>
                          <td align="left" ><input class='form-control ' name="key_IP_Address" type="text" id="key_IP_Address" size="20" maxlength="20" /></td>
                          <td align="right">Brand</td>
                          <td align="left"><input class='form-control ' name="key_Brand" type="text" id="key_Brand" size="15" maxlength="15" /></td>
                        </tr>
                        <tr>
                          <td align="right" >Type</td>
                          <td align="left"><?
							
						include"connect.php"; 
							$dbquery1=mssql_query("SELECT DISTINCT(Ast_Type) FROM AssetIT Order by Ast_Type  ASC"); 
			         ?>
                            <select name="key_Ast_Type" id="key_Ast_Type" class='custom-select'>
                              <option value="">All</option>
                              <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
                              <option value="<? echo $rs1['Ast_Type'];?>"> <? echo $rs1['Ast_Type'];?></option>
                              <? }?>
                          </select></td>
                          <td align="right">Model</td>
                          <td align="left"><input class='form-control ' name="key_Model" type="text" id="key_Model" size="20" maxlength="20" /></td>
                        </tr>
                        <tr>
                          <td align="right" >Serial No</td>
                          <td align="left" ><input class='form-control ' name="key_Serial" type="text" id="key_IP_Address2" size="20" maxlength="20" /></td>
                          <td align="right" >Code</td>
                          <td align="left" ><input class='form-control ' name="key_Code" type="text" id="key_IP_Address3" size="20" maxlength="20" /></td>
                        </tr>
                        <tr>
                          <td align="right">Location</td>
                          <td ><?
							
						include"connect.php"; 
							$dbquery1=mssql_query("SELECT * FROM Location Order By Loc_Name ASC, Loc_Group ASC"); 
			         ?>
                            <select name="key_Loc_Id" id="key_Loc_Id" class='custom-select'>
                              <option value="">All</option>
                              <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
                              <option value="<? echo $rs1['Loc_Id'];?>"> <? echo $rs1['Loc_Name'];?>&nbsp;<? echo $rs1['Loc_Group'];?></option>
                              <? }?>
                          </select></td>
                          <td colspan="2" align="center">
                            <input type="submit" name="button" id="button" value="Search" class="btn btn-primary" />
                            <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-primary" />
</td>
                        </tr>
       
          </table>
        </p>
      </form>
      </div>

      <div class="col-lg-12 col-md-12 col-12 ">

  <iframe id="iframe_target" name="iframe_target" width=100%; height=400;  frameborder =0px; solid #fff; align="center" scrolling ="auto"
SRC="EmpAssetSave_Table.php"  > 
</iframe>

      </div>
      </div>
      </div>
</body>
</html>
