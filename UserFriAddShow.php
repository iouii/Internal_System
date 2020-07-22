<!DOCTYPE html>
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
<?php
//mysql_query('SET CHARACTER SET utf8');
	include "chksession.php";
	include "connect.php";		
   $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
   $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));  
   $Grp_IdEditCode=$_GET["Grp_Id"];
   $Grp_Id=base64_decode(base64_decode("$Grp_IdEditCode"));
?>
<script language="JavaScript">
function onDelete()
{
if(confirm('Do you want to delete ?')==true)
{
return true;
}
else
{
return false;
}
}
</script>
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
<table class="table">
<tr class="thead">
<td colspan="2" >Detail Group</td>
</tr>
<tr>
<td>Group&nbsp;Name</td>
<td >
                            <? 
						
						$sqlMem = "select Grp_Name from Groups where Grp_Id='$Grp_Id'";
							$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
		while($rs=mssql_fetch_array($queryMem))
			{
						$Grp_Id55=$rs[Grp_Id];
						$Grp_Name22=$rs[Grp_Name];
						echo "$Grp_Name22";
			} ?>
      </td>
    </tr>
</table>
<table class="table">
    <tr class="thead">
    <td colspan="3">ค้นหาสมาชิก</td>
    </tr>
    <tr>
    <td>Search&nbsp;by</td>
      <td colspan="" align="center">    
        <select name="select" id="select" class='custom-select'>
          <option value="Name">Name</option>
          <option value="NickName">NickName</option>
          <option value="Department">Department</option>
          <option value="Position">Position</option>
        </select>    
     </td>
    <td>
        <input name="key_word" type="text" id="key_word" class='form-control'/>
        <? echo "$GrpEmp_Id" ?>
      </td>    
    </tr>
<tr>
<td  colspan="3" align="center" >
      <input type="submit" name="button" id="button" value="Search" class="btn btn-primary" />
      <input type="reset" name="button2" id="button2" value="Clear"class="btn btn-warning"  />
</td>
  </tr>
</table>
    
        </form>
</div>      

  <div class="col-lg-8 col-md-12 col-12 ">
      <form id="form2" name="form2" method="post" action="UserFriDelete.php" OnSubmit="return onDelete();">
        <input name="Grp_Id22" type="hidden" id="Grp_Id22" value="<?="$Grp_Id";?>" />
        <input name="Grp_Name_log" type="hidden" id="Grp_Name_log" value="<?="$Grp_Name22";?>" />
        
                <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                <table class="table">
                <tr class="thead">
                <td>ลบสมาชิก</td>
                </tr>
                <tr>
                <td>
                <input  type="submit" name="button3" id="button3" value="Delete Member" />
                </td>
                </tr>
                </table>
                <table class='table' id='myTable' name="details">
<thead>
    <tr class='thead'>
        <td>No.</td>
        <td>Name </td>
        <td>Nick Name</td>
        <td> Department </td>
        <td>Position</td>
        <td>Delete Member</td>
    </tr>
</thead>
         
            <? 	$no=1;
		
			include "connect.php";			
			$sqlchk = " select * from ((((GroupEmployee GE inner join Employee E on GE.Emp_Id = E.Emp_Id)";
			$sqlchk .= "inner join Groups G on G.Grp_Id = GE.Grp_Id)";
			$sqlchk .="inner join Department D on D.Dep_Id = E.Dep_Id)";
			$sqlchk .="inner join Position P on P.Pos_Id = E.Pos_Id)";
			$sqlchk .="where GE.Grp_Id =$Grp_Id ";	
//---------------------------------------------------------------------------------------------------------------			
						
			if ($_POST['key_word']and($select==Name) )
			{$sqlchk.="and E.Emp_Name like '%$key_word%'"; 						
			}elseif($_POST['key_word']and($select==NickName) )
			{$sqlchk.="and E.Emp_NickName like '%$key_word%'";						
			}elseif($_POST['key_word']and($select==Department) )
			{$sqlchk.="and D.Dep_Name like '%$key_word%'";						
			}elseif($_POST['key_word']and($select==Position))
			{$sqlchk.="and P.Pos_Name like '%$key_word%'";

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

      echo"<tr >";
      echo"<td align='center'>$no</td>";
      echo"<td>$Emp_Name</td>";
      echo"<td>$Emp_NickName</td>";
      echo"<td>$Dep_Name</td>";
      echo"<td>$Pos_Name</td>";
      echo"<td align='center'><input type='checkbox' name='chkfri[]' value=$Emp_Id2>
      
          <IMG SRC=images/icon/del_fri.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
      echo"</tr>";
          $no++;

	}  
		?>
          
        </table>
        </form>
      </div>

</body>
</html>
