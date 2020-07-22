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

    

    <script src="popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
    </script>
    <script src="bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">

    </script>
    <script src="bootstrap-select.min.js"></script>

    <link rel="icon" type="image/png" href="image\1ico.png" />
    <title>OguraClutch System</title>
</head>
<?
 
 	include "chksession.php";
	include "connect.php";	
	
//-----------------------------------------------------------------------------------------	
$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode")); 
$Usr_IdEditCode=$_GET["Usr_Id"];

//--------------------------------------------------------------------------------------------  
 ?>
<style>
.btn {
    margin-left: 20px;
}
.heads{
    background-color:#007BFF;
    color:#fff;
    
}
.headf{
    background-color:#007BFF;
    color:#fff;
   
}
.table {
    border: 1px solid #fff !important;
    text-align: left !important;
    border-radius: 3px !important;

}

.hoz:hover {
    background-color: #cce4ff !important;

}

.ChkBox {

    margin-left: 8px !important;
}

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
    font-size: 18px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

tr {
    font-size: 12px !important;
}

td {

    border: 1px solid #fff !important;
    font-size: 14px;
}
.row{
    margin-top:5px;
}
.sub{
    background-color:#D6EBFF;
}
</style>

<body>
<?
include "connect.php";	
?>
    <div class="container-fluid">
    <div class="row">
 <div class="col-lg-1 col-md-0 col-0"></div>
    <div class="col-lg-3 col-md-12 col-12">
    
    <table class='table' id='myTable'>

<tr>
<td class="headf" colspan="2" align="center">User Rights Edit</td>
</tr>
                        <input name="Usr_Id" type="hidden" id="Usr_Id" value="<?="$Usr_IdEditCode";?>" />

                        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
    <?	
	$sqlMem = "select * from (Users U INNER JOIN Department D " ;
	$sqlMem .= "ON U.Dep_Id = D.Dep_Id) " ;
	$sqlMem .= "INNER JOIN Position P " ;
	$sqlMem .= "ON U.Pos_Id = P.Pos_Id " ;
	$sqlMem .="where U.Usr_Id='$Usr_Id'";
		
		
	$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
	
	while($rs=mssql_fetch_array($queryMem))
	{
    $Usr_Id=$rs[Usr_Id];
    $Usr_Account=$rs[Usr_Account];
    $Usr_Password=$rs[Usr_Password];
    $Usr_Name=$rs[Usr_Name];
    $Usr_Surname=$rs[Usr_Surname];
    $Dep_Id=$rs[Dep_Id];
    $Pos_Id=$rs[Pos_Id];
    $Dep_Name=$rs[Dep_Name]; 
    $Pos_Name=$rs[Pos_Name];
            
            
    		
    echo"<tr class='sub'>";
    echo"<td>Name:</td>";
    echo"<td>$Usr_Name</td>";
    echo"</tr>";		
    echo"<tr class='sub'>";
    echo"<td>Department:</td>";
    echo"<td>$Dep_Name</td>";
    echo"</tr>";		
    echo"<tr class='sub'>";
    echo"<td>Position:</td>";
    echo"<td>$Pos_Name</td>";
    echo"</tr>";
		
        }
        
        ?>
</table>
</div>
  
            <div class="col-lg-3 col-md-12 col-12 ">
            <table class='table' id='myTable'>
            <tr>
        <td align="center" colspan="2" class="heads">Right have already</td>
        </tr>
<?  

$sqlMem4 = "select DISTINCT  * from (Users U inner JOIN UserFunction UF 
								ON U.Usr_Id = UF.Usr_Id)
								inner join Rights R
								ON UF.Rig_Id = R.Rig_Id 
								where U.Usr_Id ='$Usr_Id'";	
										
                    $sqlMem4.="ORDER BY R.Rig_Name ASC;" ;
					
					$querysh = mssql_query($sqlMem4);

                   
			while($rs=mssql_fetch_array($querysh))
			{
                
		$Rig_Name=$rs[Rig_Name];
		$Rig_PageLink=$rs[Rig_PageLink];
       
        $Rig_Id=$rs[9];
        $re .="'".","."'".$Rig_Id;
        
        
    
      $iLoop++;
        $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;

		echo"<tr bgcolor=$bgcolor>";
		
		echo"<td align='center'>$Rig_Name</td>";
	
		echo"</tr>";
                $no++;
                
    }  
    
   


?>
</table>
            </div>
        <div class="col-lg-4 col-md-12 col-12 ">
          
        <form action="UserRightsEdit_DB.php" method="post" enctype="multipart/form-data" name="form2"
                    id="form2">
                    <input name="Usr_Id" type="hidden" id="Usr_Id" value="<?="$Usr_IdEditCode";?>" />

<input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                    
        <table class='table' id='myTable'>
        
        <tr>
        <td align="center" colspan="2" class="heads">Please select the desired right</td>
        </tr>
       
<?     
//echo"$re";
$sqlRig = "select * from Rights where Rig_Id NOT IN ('$re');";	
       	
$queryRig =mssql_query($sqlRig);
while($rs=mssql_fetch_array($queryRig))
{
 
    $iLoop++;
$bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;
$Rig_Id=$rs[Rig_Id];
$Rig_Name=$rs[Rig_Name];
$Rig_PageLink=$rs[Rig_PageLink];


echo"<tr bgcolor=$bgcolor>";

echo"<td align='center'>$Rig_Name</td>";
echo"<td><span><input type='checkbox' name='chkfri[]' value=$Rig_Id>&nbsp;	$Rig_PageLink</a></span></td>";
echo"</tr>";		
}  

/*
    $sqlRig = "select * from Rights order by Rig_Name ASC; ";		
	$queryRig = mssql_query($sqlRig);
	while($rs=mssql_fetch_array($queryRig))
	{
        $iLoop++;
    $bgcolor = ( ($iLoop%2)==0 )? "#D6EBFF" : "#E0E0E0" ;
    $Rig_Id=$rs[Rig_Id];
    $Rig_Name=$rs[Rig_Name];
    $Rig_PageLink=$rs[Rig_PageLink];

    echo"<tr bgcolor=$bgcolor>";
    echo"<td>$Rig_Name:</td>";
	echo"<td><span><input type='checkbox' name='chkfri[]' value=$Rig_Id>&nbsp;	$Rig_PageLink</a></span></td>";
	echo"</tr>";		
	}  
    */


/*
$sqlRigy = "SELECT * FROM (Users U inner JOIN UserFunction UF 
ON U.Usr_Id = UF.Usr_Id)
INNER JOIN Rights R
ON UF.Rig_Id = R.Rig_Id 
WHERE NOT UF.Rig_Id IN ('$rew') ";			
$queryRigy = mssql_query($sqlRigy);

while($rsy= mssql_fetch_array($queryRigy))
{
    $Rig_Id=$rsy[Rig_Id];
    $Rig_Name=$rsy[Rig_Name];
    $Rig_PageLink=$rsy[Rig_PageLink];

    echo"<tr bgcolor=$bgcolor>";
    echo"<td>$Rig_Name:</td>";
	echo"<td><span><input type='checkbox' name='chkfri[]' value=$Rig_Id>&nbsp;	$Rig_PageLink</a></span></td>";
	echo"</tr>";		

}
  */
?>
    <tr>
    <td>
    <input type="submit" name="button" id="button" class="btn btn-primary" value="Submit" />
    </td>
    <td>
    <input type="reset" name="button2" id="button2" class="btn btn-primary" value="Reset" />
   
    <a href="UserAll.php?Usr_IdLogin=$Usr_IdLoginCode" class="btn btn-primary">Back</a>
    </td>
    </tr>
  
</form>
</table>
</body>

</html>