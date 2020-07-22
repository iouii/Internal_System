<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
	$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
	$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));

 ?>

<script language="javascript" type="text/javascript">
function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
var datePickerDivID = "datepicker";
var iFrameDivID = "datepickeriframe";
var dayArrayShort = new Array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa');
var dayArrayMed = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
var dayArrayLong = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
var monthArrayShort = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
var monthArrayMed = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
var monthArrayLong = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
    'October', 'November', 'December');
var defaultDateSeparator =
    "-"; 
var defaultDateFormat =
    "ymd" 
var dateSeparator = defaultDateSeparator;
var dateFormat = defaultDateFormat;
function displayDatePicker(dateFieldName, displayBelowThisObject, dtFormat, dtSep) {
    var targetDateField = document.getElementsByName(dateFieldName).item(0);
    if (!displayBelowThisObject)
        displayBelowThisObject = targetDateField;
    if (dtSep)
        dateSeparator = dtSep;
    else
        dateSeparator = defaultDateSeparator;
    if (dtFormat)
        dateFormat = dtFormat;
    else
        dateFormat = defaultDateFormat;
    var x = displayBelowThisObject.offsetLeft;
    var y = displayBelowThisObject.offsetTop + displayBelowThisObject.offsetHeight;
    var parent = displayBelowThisObject;
    while (parent.offsetParent) {
        parent = parent.offsetParent;
        x += parent.offsetLeft;
        y += parent.offsetTop;
    }

    drawDatePicker(targetDateField, x, y);
}
function drawDatePicker(targetDateField, x, y) {
    var dt = getFieldDate(targetDateField.value);
    if (!document.getElementById(datePickerDivID)) {
        var newNode = document.createElement("div");
        newNode.setAttribute("id", datePickerDivID);
        newNode.setAttribute("class", "dpDiv");
        newNode.setAttribute("style", "visibility: hidden;");
        document.body.appendChild(newNode);
    }
    var pickerDiv = document.getElementById(datePickerDivID);
    pickerDiv.style.position = "absolute";
    pickerDiv.style.left = x + "px";
    pickerDiv.style.top = y + "px";
    pickerDiv.style.visibility = (pickerDiv.style.visibility == "visible" ? "hidden" : "visible");
    pickerDiv.style.display = (pickerDiv.style.display == "block" ? "none" : "block");
    pickerDiv.style.zIndex = 10000;
    refreshDatePicker(targetDateField.name, dt.getFullYear(), dt.getMonth(), dt.getDate());
}
function refreshDatePicker(dateFieldName, year, month, day) {
    var thisDay = new Date();
    if ((month >= 0) && (year > 0)) {
        thisDay = new Date(year, month, 1);
    } else {
        day = thisDay.getDate();
        thisDay.setDate(1);
    }
    var crlf = "\r\n";
    var TABLE = "<table cols=7 class='dpTable'>" + crlf;
    var xTABLE = "</table>" + crlf;
    var TR = "<tr class='dpTR'>";
    var TR_title = "<tr class='dpTitleTR'>";
    var TR_days = "<tr class='dpDayTR'>";
    var TR_todaybutton = "<tr class='dpTodayButtonTR'>";
    var xTR = "</tr>" + crlf;
    var TD =
        "<td class='dpTD' onMouseOut='this.className=\"dpTD\";' onMouseOver=' this.className=\"dpTDHover\";' "; // leave this tag open, because we'll be adding an onClick event
    var TD_title = "<td colspan=5 class='dpTitleTD'>";
    var TD_buttons = "<td class='dpButtonTD'>";
    var TD_todaybutton = "<td colspan=7 class='dpTodayButtonTD'>";
    var TD_days = "<td class='dpDayTD'>";
    var TD_selected =
        "<td class='dpDayHighlightTD' onMouseOut='this.className=\"dpDayHighlightTD\";' onMouseOver='this.className=\"dpTDHover\";' "; // leave this tag open, because we'll be adding an onClick event
    var xTD = "</td>" + crlf;
    var DIV_title = "<div class='dpTitleText'>";
    var DIV_selected = "<div class='dpDayHighlight'>";
    var xDIV = "</div>";
    var html = TABLE;
    html += TR_title;
    html += TD_buttons + getButtonCode(dateFieldName, thisDay, -1, "<") + xTD;
    html += TD_title + DIV_title + monthArrayLong[thisDay.getMonth()] + " " + thisDay.getFullYear() + xDIV + xTD;
    html += TD_buttons + getButtonCode(dateFieldName, thisDay, 1, ">") + xTD;
    html += xTR;
    html += TR_days;
    for (i = 0; i < dayArrayShort.length; i++)
        html += TD_days + dayArrayShort[i] + xTD;
    html += xTR;
    html += TR;
    for (i = 0; i < thisDay.getDay(); i++)
        html += TD + " " + xTD;
    do {
        dayNum = thisDay.getDate();
        TD_onclick = " onclick=\"updateDateField('" + dateFieldName + "', '" + getDateString(thisDay) + "');\">";
        if (dayNum == day)
            html += TD_selected + TD_onclick + DIV_selected + dayNum + xDIV + xTD;
        else
            html += TD + TD_onclick + dayNum + xTD;
        if (thisDay.getDay() == 6)
            html += xTR + TR;
        thisDay.setDate(thisDay.getDate() + 1);
    } while (thisDay.getDate() > 1)
    if (thisDay.getDay() > 0) {
        for (i = 6; i > thisDay.getDay(); i--)
            html += TD + " " + xTD;
    }
    html += xTR;
    var today = new Date();
    var todayString = "Today is " + dayArrayMed[today.getDay()] + ", " + monthArrayMed[today.getMonth()] + " " + today
        .getDate();
    html += TR_todaybutton + TD_todaybutton;
    html += "<button class='dpTodayButton' onClick='refreshDatePicker(\"" + dateFieldName +
        "\");'>this month</button> ";
    html += "<button class='dpTodayButton' onClick='updateDateField(\"" + dateFieldName + "\");'>close</button>";
    html += xTD + xTR;
    html += xTABLE;
    document.getElementById(datePickerDivID).innerHTML = html;
    adjustiFrame();
}
function getButtonCode(dateFieldName, dateVal, adjust, label) {
    var newMonth = (dateVal.getMonth() + adjust) % 12;
    var newYear = dateVal.getFullYear() + parseInt((dateVal.getMonth() + adjust) / 12);
    if (newMonth < 0) {
        newMonth += 12;
        newYear += -1;
    }

    return "<button class='dpButton' onClick='refreshDatePicker(\"" + dateFieldName + "\", " + newYear + ", " +
        newMonth + ");'>" + label + "</button>";
}
function getDateString(dateVal) {
    var dayString = "00" + dateVal.getDate();
    var monthString = "00" + (dateVal.getMonth() + 1);
    dayString = dayString.substring(dayString.length - 2);
    monthString = monthString.substring(monthString.length - 2);

    switch (dateFormat) {
        case "dmy":
            return dayString + dateSeparator + monthString + dateSeparator + dateVal.getFullYear();
        case "ymd":
            return dateVal.getFullYear() + dateSeparator + monthString + dateSeparator + dayString;
        case "mdy":
        default:
            return monthString + dateSeparator + dayString + dateSeparator + dateVal.getFullYear();
    }
}
function getFieldDate(dateString) {
    var dateVal;
    var dArray;
    var d, m, y;

    try {
        dArray = splitDateString(dateString);
        if (dArray) {
            switch (dateFormat) {
                case "dmy":
                    d = parseInt(dArray[0], 10);
                    m = parseInt(dArray[1], 10) - 1;
                    y = parseInt(dArray[2], 10);
                    break;
                case "ymd":
                    d = parseInt(dArray[2], 10);
                    m = parseInt(dArray[1], 10) - 1;
                    y = parseInt(dArray[0], 10);
                    break;
                case "mdy":
                default:
                    d = parseInt(dArray[1], 10);
                    m = parseInt(dArray[0], 10) - 1;
                    y = parseInt(dArray[2], 10);
                    break;
            }
            dateVal = new Date(y, m, d);
        } else if (dateString) {
            dateVal = new Date(dateString);
        } else {
            dateVal = new Date();
        }
    } catch (e) {
        dateVal = new Date();
    }

    return dateVal;
}
function splitDateString(dateString) {
    var dArray;
    if (dateString.indexOf("/") >= 0)
        dArray = dateString.split("/");
    else if (dateString.indexOf(".") >= 0)
        dArray = dateString.split(".");
    else if (dateString.indexOf("-") >= 0)
        dArray = dateString.split("-");
    else if (dateString.indexOf("\\") >= 0)
        dArray = dateString.split("\\");
    else
        dArray = false;

    return dArray;
}
function updateDateField(dateFieldName, dateString) {
    var targetDateField = document.getElementsByName(dateFieldName).item(0);
    if (dateString)
        targetDateField.value = dateString;

    var pickerDiv = document.getElementById(datePickerDivID);
    pickerDiv.style.visibility = "hidden";
    pickerDiv.style.display = "none";

    adjustiFrame();
    targetDateField.focus();

    if ((dateString) && (typeof(datePickerClosed) == "function"))
        datePickerClosed(targetDateField);
}
function adjustiFrame(pickerDiv, iFrameDiv) {
    var is_opera = (navigator.userAgent.toLowerCase().indexOf("opera") != -1);
    if (is_opera)
        return;
    try {
        if (!document.getElementById(iFrameDivID)) {
            var newNode = document.createElement("iFrame");
            newNode.setAttribute("id", iFrameDivID);
            newNode.setAttribute("src", "javascript:false;");
            newNode.setAttribute("scrolling", "no");
            newNode.setAttribute("frameborder", "0");
            document.body.appendChild(newNode);
        }
        if (!pickerDiv)
            pickerDiv = document.getElementById(datePickerDivID);
        if (!iFrameDiv)
            iFrameDiv = document.getElementById(iFrameDivID);
        try {
            iFrameDiv.style.position = "absolute";
            iFrameDiv.style.width = pickerDiv.offsetWidth;
            iFrameDiv.style.height = pickerDiv.offsetHeight;
            iFrameDiv.style.top = pickerDiv.style.top;
            iFrameDiv.style.left = pickerDiv.style.left;
            iFrameDiv.style.zIndex = pickerDiv.style.zIndex - 1;
            iFrameDiv.style.visibility = pickerDiv.style.visibility;
            iFrameDiv.style.display = pickerDiv.style.display;
        } catch (e) {}

    } catch (ee) {}

}
</script>
<style type="text/css">
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


.textsub{
    font-size:10px;
    color:red;
}

.dpDiv {}
.dpTable {
    font-family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 12px;
    text-align: center;
    color: #505050;
    background-color: #FFFFF2;
    border: 1px solid #AAAAAA;
}
.dpTR {}
.dpTitleTR {}
.dpDayTR {}
.dpTodayButtonTR {}
.dpTD {
    border: 1px solid #ece9d8;
}
.dpDayHighlightTD {
    background-color: #CCCCCC;
    border: 1px solid #AAAAAA;
}
.dpTDHover {
    background-color: #aca998;
    border: 1px solid #888888;
    cursor: pointer;
    color: red;
}
.dpTitleTD {}
.dpButtonTD {}
.dpTodayButtonTD {}
.dpDayTD {
    background-color: #CCCCCC;
    border: 1px solid #AAAAAA;
    color: white;
}
.dpTitleText {
    font-size: 12px;
    color: gray;
    font-weight: bold;
}
.dpDayHighlight {
    color: 4060ff;
    font-weight: bold;
}
.dpButton {
    font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
    font-size: 10px;
    color: gray;
    background: #d8e8ff;
    font-weight: bold;
    padding: 0px;
}
.dpTodayButton {
    font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
    font-size: 10px;
    color: gray;
    background: #d8e8ff;
    font-weight: bold;
}
</style>
<body>
<?
 
include "chksession.php";
include "connect.php";	
include "connect.php";	

@session_start();
    $Usr_IdLoginCode= $_SESSION[Usr_IdLoginSesCode] ;
    $Emaillink= $_SESSION['Emaillink'];
$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
$sqlShow = "SELECT * FROM Users WHERE Usr_Id='$Usr_IdLogin'";
$queryShow = mssql_query($sqlShow)or die("error=$sqlShow");
  while($rs=mssql_fetch_array($queryShow))
    {
      $Show_Usr_Account=$rs[Usr_Account];
      $Show_Usr_Name=$rs[Usr_Name];
   }
?>
    <?
include "admin-menu.php";
?>
    <hr>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 ">
            </div>
            <div class="col-lg-6 col-md-12 col-12 ">
                <form action="AssetITSave_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
                    <table class="table ">
                        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
                        <tr class="thead">
                            <td align="center" colspan="2">เพิ่ม AssetIT</td>
                        </tr>
                        <tr>
                            <td align="right">  Serial&nbsp;No </td>
                            <td align="left">
                                <input class='form-control ' name="Ast_Serial" type="text" id="Ast_Serial" size="30" maxlength="30" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">  Code </td>
                            <td align="left">
                                <input class='form-control ' name="Ast_Code" type="text" id="Ast_Code" size="15" maxlength="15" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">  IP&nbsp;Address </td>
                            <td align="left">
                                <input class='form-control ' name="Ast_Ip" type="text" id="Ast_Ip" Value="192.168.10." size="14"
                                    maxlength="14" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">  Receive&nbsp;Date </td>
                            <td align="left">
                                <input class='form-control ' name="Ast_ReceiveDate" size="10" maxlength="10" value="<?=date('Y-m-d') ?>" />
                                <a href="javascript:displayDatePicker('Ast_ReceiveDate')"><img src="images\formcal.gif"
                                        alt="" width="20" height="20" border="0" /></a> 
                            </td>
                        </tr>
                        <tr>
                            <td align="right">  Warranty <br> <p class="textsub">(Month)</p></td>
                            <td align="left">
                                <input class='form-control ' name="Ast_Warranty" size="2" maxlength="2" /></td>
                            
                        </tr>
                        <tr>
                            <td align="right">  DocRefer1 </td>
                            <td align="left"><input class='form-control ' name="Ast_DocRefer1" type="text" id="Ast_DocRefer1" size="20"
                                    maxlength="20" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">  DocRefer2 </td>
                            <td  align="left">
                                    <input class='form-control ' name="Ast_DocRefer2" type="text" id="Ast_DocRefer2" size="20"
                                        maxlength="20" />
                                </td>
                        </tr>
                        <tr>
                            <td align="right">  Type </td>
                            <td  align="left" >
                                    <select name="Ast_Type" id="Ast_Type" class='custom-select'>
                                        <option value="">&lt;Please select&gt;</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Printers">Printers</option>
                                        <option value="Server">Server</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="TapeReader">Tape Reader</option>
                                        <option value="Accessories">Accessories</option>
                                    </select>
                                    </td>
                        </tr>
                        <tr>
                            <td align="right">  Brand </td>
                            <td align="left"><input class='form-control '
                                    name="Ast_Brand" type="text" id="Ast_Brand" /></td>
                        </tr>
                        <tr>
                            <td align="right">  Model </td>
                            <td  align="left" ><input class='form-control ' name="Ast_Model"
                                    type="text" id="Ast_Model" size="30" maxlength="30" /></td>
                        </tr>
                        <tr>
                            <td align="right">  CPU&nbsp;Brand </td>
                            <td  align="left" ><input class='form-control '
                                    name="Ast_CPUBrand" type="text" id="Ast_CPUBrand" /></td>
                        </tr>
                        <tr>
                            <td align="right">  CPU&nbsp;Speed <br> <p class="textsub">(GHz)</p></td>
                            <td  align="left"><input class='form-control '
                                    name="Ast_CPUspeed" type="text" id="Ast_CPUspeed" size="30" maxlength="30" /></td>
                               
                        </tr>
                        <tr>
                            <td align="right">  Capacity <br> <p class="textsub">(Gigabyte)</p></td>
                            <td  align="left" ><input class='form-control '
                                    name="Ast_Capacity" type="text" id="Ast_Capacity" size="5" maxlength="5" /></td>
                               
                        </tr>
                        <tr>
                            <td align="right">  Ram <br> <p class="textsub">(Megabyte)</p> </td>
                            <td  align="left"><input class='form-control ' name="Ast_Ram"
                                    type="text" id="Ast_Ram" size="5" maxlength="5" /></td>
                               
                        </tr>
                        <tr>
                            <td align="right">  Detail&nbsp;1 </td>
                            <td  align="left" ><input class='form-control '
                                    name="Ast_Desc1" type="text" id="Ast_Desc1" /></td>
                        </tr>
                        <tr>
                            <td align="right">  Detail&nbsp;2 </td>
                            <td  align="left" ><input class='form-control ' name="Ast_Desc2"
                                    type="text" id="Ast_Desc2" /></td>
                        </tr>
                        <tr>
                            <td align="right">  Detail&nbsp;3 </td>
                            <td align="left" ><input class='form-control '
                                    name="Ast_Desc3" type="text" id="Ast_Desc3" /></td>
                        </tr>
                        <tr>
                            <td align="right">  Detail&nbsp;4 </td>
                            <td  align="left" ><input class='form-control ' name="Ast_Desc4"
                                    type="text" id="Ast_Desc4" /></td>
                        </tr>
                        <tr>
                            <td align="right">  Detail&nbsp;5 </td>
                            <td  align="left"><input class='form-control '
                                    name="Ast_Desc5" type="text" id="Ast_Desc5" /></td>
                        </tr>
                        <tr>
                            <td align="right">  Detail&nbsp;6 </td>
                            <td  align="left"><input class='form-control ' name="Ast_Desc6"
                                    type="text" id="Ast_Desc6" /></td>
                        </tr>
                        <tr>
                            <td align="right">  OS&nbsp;License </td>
                            <td align="left" ><input class='form-control '
                                    name="Ast_OSLicense" type="text" id="Ast_OSLicense" size="30" maxlength="30"
                                    Value="Windows " /></td>
                        </tr>
                        <tr>
                            <td align="right">  OS&nbsp;Installed </td>
                            <td  align="left" ><input class='form-control '
                                    name="Ast_OSInstalled" type="text" id="Ast_OSInstalled" Value="Windows " size="30"
                                    maxlength="30" /></td>
                        </tr>
                        <tr>
                            <td align="right">  Note </td>
                            <td align="left" >
                                    <textarea name="Ast_Note" id="Ast_Note" cols="45" rows="5" class='form-control '></textarea>
                                </td>
                        </tr>
                        <tr>
                            <td align="right">  Location </td>
                            <td  align="left">
                                <?
						include"connect.php"; 
							$dbquery1=mssql_query("SELECT * FROM Location ORDER BY Loc_Name  ASC ,Loc_Group ASC "); 
			         ?>
                                <select name="Loc_Id" id="Loc_Id" class='custom-select'>
                                    <option value="">&lt;Please select&gt;</option>
                                    <? while($rs1=mssql_fetch_array($dbquery1))  { ?>
                                    <option value="<? echo $rs1['Loc_Id'];?>">
                                        <? echo $rs1['Loc_Name'];?>&nbsp;
                                        <? echo $rs1['Loc_Group'];?>
                                    </option>
                                    <? }?>
                                </select>
                               </td>
                        </tr>
                        <tr>
                       
                            <td colspan="2" align="center">                                                           
                                    <input type="submit" name="button" id="button" value="Save" class="btn btn-primary" />
                                    <input type="reset" name="button2" id="button2" value="Clear" class="btn btn-warning" />
                            </td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                </form>
            </div>
        </div>
    </div>


</body>

</html>