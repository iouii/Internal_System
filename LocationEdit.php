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

    $Loc_IdEditCode=$_GET["Loc_Id"];
    $Loc_Id=base64_decode(base64_decode("$Loc_IdEditCode"));
	$sqlMem = "select * from Location where Loc_Id='$Loc_Id'";
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
            <div class="col-lg-3 col-md-12 col-12 ">
            </div>
            <div class="col-lg-6 col-md-12 col-12 ">



                <form id="form1" name="form1" method="post" action="LocationEditSave_DB">
                    <table class="table">


                        <tr class="thead">
                            <td colspan="2" align="center">Edit Location</td>
                        </tr>
                        <tr>
                            <td align="right">

                                <label for="Pos_Name" class="my-1 mr-2 ">Name :</label>
                            </td>
                            <td>
                                <input class='form-control' name="Loc_Name" type="text" id="Loc_Name"
                                    value="<?=$rsT['Loc_Name']?>" />

                            </td>
                        </tr>
                        <tr>
                            <td align="right">

                                <label for="Pos_Name" class="my-1 mr-2 ">Group :</label>
                            </td>
                            <td>
                                <input class='form-control' name="Loc_Group" type="text" id="Loc_Group"
                                    value="<?=$rsT['Loc_Group']?>" />

                            </td>
                        </tr>
                        <tr>
                            <td align="right">

                                <label for="Pos_Name" class="my-1 mr-2 ">Note :</label>
                            </td>
                            <td>
                                <textarea class='form-control' name="Loc_Note" id="Loc_Note" cols="45"
                                    rows="5"><?=$rsT['Loc_Note']?></textarea>
                                <input name="Loc_Id2" type="hidden" id="Loc_Id2" value="<?=$rsT['Loc_Id']?>" />
                                <input name="Loc_Name2" type="hidden" id="Loc_Name2" value="<?=$rsT['Loc_Name']?>" />
                                <input name="Loc_Group2" type="hidden" id="Loc_Group2" value="<?=$rsT['Loc_Group']?>" />
                                <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />

                            </td>
                        </tr>
                        <tr>
                            
                            <td colspan="2" align="center">
                                <input type="submit" name="button" id="button" value="Edit" class="btn btn-primary" />
                                <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning" />
                            </td>
                        </tr>
                    </table>
                </form>
                <p>&nbsp;</p>
                </p>
            </div>

</body>

</html>