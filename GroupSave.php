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
            <div class="col-lg-4 col-md-12 col-12 ">
            <form id="form2" name="form2" method="post" action="">
                    <table class="table ">
<tr class="thead">
<td colspan="2">ค้นหากลุ่ม</td>
</tr>
                        <tr>
                         <td align="center">
                                All Group 
                            </td>
                            <td>
                                <input type="text" name="key_Grp_Name" id="key_Grp_Name" class='form-control'
                                    onfocus="if (this.value=='Search...') this.value=''" value="Search..." />
                            </td>
                        </tr>
                    
                </form>

</table>
                <form id="form1" name="form1" method="post" action="GroupSave_DB.php">
                <table class="table ">
                <tr class="thead">
                <td colspan="2">เพิ่มข้อมูลกลุ่ม</td>
                </tr>
                    <tr>
                        <td align="right">

                           Groups&nbsp;Name 
                        </td>
                        <td>
                            <input name="Grp_Name" type="text" id="Grp_Name" size="35" maxlength="35"
                                class='form-control in-pu' required />
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                           Groups&nbsp;Note
                        </td>
                        <td>
                            <textarea name="Grp_Note" id="Grp_Note" cols="40" rows="5"
                                class='form-control in-pu'></textarea>

                        </td>
                    </tr>
                    <tr>


                        <td align="center" colspan="2">
                        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                            <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
                            <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning" />
                        </td>
                    </tr>
                </form>
                </table>

            </div>
                 
            <div class="col-lg-8 col-md-12 col-12 ">

                <table class='table' id='myTable'>
                    <thead>
                        <tr class='thead'>
                            <td>No.</td>
                            <td>Group Name </td>
                            <td>Group Note</td>
                            <td>Edit&nbsp;Group </td>
                            <td>Delete&nbsp;Group</td>
                            <td>Add&nbsp;Member</td>
                            <td>Delete&nbsp;Member</td>
                        </tr>
                    </thead>

                 
                  
                        <? 	$no=1;

			include "connect.php";
		$sqlchk = "SELECT * FROM Groups";
		if($_POST['key_Grp_Name'])
		{
		$sqlchk .=" where Grp_Name like '%$key_Grp_Name%'";
		}
		$sqlchk.=" ORDER BY Grp_Name ASC ; " ;
		
		$querysh = mssql_query($sqlchk);
		if(mssql_num_rows($querysh) <1){
			
	
		echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Group Data</div></TD>";
		echo"</tr>";			
		}else          
			while($rs=mssql_fetch_array($querysh))
			{

			
			$Grp_Name=$rs[Grp_Name];
			$Grp_Note=$rs[Grp_Note];			
			$Grp_Id=$rs[Grp_Id];
			$Grp_Id2=$rs[Grp_Id];
			
            $Grp_IdEditCode=base64_encode(base64_encode("$Grp_Id"));
            $Grp_IdDelCode=base64_encode(base64_encode("$Grp_Id"));
            
            $FriGrp_IdCode=base64_encode(base64_encode("$Grp_Id"));
            $MemAddGrp_IdCode=base64_encode(base64_encode("$Grp_Id"));

				$iLoop++;
    $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;
	

            echo"<td align='center'>$no</td>";
            echo"<td><A HREF=\"UserFriAddShow.php?Usr_IdLogin=$Usr_IdLoginCode&Grp_Id=$FriGrp_IdCode\">$Grp_Name</a></TD>";
            echo "<td>$Grp_Note</td>";

            echo"<td align='center'><a href='#'onclick=\"window.open('GroupEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Grp_Id=$Grp_IdEditCode', 'window1', 'width=451,height=550,status=yes,scrollbars=yes,resizable=no');\">    
            <IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></td>";

            echo"<td align='center'><a href=\"GroupDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Grp_Id=$Grp_IdDelCode\" onclick=\" return confirm('Are you sure delete ($Grp_Name) ') \">
            <IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a></td>";
            echo"<td align='center'><a class='btn btn-outline-primary btn-sm' href=\"UserFriAdd.php?Usr_IdLogin=$Usr_IdLoginCode&Grp_Id=$MemAddGrp_IdCode\">
            Add </a></td>";
            echo"<td align='center'><a class='btn btn-outline-danger btn-sm' href=\"UserFriAddShow.php?Usr_IdLogin=$Usr_IdLoginCode&Grp_Id=$MemAddGrp_IdCode\">
            Delete</a></td>";
            echo"</tr>";
				$no++;

	}  
		?>
                </table>
               
            </div>
        </div>
    </div>




</body>

</html>