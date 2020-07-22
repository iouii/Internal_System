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
<?php
//mysql_query('SET CHARACTER SET utf8');

	include "chksession.php";
	include "connect.php";	
	
	
$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
$Grp_IdEditCode=$_GET["Grp_Id"];
$Grp_Id=base64_decode(base64_decode("$Grp_IdEditCode"));
$sqlMem = "select * from Groups where Grp_Id='$Grp_Id'";
$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
	//$rsT= mssql_fetch_array($queryMem);	
		while($rs=mssql_fetch_array($queryMem))
			{
		$Grp_Id=$rs[Grp_Id];
		$Grp_Name22=$rs[Grp_Name];
		
		}
?>
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
    font-size:12px;
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
include "admin-menu.php";

?>
    <hr>
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-lg-4 col-md-12 col-12 ">
                <form id="form1" name="form1" method="post" action="">
                    <table class="table" id='myTable'>
                        <tr class="thead">
                      
                            <td colspan="3">ค้นหาสมาชิก</td>
                        </tr>
                        <tr>
                            <td align="center">
                            Search&nbsp;by
                            </td>
                            <td>
                                <select name="select" id="select" class='custom-select'>
                                    <option value="Name">Name</option>
                                    <option value="NickName">NickName</option>
                                    <option value="Department">Department</option>
                                    <option value="Position">Position</option>
                                </select>
                            </td>
                            <td>
                                <input name="key_word" type="text" id="key_word" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            
                            <td align="center" colspan="3">
                                <input type="submit" name="button" id="button" value="Search" class="btn btn-info " />

                                <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-info " />
                            </td>
                         

                        </tr>
                        
                    </table>

                    </form>
<table class="table">
<tr class="thead">
<td>เพิ่มรายชื่อเข้ากลุ่ม</td>
</tr>
<tr>
<td align="center">
                    <form id="form2" name="form2" method="post" action="UserFriAdd_DB.php">
                                <input name="Grp_Id22" type="hidden" id="Grp_Id22" value="<?="$Grp_Id";?>" />
                                <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                                <input name="Grp_Name_log" type="hidden" id="Grp_Name_log"
                                    value="<?="$Grp_Name22";?>" />
                                <input type="submit" name="button3" id="button3" value="Add Member"
                                    class="btn btn-success " />
</td>
</tr>
</table>

                   
                    
            </div>
        
            <div class="col-lg-8 col-md-12 col-12 ">
                <table class='table' id='myTable' name="details">
                    <thead>
                        <tr class='thead'>
                            <td>No</td>
                            <td>Name </td>
                            <td>Nick Name</td>
                            <td> Department </td>
                            <td>Position</td>
                            <td>Add Member</td>
                        </tr>
                    </thead>
                    
                        <? 	$no=1;
			include "connect.php";			         	
			$sqlchk = "select E.Emp_Id, E.Emp_Number, " ;
			$sqlchk .= "E.Emp_Name, E.Emp_SurName, E.Emp_NickName, " ;
			$sqlchk .= "E.Emp_Nationality, E.Dep_Id, E.Pos_Id, " ;
			$sqlchk .= "E.Emp_Email, E.Emp_ExtensionNumber, E.Emp_Mobile, " ;
			$sqlchk .= "E.Emp_SpeedDial, D.Dep_Name, P.Pos_Name " ;
			$sqlchk .= "from (Employee E INNER JOIN Department D " ;
			$sqlchk .= "ON E.Dep_Id = D.Dep_Id) " ;
			$sqlchk .= "INNER JOIN Position P " ;
			$sqlchk .= "ON E.Pos_Id = P.Pos_Id " ;		
			//echo "$select";
			if ($_POST['key_word']and($select==Name) )
			{$sqlchk.=" where E.Emp_Name like '%$key_word%'";						
			}elseif($_POST['key_word']and($select==NickName) )
			{$sqlchk.=" where E.Emp_NickName like '%$key_word%'";			
			}elseif($_POST['key_word']and($select==Department) )
			{$sqlchk.=" where D.Dep_Name like '%$key_word%'";			
			}elseif($_POST['key_word']and($select==Position))
			{$sqlchk.=" where P.Pos_Name like '%$key_word%'";
			}  
                //-------------------------------------------------------------------------------------			
            $sqlchk.=" ORDER BY D.Dep_Name ASC, P.Pos_Name ASC, E.Emp_Name ASC ; " ;
            
            $querysh = mssql_query($sqlchk);

                while($rs=mssql_fetch_array($querysh))
                {

            $Emp_Id2=$rs[Emp_Id];
            $Emp_Name=$rs[Emp_Name];
            $Emp_NickName=$rs[Emp_NickName];
            $Dep_Id=$rs[Dep_Id];
            $Pos_Id=$rs[Pos_Id];
            $Dep_Name=$rs[Dep_Name]; 
            $Pos_Name=$rs[Pos_Name];
            echo"<tr>";
            echo"<td align='center'>$no</div></td>";
            echo"<td>$Emp_Name</div></td>";
            echo"<td>$Emp_NickName</div></td>";
            echo"<td>$Dep_Name</div></td>";
            echo"<td>$Pos_Name</div></td>";
            echo"<td align='center'><input type='checkbox' name='chkfri[]' value='$Emp_Id2'>
                    <IMG SRC=images/icon/add_fri.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
            echo"</tr>";
				$no++;
	}  
		?>
                    
                </table>
                </form>
            </DIV>

        </div>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
        <script type='text/javascript' src='../js/logging.js'></script>
</body>

</html>