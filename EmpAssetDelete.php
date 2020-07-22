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


.hoz:hover {
    background-color: #cce4ff !important;

}

.ChkBox {

    margin-left: 8px !important;
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
	include "chksession.php";
	include "connect.php";	
	
	
	$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
    $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
    $Emp_IdEditCode=$_GET["Emp_Id"];
    $sqlMem = "SELECT E.Emp_Id, E.Emp_Number, " ;
    $sqlMem .= "E.Emp_Name, E.Emp_SurName, E.Emp_NickName, " ;
    $sqlMem .= "E.Emp_Nationality, E.Dep_Id, E.Pos_Id, " ;
    $sqlMem .= "E.Emp_Email, E.Emp_ExtensionNumber, E.Emp_Mobile, " ;
    $sqlMem .= "E.Emp_SpeedDial, D.Dep_Name, P.Pos_Name " ;
    $sqlMem .= "from (Employee E INNER JOIN Department D " ;
    $sqlMem .= "ON E.Dep_Id = D.Dep_Id) " ;
    $sqlMem .= "INNER JOIN Position P " ;
    $sqlMem .= "ON E.Pos_Id = P.Pos_Id " ;
    $sqlMem .= "WHERE Emp_Id='$Emp_IdEditCode'" ;
	$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
    while($rs=mssql_fetch_array($queryMem))
        {

    $Emp_Id=$rs[Emp_Id];
    $Emp_Name22=$rs[Emp_Name];
    $Emp_SurName22=$rs[Emp_SurName];
    $Dep_Name22=$rs[Dep_Name];
    $Pos_Name22=$rs[Pos_Name];
	  @session_start();
			$_SESSION[Emp_IdEditCode] =$Emp_IdEditCode;
			$_SESSION[Emp_Id] =$Emp_Id;

		
		}
?>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
    var d = document;
    if (d.images) {
        if (!d.MM_p) d.MM_p = new Array();
        var i, j = d.MM_p.length,
            a = MM_preloadImages.arguments;
        for (i = 0; i < a.length; i++)
            if (a[i].indexOf("#") != 0) {
                d.MM_p[j] = new Image;
                d.MM_p[j++].src = a[i];
            }
    }
}
</script>
</head>

<body>
    <?
include "admin-menu.php";

?>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 ">


            </div>
            <div class="col-lg-5 col-md-12 col-12 ">

                <table class="table">
                <tr class="thead">
                <td colspan="2">จัดการ Asset IT</td>
                </tr>
                    <tr>
                        <td align="right">
                            <strong>Employee:</strong>

                        </td>
                        <td>

                            <? echo "$Dep_Name22"; ?>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>

                            <? echo "$Emp_Name22 &nbsp;&nbsp; $Emp_SurName22"
                                                   ?>
                        </td>
</tr>

<tr >

 <td colspan='2'   align="center">
                            <? echo"<a class='btn btn-primary' href='EmpAssetSave.php?Usr_IdLogin=$Usr_IdLoginCode&Emp_Id=$Emp_Id '>Add AssetIt</a>"; ?>
                        </td>
                    
</tr>
                </table>
       
            </div>
        </div>
        <hr>
        <?

$Ast_Id=$_POST[Ast_Id];	
	@session_start();
			$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
			 $Emp_IdEditCode=$_SESSION[Emp_IdEditCode] ;
			  $Emp_Id=$_SESSION[Emp_Id] ;
?>
        <table class='table' id='myTable'>
            <thead>
                <tr class='thead'>
                    <td>No.</td>

                    <td>IP Address</td>
                    <td> Type </td>
                    <td>Brand</td>
                    <td>Model</td>
                    <td>Serial No.</td>
                    <td>Code</td>
                    <td>Location</td>
                    <td>Detail</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <p>&nbsp; </p>
            <p>
                <? 	$no=1;

			include "connect.php";

		 
				$sqlchk = " SELECT * FROM (((EmpAsset EA INNER JOIN Employee E ON EA.Emp_Id = E.Emp_Id)
				INNER JOIN AssetIT A ON A.Ast_Id = EA.Ast_Id)
				INNER JOIN Location L ON L.Loc_Id = A.Loc_Id)
			  WHERE E.Emp_Id='$Emp_Id'				
        AND A.Ast_Ip LIKE '%$key_IP_Address%' AND A.Ast_Type LIKE '$key_Ast_Type%' AND A.Ast_Brand LIKE '%$key_Brand%'AND L.Loc_Id LIKE '$key_Loc_Id%'
        AND A.Ast_Serial LIKE '%$key_Serial%' 
        AND A.Ast_Model LIKE '%$key_Model%' AND A.Ast_Code LIKE '%$key_Code%'
		
		
			ORDER BY Right(A.Ast_Ip,3),A.Ast_Type ASC,L.Loc_Name ASC" ;
		
		$querysh = mssql_query($sqlchk);

			while($rs=mssql_fetch_array($querysh))
			{

		$Ast_Id=$rs[Ast_Id];		
		$Ast_Serial=$rs[Ast_Serial];
		$Ast_Code=$rs[Ast_Code];
		$Ast_Ip=$rs[Ast_Ip];
		$Ast_ReceiveDate=$rs[Ast_ReceiveDate];
		$Ast_Warranty=$rs[Ast_Warranty];
		$Ast_DocRefer1=$rs[Ast_DocRefer1];
		$Ast_DocRefer2=$rs[Ast_DocRefer2];
		$Ast_Type=$rs[Ast_Type];
		$Ast_Brand=$rs[Ast_Brand];
		$Ast_Model=$rs[Ast_Model];
		$Ast_CPUBrand=$rs[Ast_CPUBrand];
		$Ast_CPUspeed=$rs[Ast_CPUspeed];
		$Ast_Capacity=$rs[Ast_Capacity];
		$Ast_Ram=$rs[Ast_Ram];
		$Ast_Desc1=$rs[Ast_Desc1];
		$Ast_Desc2=$rs[Ast_Desc2];
		$Ast_Desc3=$rs[Ast_Desc3];
		$Ast_Desc4=$rs[Ast_Desc4];
		$Ast_Desc5=$rs[Ast_Desc5];
		$Ast_Desc6=$rs[Ast_Desc6];
		$Ast_OSLicense=$rs[Ast_OSLicense];
		$Ast_OSInstalled=$rs[Ast_OSInstalled];
		$Ast_Note=$rs[Ast_Note];
		$Loc_Id=$rs[Loc_Id];
		
		$Loc_Name=$rs[Loc_Name];
		$Loc_Group=$rs[Loc_Group];
		 $Ast_IdCode=base64_encode(base64_encode("$Ast_Id"));
		echo"<tr>";
		echo"<td>$no</div></td>";
		echo"<td>&nbsp;$Ast_Ip</td>";
		echo"<td>&nbsp;$Ast_Type</td>";
		echo"<td>&nbsp;$Ast_Brand</td>";
		echo"<td>&nbsp;$Ast_Model</td>";
		echo"<td>&nbsp;$Ast_Serial</td>";
		echo"<td>&nbsp;$Ast_Code</td>";
		echo"<td>&nbsp;$Loc_Name&nbsp;$Loc_Group</td>";
		echo"<td><A HREF=\"AssetItdetailEmp.php?Usr_IdLogin=$Usr_IdLoginCode&Ast_Id=$Ast_IdCode\" target=_top >
    <IMG SRC=images/icon/Detail.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></div></td>";
    echo"<td><a href=\"EmpAssetDelete_DB.php?Usr_IdLogin=$Usr_IdLoginCodeDel&Ast_Id=$Ast_Id&Emp_Id=$Emp_Id\" target=_top  onclick=\" return confirm('Are you sure delete (Serial No :$Ast_Serial  )  ') \">Delete </a></td>";

		echo"</tr>";
				$no++;
	}  
	$number=$no-1;
		?>
            </p>
        </table>
        </form>


</body>

</html>