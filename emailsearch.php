<style>
body {

   /* background-color: #fafafa;*/

 
}


.hoz:hover {
    background-color: #cce4ff !important;

}


.font-si {
    font-size: 14px !important;
    color: #000;
}

.bodytable {

    background-color: #fff;
    border: 1px solid #000;
    border-radius: 3px !important;
    margin-top: 5px;
    font-size: 17px;

}

.thead {

    height: 6px !important;
    font-size: 18px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}



.bac {
    background-color: #e5e5e5;
}

.mr-2 {
    font-weight: bold;
}

.selectpicker {
    color: #000;
}

.selectpicker option:hover {
    color: #000;
}

#grouptext p {
color:red;
    font-size: 12px;
}

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>

<?php
$dbquery_position=mssql_query(" SELECT Pos_Name,Pos_Id FROM Position ORDER BY Pos_Name  ASC"); 
$dbquery_position2=mssql_query(" SELECT Pos_Name,Pos_Id FROM Position ORDER BY Pos_Name  ASC"); 

$dbquery_department=mssql_query(" SELECT Dep_Name,Dep_Id FROM Department ORDER BY Dep_Name  ASC"); 
$dbquery_department2=mssql_query(" SELECT Dep_Name,Dep_Id FROM Department ORDER BY Dep_Name  ASC"); 
$dbquery_nationality=mssql_query(" SELECT DISTINCT Emp_Nationality FROM Employee "); 

$dbquery_group=mssql_query(" SELECT  * FROM Groups "); 

?>

<body>
    <div class="container-fluid ">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-12 " id="relo">

                <table class="table the bac ">
                    <tr class="thead headhight">
                        <td colspan="6" align="center">
                            <h5> <b> SEARCH </b></h5>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">

                            <label class="my-1 mr-2 " for="Type" > Select&nbsp;:</label>
                        </td>
                        <td>
                            <select class="selectpicker" id="Type" name="Type" onchange="ShowEmail();">
                                <option value="e-mail" select="selected">E-mail</option>
                                <option value="te-lephone">Telephone</option>
                                <option value="gr-oup">Group</option>

                            </select>

                        </td>

                        <td align="right">

                            <label class="my-1 mr-2  " for="EmpName" title="ชื่อ">Name&nbsp;:</label>
                        </td>
                        <td>
                            <input type="text" id="EmpName" class="form-control " aria-describedby="passwordHelpInline"
                                name="EmpName" OnKeyup="ShowEmail();">

                        </td>

                        <td align="right">

                            <label class="my-1 mr-2 " for="EmpNickName" title="ชื่อเล่น">NickName&nbsp;:</label>
                        </td>
                        <td>
                            <input type="text" id="EmpNickName" class="form-control"
                                aria-describedby="passwordHelpInline" name="EmpNickName" OnKeyup="ShowEmail();">
                        </td>

                    </tr>


                    <tr>
                        <td align="right">

                            <label class="my-1 mr-2 " for="Group " title="กลุ่ม">Group :</label>
                        </td>
                        <td>
                            <div style="display:none" id="groupselect" >
                                   
                                <select name="Group" id="Group" OnChange="ShowEmail();" class='selectpicker' disabled
                                data-toggle="tooltip" title="">
                                    <option value="">Group All </option>
                                    <? while($qry=mssql_fetch_array($dbquery_group))  { ?>
                                    <option value="<? echo $qry['Grp_Id'];?>">
                                        <? echo $qry['Grp_Name'];?>
                                    </option>
                                    <? }?>
                                </select>

                            </div>
                            <div style="display:" id="grouptext">
                                <p>
                                  
                                </p>

                            </div>
                        </td>

                        <td align="right">

                            <label class="my-1 mr-2 " for="DepId" title="แผนก">Department&nbsp;:</label>
                        </td>
                        <td>

                            <div style="display:" id="cdepart">

                                <select class='selectpicker form-control' name="DepId" id="DepId"
                                    OnChange="ShowEmail();">

                                    <option select="selected" value="">Department All</option>
                                    <? while($qry=mssql_fetch_array($dbquery_department))  { ?>
                                    <option class="font-si" value="<? echo $qry['Dep_Name'];?>">
                                        <? echo $qry['Dep_Name'];?>

                                    </option>

                                    <? }?>
                                </select>
                            </div>

                            <div style="display:none" id="cdepartmul">

                                <select class='selectpicker form-control ' multiple data-actions-box="true" name="DepId"
                                    id="DepIdx" OnChange="ShowEmail();" data-selected-text-format="count > 2">

                                    <option select="selected" value="">Department All</option>
                                    <? while($qry=mssql_fetch_array($dbquery_department2))  { ?>
                                    <option class="font-si" value="<? echo $qry['Dep_Name'];?>">
                                        <? echo $qry['Dep_Name'];?>

                                    </option>

                                    <? }?>
                                </select>
                            </div>
                        </td>

                        <td align="right">

                            <label class="my-1 mr-2 " for="PosId" title="ตำแหน่ง">Position&nbsp;:</label>

                        </td>
                        <td>
                            <div style="display:" id="dii">

                                <select name="PosId" id="PosId" OnChange="ShowEmail()" class='selectpicker form-control'
                                    data-live-search="true">
                                    <option value="">Position All</option>
                                    <? while($qry=mssql_fetch_array($dbquery_position))  { ?>
                                    <option class="font-si" value="<? echo $qry['Pos_Name'];?>">
                                        <? echo $qry['Pos_Name'];?>
                                    </option>
                                    <? }?>
                                </select>
                            </div>
                            <div style="display:none" id="di">

                                <select name="PosIdz" id="PosIdz" OnChange="ShowEmail() "
                                    class='selectpicker form-control show-tick' multiple data-actions-box="true" data-selected-text-format="count >2">

                                    <? while($qryz=mssql_fetch_array($dbquery_position2))  { ?>
                                    <option class="font-si" value="<? echo $qryz['Pos_Name'];?>">
                                        <? echo $qryz['Pos_Name'];?>
                                    </option>
                                    <? }?>
                                </select>
                            </div>

                        </td>

                    </tr>

                    <tr>
                        <td align="right">

                            <label class="my-1 mr-2 " for="EmpNation"  >Nationality&nbsp;:</label>
                        </td>
                        <td>

                            <select name="EmpNation" id="EmpNation" OnChange="ShowEmail();" class='selectpicker'>
                                <option value="">Nationality All</option>
                                <? while($qry=mssql_fetch_array($dbquery_nationality))  { ?>
                                <option value="<? echo $qry['Emp_Nationality'];?>">
                                    <? echo $qry['Emp_Nationality'];?>
                                </option>
                                <? }?>
                            </select>

                        </td>
                        <td colspan="2"align="right">
                            <div class="custom-control custom-switch" OnChange="myFunctiondepartment();">
                                <input type="checkbox" class="custom-control-input" id="switch2" name="example"
                                    value="de">
                                <label class="custom-control-label" for="switch2" title="กดเพื่อเลือกมากกว่า 1 แผนก">Select multiple Department</label>
                            </div>


                        </td>
                        <td colspan="2"align="right">
                            <div class="custom-control custom-switch" OnChange="myFunction();">
                                <input type="checkbox" class="custom-control-input" id="switch1" name="example"
                                    value="cb">
                                <label class="custom-control-label" for="switch1" title="กดเพื่อเลือกมากกว่า 1 ตำแหน่ง">Select multiple position</label>
                            </div>



                        </td>
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
    function myFunction() {
   
        var checkBox = document.getElementById("switch1");
        
        var selectb = document.getElementById("di");
        var selecta = document.getElementById("dii");
        var mySelect = document.getElementById("PosIdz");

        if (checkBox.checked == true) {
            checkBox.value = "co";
            selectb.style.display = "block";
            selecta.style.display = "none";
            $("#PosId")[0].selectedIndex = 0;
            $('#PosId').selectpicker('refresh');
            $("#PosIdz").selectpicker('deselectAll');

        } else if (checkBox.checked == false) {
            checkBox.value = "cb";
            selectb.style.display = "none";
            selecta.style.display = "block";
            $("#PosId")[0].selectedIndex = 0;
            $('#PosId').selectpicker('refresh');
            $("#PosIdz").selectpicker('deselectAll');


        }

        ShowEmail();

    }
    </script>

    <script>
    function myFunctiondepartment() {
        // funcetion change select box to multi select box! 
        // Get the checkbox
        var checkBox = document.getElementById("switch2");
        // Get the output text
        var selectb = document.getElementById("cdepartmul");
        var selecta = document.getElementById("cdepart");
        var mySelect = document.getElementById("DepIdx");
        // If the checkbox is checked, display the output text.

        if (checkBox.checked == true) {
            checkBox.value = "do";
            selectb.style.display = "block";
            selecta.style.display = "none";
            $("#DepId")[0].selectedIndex = 0;
            $('#DepId').selectpicker('refresh');
            $("#DepIdx").selectpicker('deselectAll');

        } else if (checkBox.checked == false) {
            checkBox.value = "de";
            selectb.style.display = "none";
            selecta.style.display = "block";
            $("#DepId")[0].selectedIndex = 0;
            $('#DepId').selectpicker('refresh');
            $("#DepIdx").selectpicker('deselectAll');




        }

        ShowEmail();

    }
    </script>

  

</body>