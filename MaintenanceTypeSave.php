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
<?
 
 	include "chksession.php";
	include "connect.php";	
	
	$Usr_IdLogin=$_POST["Usr_IdLogin"];	
	$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));
 
 
 ?>
<?
	include "admin-menu.php";
				
    ?>
<hr>
<div class="container-fluid">

    <div class="row">
       
        <div class="col-lg-4 col-md-12 col-12 ">
            <form id="form2" name="form2" method="post" action="#">
                <table class="table">
                    <tr class="thead">
                    <td colspan="2">ค้นหาข้อมูล Maintenance</td>
                    </tr>
                    <tr>
                        <td align="right" >Maintenance Type</td>
                        <td>
                            <input class='form-control' type="text" name="key_Mtt_TypeName" id="key_Mtt_TypeName"
                                onfocus="if (this.value=='Search...') this.value=''" value="Search..." />
                        </td>
                        </tr><tr>
                        <td colspan="2" align="center">
                                <input type="button" name="button3" id="button3" value="Search"
                                    class="btn btn-primary" />
                            </td>
                    </tr>                
                </table>
            </form>
            <form id="form1" name="form1" method="post" action="MaintenanceTypeSave_DB.php">
                <table class="table">
                <tr class="thead">
                <td colspan="2">เพิ่มข้อมูล Maintenance Type</td>
                </tr>
                    <tr>
                        <td align="right">Name       
        </td>
        <td><input class='form-control' name="Mtt_TypeName" type="text" id="Mtt_TypeName" size="40" maxlength="40" />
        </td>     
        </tr>
        <tr>
            <td align="right">Note   
    </td>
    <td><textarea class='form-control' name="Mtt_Note" id="Mtt_Note" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>  
        <td align="center" colspan="2">
            <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
            <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-primary" />
            <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
 </td>
</tr>
</table>
</form>
</div>

<div class="col-lg-8 col-md-12 col-12 ">    
<table class="table">
    <tr class="thead">
        <td>No</td>
        <td>Maintenance Type</td>
        <td>Note</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
        <? 	$no=1;

    include "connect.php";
	$sqlchk = "SELECT * FROM MaintenanceType";
	
//---------------------Search_New---------------------------------------------------------------------------------		  
		if($_POST['key_Mtt_TypeName'])
		{
		$sqlchk .=" where Mtt_TypeName like '%$key_Mtt_TypeName%'";
		}
//--------------------------ABC---------------------------------------------------------
			
		$sqlchk.=" ORDER BY Mtt_TypeName ASC ; " ;

		
		$querysh = mssql_query($sqlchk);
		
		
//--------------Search No Data Show--------------------------------------------------
		if(mssql_num_rows($querysh) <1){
			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<td colspan=6><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Maintenance Type Data</div></td>";
		echo"</tr>";			
		}else          
//---------------------------------------------------------------------------------

			while($rs=mssql_fetch_array($querysh))
			{

			$Mtt_TypeName=$rs[Mtt_TypeName];
			$Mtt_Note=$rs[Mtt_Note];
			
			$Mtt_IdEdit=$rs[Mtt_Id];
			$Mtt_IdDel=$rs[Mtt_Id];
//------------------------------Encode---------------------------------------------------------			
            $Mtt_IdEditCode=base64_encode(base64_encode("$Mtt_IdEdit"));
            $Mtt_IdDelCode=base64_encode(base64_encode("$Mtt_IdDel"));//encode

        echo"$A";		
		echo"<tr >";
		echo"<td align='center'>$no</td>";
		echo"<td>&nbsp;&nbsp;$Mtt_TypeName</td>";
		echo"<td>$Mtt_Note</td>";
		echo"<td align='center'><a class='btn btn-outline-warning btn-sm' HREF=\"MaintenanceTypeEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Mtt_Id=$Mtt_IdEditCode\">
		Edit</a></td>";
		echo"<td align='center'><a class='btn btn-outline-danger btn-sm' HREF=\"MaintenanceTypeDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Mtt_Id=$Mtt_IdDelCode\" onclick=\" return confirm('Are you sure delete ($Mtt_TypeName ) ') \">
		Delete</a></td>";
		echo"</tr>";
				$no++;

	}  
		?>
</table>

</div>

</body>

</html>