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
    font-size:12px;
}
tr {
    border: 1px solid #ddd !important;
}

td {

    border: 1px solid #ddd !important;
    
}
</style>
<?php
//mysql_query('SET CHARACTER SET utf8');

	include "chksession.php";
	include "connect.php";	
	
	
	$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
  

   $Ast_IdEditCode=$_GET["Ast_Id"];
   $Ast_Id=base64_decode(base64_decode("$Ast_IdEditCode"));
   
      $Link=$_GET["Link"];


if( $Link==AssetIt){
			$sqlMem = "select *" ;
			$sqlMem .= "from (AssetIT A INNER JOIN Location L " ;
			$sqlMem .= "ON A.Loc_Id = L.Loc_Id) " ;
			$sqlMem .= "where A.Ast_Id='$Ast_Id'" ;
			
}elseif($Link==EmpAndCom){
	
			$sqlMem = "select *" ;
			$sqlMem .= "from (((((AssetIT A INNER JOIN Location L " ;
			$sqlMem .= "ON A.Loc_Id = L.Loc_Id) " ;
			$sqlMem .= "INNER JOIN EmpAsset EA ON A.Ast_Id = EA.Ast_Id)";
			$sqlMem .= "INNER JOIN Employee E ON EA.Emp_Id = E.Emp_Id)";
			$sqlMem .= "INNER JOIN Department D ON D.Dep_Id = E.Dep_Id)";
			$sqlMem .= "INNER JOIN Position P ON P.Pos_Id = E.Pos_Id)";
			$sqlMem .= "where A.Ast_Id='$Ast_Id'" ;
	}

			

	$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
	//$rsT= mssql_fetch_array($queryMem);
	
		while($rs=mssql_fetch_array($queryMem))
			{

		$Ast_Id22=$rs[Ast_Id];
		$Ast_Ip22=$rs[Ast_Ip];
		$Ast_Type22=$rs[Ast_Type];
		$Ast_Brand22=$rs[Ast_Brand];
		$Ast_CPUspeed22=$rs[Ast_CPUspeed];
		$Loc_Id22=$rs[Loc_Id];
		$Loc_Name22=$rs[Loc_Name];
		$Loc_Group22=$rs[Loc_Group];
		$Emp_Name22=$rs[Emp_Name];
		$Dep_Name22=$rs[Dep_Name];
		$Pos_Name22=$rs[Pos_Name];


		
		}
?>


</head>

<body>

    <?
include "admin-menu.php";

?>
    <hr>

    <div class="container">

        <div class="row">
          
            <div class="col-lg-4 col-md-12 col-12 ">
              
                <form id="form1" name="form1" method="post" action="">

                    <table class="table">
<tr class="thead">
<td colspan="2"> Delete Software</td>
</tr>
                        <tr>
                            <td>IP&nbsp;Address :</td>
                            <td>
                                <? echo "$Ast_Ip22"; ?>
                            </td>

                            
                        </tr>

                    </table>
            
                    <table class="table">
                    <tr class="thead">
                    <td colspan="2"> ค้นหาข้อมูล Software</td>
                    </tr>
                        <tr>
                            <td>
                                <select name="select" id="select" class='custom-select'>
                                    <option value="Name">Name</option>
                                    <option value="Version">Version</option>
                                </select>

                            </td>

                            <td>
                                <input type="text" name="key_word" id="key_word" class='form-control ' />
                            </td>

                        </tr>
                        <tr>
                           
                            <td colspan="2" align="center">
                                <input type="submit" name="button" id="button" value="Search" class="btn btn-info" />
                                <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning" />
                            </td>

                        </tr>
                    </table>

                </form>

            </div>
        
          

            <div class="col-lg-8 col-md-12 col-12 ">

                <form id="form2" name="form2" method="post" action="SoftwareAssetDelete_DB.php">
                    <input name="Emp_Id22" type="hidden" id="Emp_Id22" value="<?="$Emp_Id";?>" />
                    <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                    <input name="Ast_Id22" type="hidden" id="Ast_Id22" value="<?="$Ast_Id";?>" />
                    <input name="Link" type="hidden" id="Link" value="<?="$Link";?>" />


                    <input type="submit" name="button3" id="button3" value="Delete Software" class="btn btn-danger" />
                   
                                <? echo"<a class='btn btn-primary' href='SoftwareAssetSave.php?Usr_IdLogin=$Usr_IdLoginCode&Ast_Id=$Ast_IdEditCode&Link=$Link'>Add&nbsp;Software</a>"; ?>
                           
                    
                    <table class="table">
                    

                    <thead>
                        <tr class='thead'>
                            <td>No.</td>
                            <td>Delete</td>
                            <td>Name</td>
                            <td>Version</td>
                            <td>Receive&nbsp;Date</td>
                            <td>Expire&nbsp;Date</td>
                           
                        </tr>
                    </thead>
                    <p>&nbsp; </p>
                    <p>
                        <? 	$no=1;

			include "connect.php";

			         	
				$sqlchk = " select * from ((SoftwareAsset SA inner join AssetIT A on SA.Ast_Id = A.Ast_Id)";
				$sqlchk .="inner join Software S on S.Sof_Id = SA.Sof_Id)";
				$sqlchk .="where A.Ast_Id=$Ast_Id";	
	
		
			
			if ($_POST['key_word']and($select==Name) )
			{$sqlchk.=" where S.Sof_Name like '%$key_word%'";
			
			
			}elseif($_POST['key_word']and($select==Version) )
			{$sqlchk.=" where S.Sof_Version like '%$key_word%'";
			
			/*
			
			}elseif($_POST['Ast_Type']and($select==Server) )
			{$sqlchk.=" and A.Ast_Type like '%$key_word%'";
			
			
			}elseif($_POST['key_word']and($select==Pinters))
			{$sqlchk.=" and A.Ast_Type like '%$key_word%'";
			
			}elseif($_POST['key_word']and($select==IPAddress))
			{$sqlchk.=" and  A.Ast_Ip like '%$key_word%'";
			*/
	

			} 
			//-------------------------------------------------------------------------------------
			
		$sqlchk.=" ORDER BY S.Sof_Name ASC, S.Sof_Version ASC, S.Sof_ExpireDate ASC ; " ;
		
		$querysh = mssql_query($sqlchk);

			while($rs=mssql_fetch_array($querysh))
			{

		$Sof_Id=$rs[Sof_Id];
		$Sof_SerialCode=$rs[Sof_SerialCode];
		$Sof_SerialNo=$rs[Sof_SerialNo];
		$Sof_Name=$rs[Sof_Name];
		$Sof_Version=$rs[Sof_Version];
		$Sof_ReceiveDate=$rs[Sof_ReceiveDate];
		$Sof_ExpireDate=$rs[Sof_ExpireDate];
		$Sof_Desc1=$rs[Sof_Desc1];
		$Sof_Desc2=$rs[Sof_Desc2];
		$Sof_Desc3=$rs[Sof_Desc3];
		$Sof_Note=$rs[Sof_Note];
				
			

 //----------------------Format Date-------------------------------------------------------------  
                $Sof_ReceiveDate_Ori = $Sof_ReceiveDate;                     
				$Sof_ReceiveDateNewformat = date_create($Sof_ReceiveDate_Ori);
				$Sof_ReceiveDateNewformat = date_format($Sof_ReceiveDateNewformat,'Y-m-d');
//-----------------------------------------------------------------------------------------------
 //----------------------Format Date-------------------------------------------------------------  
                $Sof_ExpireDate_Ori = $Sof_ExpireDate;                     
				$Sof_ExpireDateNewformat = date_create($Sof_ExpireDate_Ori);
				$Sof_ExpireDateNewformat = date_format($Sof_ExpireDateNewformat,'Y-m-d');
//-----------------------------------------------------------------------------------------------
			


//---------------------------------------------------------------------


		echo"<tr>";
		echo"<td align='center'>$no</td>";
		echo"<td align='center'><input type='checkbox' name='chkfri[]' value=$Sof_Id>";
		
				
		echo"<td> &nbsp;$Sof_Name</td>";
		echo"<td align='center'>&nbsp;$Sof_Version</td>";
		echo"<td align='center'>&nbsp;$Sof_ReceiveDateNewformat</td>";
		echo"<td align='center'>&nbsp;$Sof_ExpireDateNewformat</td>";
		echo"</tr>";
				$no++;
	}  
		?>
                    </p>
                    </table>
                </form>
   
</body>

</html>