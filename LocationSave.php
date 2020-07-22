<!DOCTYPE html>

<head>
    <meta charset="utf-8">
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
<?
 	include "chksession.php";
	include "connect.php";	
	
	$Usr_IdLogin=$_POST["Usr_IdLogin"];	
	$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));
 ?>

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
    font-size:13px;
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


                <form id="form1" name="form1" method="post" action="LocationSave_DB.php">
                    <table class="table">
                        <tr class="thead">
                        
                            <td colspan="2">
                                เพิ่มสถานที</td>
                        </tr>
                        <tr>
                            <td align="right">

                                Name
                            </td>
                            <td>
                                <input class='form-control' name="Loc_Name" type="text" id="Loc_Name" /></td>
                        </tr>
                        <tr>
                            <td align="right">

                              Group 
                            </td>
                            <td>
                                <input class='form-control' name="Loc_Group" type="text" id="Loc_Group" /></td>
                        </tr>
                        <tr>
                            <td align="right">

                               Note 
                            </td>
                            <td>

                                <textarea class='form-control' name="Loc_Note" id="Loc_Note" cols="45" rows="5"></textarea>
                            </td>
                      
                        </tr>
                        <tr>
                          
                            <td colspan="2" align="center">
                                <input type="submit" name="button" id="button" value="Save"  class="btn btn-primary"/>
                                <input type="reset" name="button2" id="button2" value="Clear"  class="btn btn-warning"/>
                                <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                            </td>
                        </tr>
                    </table>
                </form>
               
              </div> 
              

         
            <div class="col-lg-8 col-md-12 col-12 ">


                <table class="table">
                    <tr class="thead" >
                        <td >No.</td>
                        <td>Location</td>
                        <td >Groups</td>
                        <td >Edit</td>
                        <td >Delete</td>
                    </tr>

                   
                        <? 	$no=1;

include "connect.php";
	$sqlchk = "SELECT * FROM Location";
		if($_POST['key_Loc_Name'])
		{
		$sqlchk .=" where Loc_Name like '%$key_Loc_Name%'";
		}			
		$sqlchk.=" ORDER BY Loc_Name ASC ,Loc_Group ASC ; " ;		
		$querysh = mssql_query($sqlchk);		
		if(mssql_num_rows($querysh) <1){			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Location Data</div></TD>";
		echo"</tr>";			
		}else          
		$Loc_Name=$_POST['Loc_Name'];
        $Loc_Group=$_POST['Loc_Group'];
        $Loc_Note=$_POST['Loc_Note'];


        while($rs=mssql_fetch_array($querysh))
        {
        $Loc_Name=$rs[Loc_Name];
        $Loc_Group=$rs[Loc_Group];
        $Loc_Note=$rs[Loc_Note];
        $Loc_IdEdit=$rs[Loc_Id];
        $Loc_IdDel=$rs[Loc_Id];
        $Loc_IdEditCode=base64_encode(base64_encode("$Loc_IdEdit"));
        $Loc_IdDelCode=base64_encode(base64_encode("$Loc_IdDel"));
        
        $iLoop++;
        
        $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;

					
		echo"<tr >";
		echo"<td align='center'>$no</td>";
		echo"<td align='center'>$Loc_Name</td>";
		echo"<td align='center'>$Loc_Group</td>";
		echo"<td align='center'><A HREF=\"LocationEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Loc_Id=$Loc_IdEditCode\">
		<IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
		echo"<td><div align='center' class='style25'><A HREF=\"LocationDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Loc_Id=$Loc_IdDelCode\" onclick=\" return confirm('Are you sure delete ($Loc_Name  $Loc_Group ) ') \">
		<IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a></div></td>";
		echo"</tr>";
				$no++;

	}  
		?>
                </table>
               
            </div>

</body>

</html>