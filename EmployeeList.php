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
.custom-select{
    font-size: 15px !important;
}
</style>

<body onload="ShowEmail()">


    <?
include('connect.php');

 
include "chksession.php";
include "connect.php";	
	
$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
 
 ?>
<body onload="ShowEmail()">
<?php

include "admin-menu.php";

?>
<hr>
<?  include "empsearch.php";

?>

</body>

<script>
function ShowEmail() {
var NaId = $("#EmpNation").val();
var DepId = $("#DepId").val();
var PosId = $("#PosId").val();
var EmpName = $("#EmpName").val();
var EmpNickName = $("#EmpNickName").val();
var Type = $("#Type").val();
var Group = $("#Group").val();
$.post("qeemp.php", {
    ENaId: NaId,
    EDepId: DepId,
    EPosId: PosId,
    EEmpName: EmpName,
    EEmpNickName: EmpNickName,
    EType: Type,
    EGroup: Group
}, function(data) {
    //alert(data);
    $("#ShowEmail").html(data);
});


}
$('#Type').change(function() {
$('#Group').prop('disabled', true);
if ($(this).val() == 'gr-oup') {
    $('#Group').prop('disabled', false);
}
});
</script>


</html>
