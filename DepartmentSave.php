<!DOCTYPE html>

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

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <title>OguraClutch</title>
</head>
<style>
body{
    background-color:#f2f2f2;
}

.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 16px !important;
    color: #fff;
    text-align: center !important;
    border-radius: 1px !important;
    border: 1px solid #DDDDDD !important;
}
table{
    font-size:14px;
}
tr{
    border: 1px solid #DDDDDD !important;
}
td{
    border: 1px solid #DDDDDD !important;
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
                    <td colspan="2" align="center">ค้นหาข้อมูลแผนก</td>
                    </tr>
                        <tr>
                            <td align="right">
                                <label for="key_Dep_Name" class="my-1 mr-2 ">Department :</label>
                            </td>
                            <td>
                                <input type="text" name="key_Dep_Name" id="key_Dep_Name" class='form-control'
                                    onfocus="if (this.value=='Search...') this.value=''" value="Search..." />
                            </td>
                        </tr>
</table>
                </form>

<hr>

                <form id="form1" name="form1" method="post" action="DepartmentSave_DB.php">
                <table class="table ">
                <tr class="thead">
                <td colspan="2" align="center">เพิ่มข้อมูลแผนก</td>                
                </tr>
                    <tr>
                        <td align="right">
                            <label for="key_Dep_Name" class="my-1 mr-2 ">Insert Department :</label>
                        </td>
                        <td>
                            <input name="Dep_Name" type="text" id="Dep_Name" class='form-control' />

                        </td>
                    </tr>
                    <tr>                  
                        <td align="center" colspan="2">
                            <input type="submit" name="button" id="button" value="Save" class="btn btn-primary " />
                            <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning " />
                           
                            <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                        </td>
                    </tr>
                    </table>
                </form>            
            </div>     
            <div class="col-lg-8 col-md-12 col-12 ">
                <table class='table' id='myTable'>              
                        <tr class='thead'>
                            <td>No.</td>
                            <td>Department Name</td>
                            <td>People</td>
                            <td>Edit </td>
                            <td>Delete</td>
                        </tr>                                                      
                        <? 	$no=1;

			include "connect.php";

	$sqlchk = "SELECT Dep_Id, Dep_Name FROM Department";
	
 
		if($_POST['key_Dep_Name'])
		{
		$sqlchk .=" where Dep_Name like '$key_Dep_Name%'";
		}
			
		$sqlchk.=" ORDER BY Dep_Name ASC ; " ;
		
		$querysh = mssql_query($sqlchk);
		
		
		if(mssql_num_rows($querysh) <1){
			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Department Data</div></TD>";
		echo"</tr>";			
		}else          
			while($rs=mssql_fetch_array($querysh))
			{

			
        $Dep_Name=$rs[Dep_Name];
        $Dep_IdEdit=$rs[Dep_Id];
        $Dep_IdDel=$rs[Dep_Id];
        $Dep_IdEditCode=base64_encode(base64_encode("$Dep_IdEdit"));
        $Dep_IdDelCode=base64_encode(base64_encode("$Dep_IdDel"));
        $sqlsh = "select * from Employee where Dep_id='$Dep_IdDel'";
        $DepD_Id=$rs[Dep_Id];

        $objQuery2 = mssql_query($sqlsh) or die ("Error Query [".$sqlsh."]");
        $Num_Rows2 = mssql_num_rows($objQuery2);	
			
				$iLoop++;
        $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;

					
		echo"<tr>";
		echo"<td align='center'>$no</TD>";
		echo"<td>$Dep_Name</td>";
		echo"<td align='center'>$Num_Rows2</td>";
		echo"<td align='center'><a href='#' class='btn btn-outline-warning btn-sm' onclick=\"window.open('DepartmentEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Dep_id=$Dep_IdEditCode', 'window1', 'width=451,height=350,status=yes,scrollbars=yes,resizable=no');\">    
		Edit</a></td>";
		echo"<td align='center'><a href=\"DepartmentDelete.php?Usr_IdLogin=$Usr_IdLoginCode&Dep_id=$Dep_IdDelCode\" class='btn btn-outline-danger btn-sm' onclick=\" return confirm('Are you sure delete ($Dep_Name) ') \">
		Delete</a></td>";
		echo"</tr>";
				$no++;
	}  
		?>
                </table>
                
            </div>

</body>

</html>