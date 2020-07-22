<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
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
    font-size: 18px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

.table {
    border: 1px solid #fff !important;

    text-align: center !important;
    border-radius: 3px !important;


}

tr {
    font-size: 12px !important;
}

td {

    border: 1px solid #fff !important;
    font-size: 14px;
}

.in-pu {

    width: 20%;
}
.headf{
    background-color:#007BFF;
    color:#fff;
   
}
.sub{
    background-color:#D6EBFF;
}
</style>
<?
 
 	include "chksession.php";
	include "connect.php";
	
//-----------------------------------------------------------------------------------------	
		 $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
  $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
  
 $Usr_IdEditCode=$_GET["Usr_Id"];
   $Usr_Id=base64_decode(base64_decode("$Usr_IdEditCode"));



//--------------------------------------------------------------------------------------------
	
 
 
 ?>

<script type="text/javascript">
function onDelete() {
    if (confirm('Do you want to delete ?') == true) {
        return true;
    } else {
        return false;
    }
} 


</script>
</head>
<body >
<?
include "admin-menu.php";

?>
    <hr>
    
    <div class="container-fluid">
        <div class="row">
        
<div class="col-lg-1">
</div>
            <div class="col-lg-3 col-md-12 col-12 ">

            <table class="table">
                        <tr class="headf">
                            <td  colspan="2">
                                    Rights
                            </td>
                            </tr>
                        <tr class="sub">
                            <td align="center">
                                <strong for="" class="my-1 mr-2 ">User</strong>
                            </td>
                            <td>
                                <label class="my-1 mr-2 ">
                                    <? 
							include "connect.php";
						$sqlMem = "select Usr_Account from Users where Usr_Id='$Usr_Id'";
							$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
		while($rs8=mssql_fetch_array($queryMem))
			{
						$Usr_Account88=$rs8[Usr_Account];
			}
						echo "$Usr_Account88";
			 ?>
                                </label>
                            </td>

                        </tr>

                        <tr class="sub">
                            <td align="center">


                                <strong for="" class="my-1 mr-2 ">Department:</strong>
                            </td>
                            <td>
                                <label class="my-1 mr-2 ">
                            <? 
							include "connect.php";
						$sqlDep = "select Dep_Name from ((Users U Left JOIN UserFunction UF 
									ON U.Usr_Id = UF.Usr_Id) 
									INNER JOIN Department D 
									ON U.Dep_Id = D.Dep_Id)
									where U.Usr_Id=$Usr_Id";
							$queryDep = mssql_query($sqlDep)or die("error=$sqlDep");
							while($rsD=mssql_fetch_array($queryDep))
			{
						$Dep_Name=$rsD[Dep_Name];
						}
						echo "$Dep_Name";
						 ?>
                            </label>          
            </td>   
            </tr> 

                
            </table>
           
          
                        
            </div>
           
           
           
            <div class="col-lg-7 col-md-12 col-12 ">
            <form id="form1" name="form1" method="post" action="UserRightsShowAllDelete.php"
                    OnSubmit="return onDelete();">
            <table class='table' id='myTable'>
                <thead>
                    <tr class='thead'>
                        <td>No.</td>
                        <td> Name Button </td>
                        <td>Link Button</td>

                        <td>Delete</td>

                    </tr>
                </thead>
                <?  $no=1;
					  	include "connect.php";										
					$sqlMem4 = "select * from (Users U inner JOIN UserFunction UF 
								ON U.Usr_Id = UF.Usr_Id)
								inner join Rights R
								ON UF.Rig_Id = R.Rig_Id 
								where U.Usr_Id ='$Usr_Id'";	
										
                    $sqlMem4.="ORDER BY R.Rig_Name ASC;" ;
					
					$querysh = mssql_query($sqlMem4);

			while($rs=mssql_fetch_array($querysh))
			{
		$Rig_Id=$rs[Rig_Id];
		$Rig_Name=$rs[Rig_Name];
		$Rig_PageLink=$rs[Rig_PageLink];

		$iLoop++;
        $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;

		echo"<tr bgcolor=$bgcolor>";
		echo"<td>$no</td>";
		echo"<td>$Rig_Name</td>";
		echo"<td>$Rig_PageLink</td>";
		echo"<td><input type='checkbox' name='chkfri[]' value=$Rig_Id></td>";			
		echo"</tr>";
				$no++;
	}  
           ?>
            <tr>                    
                    <td>
                        
                        <input name="Usr_Id88" type="hidden" id="Usr_Id88" value="<?="$Usr_Id";?>" />
                        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />

                    </td>
                   
                    <td>
                    <input type="submit" name="button" id="button" value="Delete" class="btn btn-danger" />
                        <?echo"  <a class='btn btn-primary'HREF=\"UserRightsEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Usr_Id=$Usr_Id\">Add </a>"?>
                   
                    </td>
                </tr>   
            </table>
            
            </form>
        </div>
        



        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
        <script type='text/javascript' src='../js/logging.js'></script>
</body>

</html>