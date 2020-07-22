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
</head>
<style>
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


//-------------------------Decode------------------------------------------------------------	
        $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
        $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));

        $Mtt_IdEditCode=$_GET["Mtt_Id"];
        $Mtt_Id=base64_decode(base64_decode("$Mtt_IdEditCode"));
        $sqlMem = "select * from MaintenanceType where Mtt_Id='$Mtt_Id'";
        $queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
        $rsT= mssql_fetch_array($queryMem);

?>


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
                <form id="form1" name="form1" method="post" action="MaintenanceTypeEditSave_DB">
                    <table class="table">
                        <tr class="thead">
                            <td align="center" colspan="2" >Edit Maintenance Type</td>
                        </tr>
                        <tr>
                            <td>
                               Name
                            </td>
                            <td >
                                    <input class='form-control' name="Mtt_TypeName" type="text" id="Mtt_TypeName"
                                        value="<?=$rsT['Mtt_TypeName']?>" size="40" maxlength="40" />
                            </td>
                        </tr>
                        <tr>
                            <td>Note
                            </td>
                            <td align="center" valign="middle" bordercolor="#336699">
                                
                                    <textarea class='form-control' name="Mtt_Note" id="Mtt_Note" cols="45" rows="5"><?=$rsT['Mtt_Note']?>
                            </textarea>
                                    <input name="Mtt_Id2" type="hidden" id="Mtt_Id2" value="<?=$rsT['Mtt_Id']?>" />
                                    <input name="Mtt_TypeName2" type="hidden" id="Mtt_TypeName2"
                                        value="<?=$rsT['Mtt_TypeName']?>" />
                                    <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin"
                                        value="<?="$Usr_IdLogin";?>" />
                            </td>
                        </tr>
                        <tr>
                   
                        <td align="center" colspan="2">
                                    <input type="submit" name="button" id="button" value="Edit" class="btn btn-primary" />
                                    <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-primary"/>
                                    
                               </td>    
                        </tr>
                    </table>
                </form>
</body>

</html>