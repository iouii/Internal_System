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

.frame{
    width:100%;
    height:600px;
}
</style>
<body onload="ShowEmail()">


    <?
include('connect.php');

?>
    <?
include "admin-menu.php";

?>
    <hr>
<!--
    <? // include "emailsearch.php";

?>

-->

<div class="container-fluid">
<div class="row">

<div class="col-lg-12">
<iframe src="email-index.php" frameborder="0" class='frame'></iframe>
</div>

</div>

</div>

</body>


<script>
/*
function ShowEmail() {
    var NaId = $("#EmpNation").val();
    var DepId = $("#DepId").val();
    var PosId = $("#PosId").val();
    var EmpName = $("#EmpName").val();
    var EmpNickName = $("#EmpNickName").val();
    var Type = $("#Type").val();
    var Group = $("#Group").val();
    var PosIdz = $("#PosIdz").val();
    var Chk = $("#switch1").val();
    var DepIdx = $("#DepIdx").val();
    var Chkde = $("#switch2").val();

    //alert(DepId + " email-index.php");

    $.post("qemailnon.php", {
        ENaId: NaId,
        EDepId: DepId,
        EPosId: PosId,
        EEmpName: EmpName,
        EEmpNickName: EmpNickName,
        EType: Type,
        EGroup: Group,
        EDepIdx: DepIdx,
        EPosIdz: PosIdz,
        EChkde: Chkde,
        EChk: Chk

    }, function(data) {
        //alert(data);
        $("#ShowEmail").html(data);
    });


}

$('#Type').change(function() {

    var groupselect = document.getElementById("groupselect");
    var grouptext = document.getElementById("grouptext");

    if ($(this).val() == 'gr-oup') {
        $('#Group').prop('disabled', false);
        $('#Group').selectpicker('refresh');
        $("#Group")[0].selectedIndex = 0;

        grouptext.style.display = "none";
        groupselect.style.display = "block";

    } else {

        $("#Group")[0].selectedIndex = 0;
        $('#Group').prop('disabled', true);
        $('#Group').selectpicker('refresh');
        grouptext.style.display = "block";
        groupselect.style.display = "none";
    }

});




$('#Type').change(function() {

    var checkBox = document.getElementById("switch1");
    var checkBox2 = document.getElementById("switch2");
    var selectb = document.getElementById("di");
    var selecta = document.getElementById("dii");
    var selectc = document.getElementById("cdepartmul");
    var selectd = document.getElementById("cdepart");
    var re = document.getElementById("PosIdz");
    var Dept = document.getElementById("DepId");
    var Dept = document.getElementById("DepId");

    if ($(this).val() == 'e-mail') {
        checkBox.value = "cb";
        checkBox2.value = "de";
        selectb.style.display = "none";
        selecta.style.display = "block";

        selectc.style.display = "none";
        selectd.style.display = "block";
        $("#PosId")[0].selectedIndex = 0;
        $('#PosId').selectpicker('refresh');
        $("#DepId")[0].selectedIndex = 0;
        $("#DepIdx")[0].selectedIndex = 0;
        $("#EmpNation")[0].selectedIndex = 0;
        $('#DepId').selectpicker('refresh');
        $('#DepIdx').selectpicker('refresh');
        $('#DepIdx').selectpicker('deselectAll');
        $("#PosIdz").selectpicker('deselectAll');
        $('#switch1').prop('disabled', false);
        $('#switch2').prop('disabled', false);
        $('#EmpNation').selectpicker('refresh');
        EmpNation
    } else {

        checkBox.checked = false;
        checkBox.value = "co";
        checkBox2.checked = false;
        checkBox2.value = "do";
        selectb.style.display = "none";
        selecta.style.display = "block";
        selectc.style.display = "none";
        selectd.style.display = "block";
        $("#PosId")[0].selectedIndex = 0;
        $('#PosId').selectpicker('refresh');
        $("#DepId")[0].selectedIndex = 0;
        $("#DepIdx")[0].selectedIndex = 0;
        $("#EmpNation")[0].selectedIndex = 0;
        $('#DepId').selectpicker('refresh');
        $('#DepIdx').selectpicker('refresh');
        $('#DepIdx').selectpicker('deselectAll');
        $("#PosIdz").selectpicker('deselectAll');
        $('#EmpNation').selectpicker('refresh');

        $('#switch1').prop('disabled', true);
        $('#switch2').prop('disabled', true);
    }


    ShowEmail();

});*/
</script>
</html>