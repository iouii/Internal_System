<!DOCTYPE html>

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
.in-pu {

    width: 20%;
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
$sqlShow = "SELECT * FROM Users WHERE Usr_Id='$Usr_IdLogin'";
$queryShow = mssql_query($sqlShow)or die("error=$sqlShow");

  while($rs=mssql_fetch_array($queryShow))
    {

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
            <div class="col-lg-4 col-md-12 col-12  ">
                <form id="form1" name="form1" method="post" action="ButtonSave_DB.php"> 
                    <table class="table">
<tr class="thead">
<td colspan="2">เพิ่มหน้าใช้งาน</td>
</tr>
                        <tr>
                                <td align="center">
                                    Name Button 
                                </td>
 
                                <td>
                                    <input name="Rig_Name" type="text" id="Rig_Name" class='form-control '
                                        required />                            
                            </td>
                        </tr>
                        <tr>                       
                                <td align="center">
                                   Link Button
                                </td>                                  
                                    <td>
                                        <input name="Rig_PageLink" type="text" id="Rig_PageLink" class='form-control'required />
                                        </td>    
                        </tr>
                        <tr align="center">                       
                        <td colspan="2">
                        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                            <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
                            <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning " />
                        </td>
</tr>
                    </table>
                </form>
            </div>
      
            <div class="col-lg-8 col-md-12 col-12  fo-lo  ">
                <table class='table' id='myTable'>
                   
                        <tr class='thead'>
                            <td>No</td>
                            <td> Name Button </td>
                            <td>Link Button</td>
                            <td> Edit </td>
                            <td>Delete</td>

                        </tr>                   
                        <? 	$no=1;
			include "connect.php";				
	$querysh = mssql_query("SELECT * FROM Rights");

			while($rs=mssql_fetch_array($querysh))
			{			
			$Rig_Name=$rs[Rig_Name];
			$Rig_IdEdit=$rs[Rig_Id];
			$Rig_IdDel=$rs[Rig_Id];
			$Rig_PageLink=$rs[Rig_PageLink];
			
			 $Rig_IdEditCode=base64_encode(base64_encode("$Rig_IdEdit"));
			 $Rig_IdDelCode=base64_encode(base64_encode("$Rig_IdDel"));
				
		echo"<tr >";
		echo"<td align='center'>$no</td>";
		echo"<td>$Rig_Name</td>";
		echo"<td>$Rig_PageLink</td>";
        echo"<td align='center'><a href='#'onclick=\"window.open('ButtonEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Rig_Id=$Rig_IdEditCode', 'window1', 'width=300,height=450,status=yes,scrollbars=yes,resizable=no');\">    
		<IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></td>";
		echo"<td align='center'><a href=\"ButtonDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Rig_Id=$Rig_IdDelCode\" onclick=\" return confirm('Are you sure delete ($Rig_Name)') \">
		<IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a></div></td>";
		echo"</tr>";
				$no++;
	}  
		?>

                </table>
            </div>
        </div>
</body>

</html>