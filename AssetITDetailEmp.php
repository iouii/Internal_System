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
<?php
	include "chksession.php";
	include "connect.php";	
 $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
  $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
  
   $Ast_IdCode=$_GET["Ast_Id"];
   $Ast_Id=base64_decode(base64_decode("$Ast_Id"));
	$sqlMem = "select *" ;
	$sqlMem .= "from (AssetIT A INNER JOIN Location L " ;
	$sqlMem .= "ON A.Loc_Id = L.Loc_Id) " ;
	$sqlMem .= " where Ast_Id='$Ast_Id'";	
	$queryMem = mssql_query($sqlMem)or die("error=$sqlMem");
	$rsT= mssql_fetch_array($queryMem);
	@session_start();
		$Emp_IdEditCode=$_SESSION[Emp_IdEditCode] ;

?>

<script language="javascript" type="text/javascript">
function clearText(field) {
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
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
var defaultDateSeparator = "-";
var defaultDateFormat = "ymd"
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
    pickerDiv.style.center = x + "px";
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
            iFrameDiv.style.center = pickerDiv.style.center;
            iFrameDiv.style.zIndex = pickerDiv.style.zIndex - 1;
            iFrameDiv.style.visibility = pickerDiv.style.visibility;
            iFrameDiv.style.display = pickerDiv.style.display;
        } catch (e) {}

    } catch (ee) {}

}
</script>
<style >




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

tr {
    border: 1px solid #ddd !important;
}

td {

    border: 1px solid #ddd !important;
   
}
.dpDiv {}
.dpTable {
    font-family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 12px;
    text-align: right;
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
</head>

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
                <form action="AssetITEdit_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
                    <table class="table">
                        <tr class="thead">
                            <td colspan="2" > รายละเอียด AssetIT 
									<input class='form-control' name="Usr_IdLogin" type="hidden" id="Usr_IdLogin"
                                    value="<?="$Usr_IdLogin";?>" /></td>
                        </tr>
                        <tr>
                            <td align="right" >
                               Serial Number
                            </td>
                            <td  align="center" >
                                    <? echo $rsT['Ast_Serial'] ?>
                                   *
                                        <input class='form-control' name="Ast_Id" type="hidden" id="Ast_Id" value="<?=$rsT['Ast_Id']?>" />
                                   </td>
                        </tr>
                        <tr>
                            <td  align="right" >
							Code
                            </td>
                            <td  align="center" >
                                    <? echo $rsT['Ast_Code']?>
                                </td>
                        </tr>
                        <tr>
                            <td align="right" >
							IP Address
                             
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_Ip']?>
                                
                                    <input class='form-control' name="Ast_IpOri2" type="hidden" id="Ast_IpOri2"
                                        value="<?=$rsT['Ast_Ip']?>" />
                             </td>
                        </tr>
                        <tr>
                                <?
                $Ast_ReciveDate_Ori = $rsT['Ast_ReceiveDate'];                      
				$Ast_ReciveDateNewformat = date_create($Ast_ReciveDate_Ori);
				$Ast_ReciveDateNewformat = date_format($Ast_ReciveDateNewformat,'Y-m-d');
                     ?>
                            <td align="right" >
							Receive Date
                                        
                            </td>
                            <td  align="center" >
                                <? echo $Ast_ReciveDateNewformat ?>
                               *</td>
                        </tr>
                        <tr>
                            <td align="right" >
							Warranty 
                              
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_Warranty']?>Month</td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							DocRefer1
                                
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_DocRefer1']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >
							DocRefer2
                            </td>
                            <td  align="center" >
                                    <? echo $rsT['Ast_DocRefer2']?>
                                </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							Type
                            </td>
                            <td  align="center" valign="middle" >
                                    <? echo $rsT['Ast_Type'];?>
                                   *</td>
                        </tr>
                        <tr>
                            <td align="right" >
							<strong> <span >Brand</span>:</span></strong>
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_Brand']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							<strong><span >Model</span>:</span></strong>
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_Model']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >
							CPU Brand
                         
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_CPUBrand']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							CPU Speed
                                
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_CPUspeed']?>
								GHz</td>
                        </tr>
                        <tr>
                            <td align="right" >
							Capacity
                            
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_Capacity']?>
                               Gigabyte</td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							Ram
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_Ram']?>
                              Megabyte</td>
                        </tr>
                        <tr>
                            <td align="right" >
						Detail 1
                               
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_Desc1']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							Detail 2
                           
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_Desc2']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >
							Detail 3
                           
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_Desc3']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
						Detail 4
                            
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_Desc4']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >
							Detail 5
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_Desc5']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
						Detail 6
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_Desc6']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >
							OS License
                            </td>
                            <td  align="center" >
                                <? echo $rsT['Ast_OSLicense']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							OS Installed
                            </td>
                            <td  align="center" valign="middle" >
                                <? echo $rsT['Ast_OSInstalled']?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >
							Note
                            </td>
                            <td  align="center" >
                                    <? echo nl2br($rsT['Ast_Note']) ?>

                                </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" >
							Location
                            </td>
                            <td  align="center" valign="middle" >

                                <? echo $rsT['Loc_Name'];?>&nbsp;
                                <? echo $rsT['Loc_Group'];?>
                                *</td>
                        </tr>
                       
                    </table>
               
                </form>
               
</body>

</html>