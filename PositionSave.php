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

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <title>OguraClutch</title>
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
<tr class="thead" >
<td colspan="2">ค้นหาข้อมูลตำแหน่ง</td>
</tr>

    <tr >
        <td align="center">
           Position 
        </td>
        <td>
            <input type="text" name="key_Pos_Name" id="key_Pos_Name"
                onfocus="if (this.value=='Search...') this.value=''" class='form-control '
                value="Search..." />

        </td>

    </tr>
</table>
</form>



<form id="form1" name="form1" method="post" action="PositionSave_DB.php">
<table class="table ">
<tr class="thead">
<td colspan="2">เพิ่มข้อมูลตำแหน่ง</td>
</tr>
<tr>
    <td align="center">

        Add Position
    </td>
    <td>
        <input name="Pos_Name" type="text" id="Pos_Name" class='form-control' />

    </td>
</tr>
<tr>
    
    
    <td align="center" colspan="2">
    <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
        <input type="submit" name="button" id="button" value="Save" class="btn btn-primary  " />
        <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning " />

    </td>

</tr>
</form>
</table>
            </div>
            <div class="col-lg-8  col-md-12 col-12 ">
                <table class='table' id='myTable'>
                    <thead>
                        <tr class='thead'>
                            <td>No</td>
                            <td>Name Position</td>
                            <td>People</td>
                            <td>Edit </td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                   
                  
                        <? 	$no=1;

			include "connect.php";
    	$sqlchk = "SELECT Pos_Id, Pos_Name FROM Position";
//---------------------Search_New---------------------------------------------------------------------------------		  
		if($_POST['key_Pos_Name'])
		{
		$sqlchk .=" where Pos_Name like '$key_Pos_Name%'";
		}
//--------------------------ABC---------------------------------------------------------
			
		$sqlchk.=" ORDER BY Pos_Name ASC ; " ;
		
		$querysh = mssql_query($sqlchk);
		
		
//--------------Search No Data Show--------------------------------------------------
		if(mssql_num_rows($querysh) <1){
			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Position Data</div></TD>";
		echo"</tr>";			
		}else          
//---------------------------------------------------------------------------------

        while($rs=mssql_fetch_array($querysh))
        {
        $Pos_Name=$rs[Pos_Name];
        $Pos_IdEdit=$rs[Pos_Id];
        $Pos_IdDel=$rs[Pos_Id];
        
//------------------------------Encode---------------------------------------------------------			
        $Pos_IdEditCode=base64_encode(base64_encode("$Pos_IdEdit"));
        $Pos_IdDelCode=base64_encode(base64_encode("$Pos_IdDel"));

//----------------------------------------------------------------------------------------			
        $sqlsh = "select * from Employee where Pos_Id='$Pos_IdDel'";
        $PosD_Id=$rs[Pos_Id];

        $objQuery2 = mssql_query($sqlsh) or die ("Error Query [".$sqlsh."]");
        $Num_Rows2 = mssql_num_rows($objQuery2);	
                    
            $iLoop++;
        $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;
        echo"<tr>";
		echo"<td align='center'>$no</td>";
		echo"<td>$Pos_Name</td>";
		echo"<td align='center'>$Num_Rows2</td>";
		echo"<td align='center'><a href='#' class='btn btn-outline-warning btn-sm' onclick=\"window.open('PositionEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Pos_Id=$Pos_IdEditCode', 'window1', 'width=451,height=350,status=yes,scrollbars=yes,resizable=no');\">    
		Edit</a></td>";
		echo"<td align='center'><a href=\"PositionDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Pos_Id=$Pos_IdDelCode\" class='btn btn-outline-danger btn-sm' onclick=\" return confirm('Are you sure delete ($Pos_Name) ') \">
		Delete</a></td>";
		echo"</tr>";
				$no++;

	}  
		?>
                </table>
               
            </div>
</body>

</html>