<?php
include('connect.php');

?>



<?php
$dbquery_position=mssql_query(" SELECT Pos_Name,Pos_Id FROM Position ORDER BY Pos_Name  ASC"); 

$dbquery_department=mssql_query(" SELECT Dep_Name,Dep_Id FROM Department ORDER BY Dep_Name  ASC"); 

$dbquery_nationality=mssql_query(" SELECT DISTINCT Emp_Nationality FROM Employee "); 

$dbquery_group=mssql_query(" SELECT  * FROM Groups "); 

?>  
<style>

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
   
    font-size: 12px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
   

}

td {

    border: 1px solid #fff !important;
    font-size: 12px;
}
.form-control{
    font-size:12px !important;
}
.custom-select{
    font-size:12px !important;
}
</style>
<body onload="ShowEmail()">
    

<div class="container-fluid ">

<div class="row">
    

    <div class="col-lg-12 col-md-12 col-12 ">


<table class="table the bac col-md-12 col-12">
<tr class="thead head-hunterz">
<td colspan="6" align="center"> <b>SEARCH <b></b> </td>
</tr>
            <tr>
                <td align="right">

                    <label class="my-1 mr-1 " for="Type"> Select :</label>
                </td>
                <td>
                    <select class="custom-select " id="Type" name="Type" OnChange="ShowEmail();">
                        <option value="e-mail" select="selected">E-mail</option>
                        <option value="te-lephone">Telephone</option>
                        <option value="gr-oup">Group</option>

                    </select>

                </td>

                <td align="right">

                    <label class="my-1 mr-2  " for="EmpName">Name :</label>
                </td>
                <td>
                    <input type="text" id="EmpName" class="form-control" aria-describedby="passwordHelpInline"
                        name="EmpName" OnKeyPress="ShowEmail();">


                </td>

                <td>

                    <label class="my-1 mr-2 " for="EmpNickName">NickName :</label>
                </td>
                <td>
                    <input type="text" id="EmpNickName" class="form-control"
                        aria-describedby="passwordHelpInline" name="EmpNickName" OnKeyPress="ShowEmail();">
                </td>

            </tr>
            <tr>
                <td align="right">

                    <label class="my-1 mr-2 " for="Group">Group :</label>
                </td>
                <td>
                    <select name="Group" id="Group" disabled="disabled" OnChange="ShowEmail();"
                        class='custom-select'>

                        <option value="">Group</option>
                        <? while($qry=mssql_fetch_array($dbquery_group))  { ?>
                        <option value="<? echo $qry['Grp_Id'];?>">
                            <? echo $qry['Grp_Name'];?>
                        </option>
                        <? }?>
                    </select>

                </td>

                <td align="right">

                    <label class="my-1 mr-2 " for="DepId">Department :</label>
                </td>
                <td>
                    <select name="DepId" id="DepId" OnChange="ShowEmail();" class='custom-select'>
                        <option value="">Department All</option>
                        <? while($qry=mssql_fetch_array($dbquery_department))  { ?>
                        <option value="<? echo $qry['Dep_Name'];?>">
                            <? echo $qry['Dep_Name'];?>

                        </option>

                        <? }?>
                    </select>

                </td>

                <td align="right">

                    <label class="my-1 mr-2 " for="PosId">Position :</label>
                </td>
                <td>
                    <select name="PosId" id="PosId" OnChange="ShowEmail();" class='custom-select'>
                        <option value="">Position All</option>
                        <? while($qry=mssql_fetch_array($dbquery_position))  { ?>
                        <option value="<? echo $qry['Pos_Name'];?>">
                            <? echo $qry['Pos_Name'];?>
                        </option>
                        <? }?>
                    </select>


                </td>

            </tr>
            <tr>
                <td align="right">

                    <label class="my-1 mr-2 " for="EmpNation">Nationality :</label>
                </td>
                <td>
                    <select name="EmpNation" id="EmpNation" OnChange="ShowEmail();" class='custom-select '>
                        <option value="">Nationality</option>
                        <? while($qry=mssql_fetch_array($dbquery_nationality))  { ?>
                        <option value="<? echo $qry['Emp_Nationality'];?>">
                            <? echo $qry['Emp_Nationality'];?>
                        </option>
                        <? }?>
                    </select>

                </td>
                <td colspan="4"></td>
            </tr>
        </table>
    </div>
</div>
<hr>


<div class="row">
<div id="ShowEmail" class="col-lg-12 col-md-12 col-12"></div>
</div>
</div>
</div>
<script>
function ShowEmail() {
    var NaId = $("#EmpNation").val();
    var DepId = $("#DepId").val();
    var PosId = $("#PosId").val();
    var EmpName = $("#EmpName").val();
    var EmpNickName = $("#EmpNickName").val();
    var Type = $("#Type").val();
    var Group = $("#Group").val();
    $.post("qemail.php", {
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
</body>
