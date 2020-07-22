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
    <script src="popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
    </script>
    <script src="bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">
    </script>
    <script src="bootstrap-select.min.js"></script>
</head>
<style>
.hoz:hover {
    background-color: #cce4ff !important;

}

.ChkBox {

    margin-left: 8px !important;
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

<body>
    <?php
include "connect.php";
  @session_start();

    $Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
  

    $Emp_IdCode=$_GET["Emp_Id"];
    $sqlMem = "select * from Employee where Emp_Id='$Emp_Id'";
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

                <form action="EmployeeSave_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2"
                    >
                    <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                    <input name="Emp_NumberOri" type="hidden" id="Emp_NumberOri" value="<?=$rsT['Emp_Number']?>" />

                    <input name="Emp_Id" type="hidden" id="Emp_Id" class='form-control' value="<?=$rsT['Emp_Id']?>" />
                    <table class="table">

                    <tr class="thead">
                    <td colspan="2">เพิ่มข้อมูลพนักงาน</td>
                    </tr>
                        <tr>

                            <td align="right">
                                <label for="Emp_Number" class="my-1 mr-2 ">Employee Number :</label>
                            </td>

                            <td>
                                <input name="Emp_Number" class='form-control in-pu was-validated' type="text" id="Emp_Number" size="5"
                                    maxlength="5" required />
                            </td>

                        </tr>



                        <tr>

                            <td align="right">
                                <label for="Emp_Name" class="my-1 mr-2">Name :</label>
                            </td>
                            <td>
                                <input name="Emp_Name" type="text" class='form-control' id="Emp_Name" required />

                            </td>
</tr>
                            <tr>
                            <td align="right">
                                <label for="Emp_SurName" class="my-1 mr-2"> Sure Name :</label>
                                </td>
                               
<td>
                                    <input name="Emp_SurName" type="text" id="Emp_SurName" class='form-control'  />
                                    </td>
</tr>
                            <tr>
                            <td align="right">

                           
                                <label for="Emp_NickName" class="my-1 mr-2"> Nick Name :</label>
                               </td><td>
                                    <input name="Emp_NickName" type="text" id="Emp_NickName" class='form-control'
                                        size="15" maxlength="15" />
                                        </td>
</tr>
                            <tr>
                            <td align="right">

                            
                                <label for="Emp_Nationality" class="my-1 mr-2">Nationality :</label>
                               </td><td>
                                    <input name="Emp_Nationality" type="text" class='form-control' id="Emp_Nationality"
                                        size="15" maxlength="15" required />
                                        </td>
</tr>
                            <tr>
                            <td align="right">

                                <label for="Dep_Id" class="my-1 mr-2">Department :</label>
                                </td>
                                    <?
							
						include"connect.php"; 
							$dbquery1=mssql_query("SELECT Dep_Id, Dep_Name FROM Department ORDER BY Dep_Name  ASC"); 
			         ?>
                     <td>
                                    <select name="Dep_Id" id="Dep_Id" class='custom-select' required>
                                    <option value=""> Select Department</option>
                                        <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
                                        
                                        <option value="<? echo $rs1['Dep_Id'];?>"
                                            <?php if (!(strcmp($rs1['Dep_Id'], $rsT['Dep_Id']))) {echo "selected=\"selected\"";} ?>>
                                            <? echo $rs1['Dep_Name'];?>
                                        </option>
                                        <? }?>
                                    </select>
                                    </td>
</tr>
                            <tr>
                            <td align="right">

                          
                                <label for="Pos_Id" class="my-1 mr-2">Position :</label>
                               </td>
                                    <?
							
						include"connect.php"; 
							$dbquery2=mssql_query("SELECT Pos_Id, Pos_Name FROM Position ORDER BY Pos_Name  ASC"); 
			         ?>
                     <td>
                                    <select name="Pos_Id" id="Pos_Id" class='custom-select ' onchange="email();" required>
                                    <option value=""> Select Position </option>
                                        <? while($rs2=mssql_fetch_array($dbquery2))  { ?>
                                       
                                        <option value="<? echo $rs2['Pos_Id'];?>"
                                            <?php if (!(strcmp($rs2['Pos_Id'], $rsT['Pos_Id']))) {echo "selected=\"selected\"";} ?>>
                                            <? echo $rs2['Pos_Name'];?>
                                        </option>
                                        <? }?>
                                    </select>
                                    </td>
</tr>
                            <tr>
                            <td align="right">

                          
                                <label for="Emp_Email" class="my-1 mr-2">Email :</label>
                            </td>

<td>
        <input name="Emp_Email" type="text" class='form-control' id="Emp_Email" size="50" 
            required />
    
            </td>
</tr>
                            <tr>
                            <td align="right">
                          
                                <label for="Emp_ExtensionNumber" class="my-1 mr-2">Extension No :</label>
                               </td><td>
                                    <input name="Emp_ExtensionNumber" class='form-control' type="text"
                                        id="Emp_ExtensionNumber" size="10" maxlength="10" />
                               
                                        </td>
</tr>
                            <tr>
                            <td align="right">
                            
                                <label for="Emp_Mobile" class="my-1 mr-2">Mobile :</label>
                            </td><td>


                                    <input name="Emp_Mobile" type="text" class='form-control' id="Emp_Mobile" size="15"
                                        maxlength="15" />
                                        </td>
</tr>
                            <tr>
                            <td align="right">

                           
                                <label for="Emp_SpeedDial" class="my-1 mr-2">Speed Dial :</label>
                               </td>
<td>
                                    <input name="Emp_SpeedDial" type="text" class='form-control' id="Emp_SpeedDial"
                                        size="10" maxlength="10" />
                                        </td>
</tr>
                         

                                    <tr>
                 
                                        <td colspan='2'align="center"><input type="submit" name="button" id="button" class="btn btn-primary"
                                                value="Save" />
                                      
                                       <input type="reset" name="button2" id="button2" class="btn btn-primary"
                                                value="Clear" /></td>
                                              
                                    </tr>
                </form>

                </table>
            </div>
        </div>
    </div>
    <br>

</body>
<script language="javascript" type="text/javascript">
function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<script>


function email(){

                var NaId = $("#Emp_Name").val();
                var NaSurName = $("#Emp_SurName").val();                
                var FName = NaId[0];
                NaSurName = NaSurName.replace(/ /g, "");
                var FullMail = FName + "-" + NaSurName+"@ogura-thai.com" ;
                var FullMail = FullMail.toLowerCase();

                $("#Emp_Email").val(FullMail);

        };

</script>

</html>