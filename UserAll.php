<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=tis-620" /> -->
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
.col-form-label {
    text-align: right !important;
}

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
table{
    font-size:14px;
}

tr {
    border: 1px solid #ddd !important;
}

td {

    border: 1px solid #ddd !important;
}
</style>

<body>
    <?
 
include "chksession.php";
include "connect.php";	
include "connect.php";	
@session_start();
$Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
$Emaillink= $_SESSION['Emaillink'];    
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
//  echo "<script> alert ($Usr_IdLogin) </script> ";
$sqlShow = "SELECT * FROM Users WHERE Usr_Id='$Usr_IdLogin'";
$queryShow = mssql_query($sqlShow)or die("error=$sqlShow");
//$rsT= mssql_fetch_array($queryMem);
  while($rs=mssql_fetch_array($queryShow))
    {
  //$Grp_Id=$rs[Grp_Id];
$Show_Usr_Account=$rs[Usr_Account];
$Show_Usr_Name=$rs[Usr_Name];         
   }
?>
    <?
include "admin-menu.php";
?>
    <hr>
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-lg-4 col-md-12 col-12 ">
              
                <form action="UserSave_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
                    <table class="table ">
<tr class="thead">
<td colspan="2">เพิ่มข้อมูลผู้ดูแล</td>
</tr>
                        <tr>
                            <td align="right">
                               Account
                            </td>
                            <td>
                                <input name="Usr_Account" type="text" id="Usr_Account" size="15" maxlength="15"
                                    class='form-control in-pu' required />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Password
                            </td>
                            <td>
                                <input name="Usr_Password" type="password" id="Usr_Password" size="10" maxlength="10"
                                    class='form-control in-pu'>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Name
                            </td>
                            <td>
                                <input name="Usr_Name" type="text" id="Usr_Name" size="40" maxlength="40"
                                    class='form-control '>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Sur Name
                            </td>
                            <td>
                                <input name="Usr_Surname" type="text" id="Usr_Surname" size="40" maxlength="40"
                                    class='form-control in-pu'>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                             Department 
                            </td>
                            <td>
                                <?							
						include"connect.php"; 
							$dbquery1=mssql_query("SELECT Dep_Id, Dep_Name FROM Department ORDER BY Dep_Name  ASC"); 
			         ?>
                                <select name="Dep_Id" id="Dep_Id" class='custom-select' required>
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
                                Position
                            </td>
                            <td>
                                <?							
						include"connect.php"; 
							$dbquery2=mssql_query("SELECT Pos_Id, Pos_Name FROM Position ORDER BY Pos_Name  ASC"); 
			         ?>
                                <select name="Pos_Id" id="Pos_Id" class='custom-select ' required>
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
                            
                            <td align="center" colspan="2">
                            <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin"
                                    value="<?="$Usr_IdLogin";?>" />
                                <input type="submit" name="button" id="button" value="Save" class="btn btn-primary " />
                                <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning" />
                            </td>
                        </tr>
                        </table>
                </form>
            </div>
       
            <div class="col-lg-8 col-md-12 col-12 ">
                <table class='table'>
                    <thead>
                        <tr class='thead'>
                            <td>No.</td>
                            <td>Account </td>
                            <td>Name</td>
                            <td>Sure&nbsp; Name </td>
                            <td>Department</td>
                            <td>Position</td>
                            <td>Rights</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>                   
                        <? 	$no=1;
			include "connect.php";				
			$sqlchk = "select U.Usr_Id, U.Usr_Account, " ;
			$sqlchk .= "U.Usr_Password, U.Usr_Name, U.Usr_Surname, " ;
			$sqlchk .= "D.Dep_Name, P.Pos_Name " ;
			$sqlchk .= "from (Users U INNER JOIN Department D " ;
			$sqlchk .= "ON U.Dep_Id = D.Dep_Id) " ;
			$sqlchk .= "INNER JOIN Position P " ;
			$sqlchk .= "ON U.Pos_Id = P.Pos_Id " ;
//-----------------------Data A-Z-----------------------------------------------			
			$sqlchk.=" ORDER BY D.Dep_Name ASC, P.Pos_Name ASC, U.Usr_Name ASC ; " ;
//------------------------------------------------------------------------------		
			$querysh = mssql_query($sqlchk);
			while($rs=mssql_fetch_array($querysh))
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
    //------------------------------Encode---------------------------------------------------------			
            $Usr_IdEditCode=base64_encode(base64_encode("$Usr_Id"));
            $Usr_IdDelCode=base64_encode(base64_encode("$Usr_Id"));
//----------------------------------------------------------------------------------------			
		echo"<tr >";
		echo"<td align='center'>$no</td>";
		echo"<td><A HREF=\"UserRightsShowAll.php?Usr_IdLogin=$Usr_IdLoginCode&Usr_Id=$Usr_IdEditCode\">$Usr_Account</a></div></TD>";
		echo"<td>$Usr_Name</td>";
		echo"<td>$Usr_Surname</td>";
		echo"<td>$Dep_Name</td>";
		echo"<td>$Pos_Name</td>";
		echo"<td align='center'><A HREF=\"UserRightsShowAll.php?Usr_IdLogin=$Usr_IdLoginCode&Usr_Id=$Usr_IdEditCode\">
		<IMG SRC=images/icon/login.png WIDTH=35 HEIGHT=35 BORDER=0 ALT=Edit></a></td>";
        echo"<td align='center'><a href='#'onclick=\"window.open('UserEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Usr_Id=$Usr_IdEditCode', 'window1', 'width=600,height=550,status=yes,scrollbars=yes,resizable=no');\">    
		<IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></td>";
        echo"<td align='center'><A HREF=\"UserDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Usr_Id=$Usr_IdDelCode\" onclick=\" return confirm('Are you sure delete ($Usr_Account) ') \">
		<IMG SRC=images/icon/delete.png WIDTH=35 HEIGHT=35 BORDER=0 ALT=Delete></a></td>";
		echo"</tr>";
				$no++;

	}  
		?>
                </table>
                
            </div>


</body>

</html>