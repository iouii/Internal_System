<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=tis-620" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="unicorn/css/bootstrap.min.css">
    <link rel="stylesheet" href="unicorn/css/unicons.css">
    <link rel="stylesheet" href="unicorn/css/owl.carousel.min.css">
    <link rel="stylesheet" href="unicorn/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="unicorn/css/tooplate-style.css">
    <link rel="stylesheet" href="bbc.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>


    <title>OguraClutch</title>
</head>
 <?
 
 	include "chksession.php";
	include "connect.php";	
	
	$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
	$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
	
	$Ast_IdCode=$_GET["Ast_Id"];	
	$Ast_Id=base64_decode(base64_decode("$Ast_IdCode"));

  $sqlDetail = "select *" ;
  $sqlDetail .= "from (AssetIT A INNER JOIN Location L " ;
  $sqlDetail .= "ON A.Loc_Id = L.Loc_Id) " ;
  $sqlDetail .= " where Ast_Id='$Ast_Id'";
    
  $result2=mssql_query($sqlDetail);
			while($rsT=mssql_fetch_array($result2))
		{	
  $Ast_Serial=$rsT[Ast_Serial];
  $Ast_Code=$rsT[Ast_Code];
  $Ast_Ip=$rsT[Ast_Ip];
  $Ast_ReceiveDate=$rsT[Ast_ReceiveDate];
  $Ast_Warranty=$rsT[Ast_Warranty];
  $Ast_DocRefer1=$rsT[Ast_DocRefer1];
  $Ast_DocRefer2=$rsT[Ast_DocRefer2];
  $Ast_Type=$rsT[Ast_Type];
  $Ast_Brand=$rsT[Ast_Brand];
  $Ast_Model=$rsT[Ast_Model];
  $Ast_CPUBrand=$rsT[Ast_CPUBrand];
  $Ast_CPUspeed=$rsT[Ast_CPUspeed];
  $Ast_Capacity=$rsT[Ast_Capacity];
  $Ast_Ram=$rsT[Ast_Ram];
  $Ast_Desc1=$rsT[Ast_Desc1];
  $Ast_Desc2=$rsT[Ast_Desc2];
  $Ast_Desc3=$rsT[Ast_Desc3];
  $Ast_Desc4=$rsT[Ast_Desc4];
  $Ast_Desc5=$rsT[Ast_Desc5];
  $Ast_Desc6=$rsT[Ast_Desc6];
  $Ast_OSLicense=$rsT[Ast_OSLicense];
  $Ast_OSInstalled=$rsT[Ast_OSInstalled];
  $Ast_Note=$rsT[Ast_Note];
  $Loc_Id=$rsT[Loc_Id];
  $Loc_Name=$rsT[Loc_Name];
  $Loc_Group=$rsT[Loc_Group];
	
	}

 ?>

<script language="javascript" type="text/javascript">

function PrintDiv() {
        var divToPrint = document.getElementById('container'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="css/print.css" rel="stylesheet" type="text/css">'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}

function printpr() 
{ 
var OLECMDID = 7; 
/* OLECMDID values: 
* 6 - print 
* 7 - print preview 
* 1 - open window 
* 4 - Save As 
*/
var PROMPT = 1; // 2 DONTPROMPTUSER 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(OLECMDID, PROMPT); 
WebBrowser1.outerHTML = ""; 
}
function autoTab(obj){  

var pattern=new String("_____-_____-_____-_____-_____"); // กำหนดรูปแบบในนี้  
var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
var returnText=new String("");  
var obj_l=obj.value.length;  
var obj_l2=obj_l-1;  
for(i=0;i<pattern.length;i++){  
if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
returnText+=obj.value+pattern_ex;  
obj.value=returnText;  
}  
}  
if(obj_l>=pattern.length){  
obj.value=obj.value.substr(0,pattern.length);  
}  
}  
function clearText(field)
{
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
var monthArrayLong = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
 
var defaultDateSeparator = "-";     
var defaultDateFormat = "ymd"    
var dateSeparator = defaultDateSeparator;
var dateFormat = defaultDateFormat;

function displayDatePicker(dateFieldName, displayBelowThisObject, dtFormat, dtSep)
{
  var targetDateField = document.getElementsByName (dateFieldName).item(0);
 
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
  var y = displayBelowThisObject.offsetTop + displayBelowThisObject.offsetHeight ;

  var parent = displayBelowThisObject;
  while (parent.offsetParent) {
    parent = parent.offsetParent;
    x += parent.offsetLeft;
    y += parent.offsetTop ;
  }
 
  drawDatePicker(targetDateField, x, y);
}

function drawDatePicker(targetDateField, x, y)
{
  var dt = getFieldDate(targetDateField.value );

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

function refreshDatePicker(dateFieldName, year, month, day)
{

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
  var TD = "<td class='dpTD' onMouseOut='this.className=\"dpTD\";' onMouseOver=' this.className=\"dpTDHover\";' ";    // leave this tag open, because we'll be adding an onClick event
  var TD_title = "<td colspan=5 class='dpTitleTD'>";
  var TD_buttons = "<td class='dpButtonTD'>";
  var TD_todaybutton = "<td colspan=7 class='dpTodayButtonTD'>";
  var TD_days = "<td class='dpDayTD'>";
  var TD_selected = "<td class='dpDayHighlightTD' onMouseOut='this.className=\"dpDayHighlightTD\";' onMouseOver='this.className=\"dpTDHover\";' ";    // leave this tag open, because we'll be adding an onClick event
  var xTD = "</td>" + crlf;
  var DIV_title = "<div class='dpTitleText'>";
  var DIV_selected = "<div class='dpDayHighlight'>";
  var xDIV = "</div>";
  var html = TABLE;
  html += TR_title;
  html += TD_buttons + getButtonCode(dateFieldName, thisDay, -1, "<") + xTD;
  html += TD_title + DIV_title + monthArrayLong[ thisDay.getMonth()] + " " + thisDay.getFullYear() + xDIV + xTD;
  html += TD_buttons + getButtonCode(dateFieldName, thisDay, 1, ">") + xTD;
  html += xTR;
  html += TR_days;
  for(i = 0; i < dayArrayShort.length; i++)
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
  var todayString = "Today is " + dayArrayMed[today.getDay()] + ", " + monthArrayMed[ today.getMonth()] + " " + today.getDate();
  html += TR_todaybutton + TD_todaybutton;
  html += "<button class='dpTodayButton' onClick='refreshDatePicker(\"" + dateFieldName + "\");'>this month</button> ";
  html += "<button class='dpTodayButton' onClick='updateDateField(\"" + dateFieldName + "\");'>close</button>";
  html += xTD + xTR;

  html += xTABLE;
 
  document.getElementById(datePickerDivID).innerHTML = html;
 
  adjustiFrame();
}
function getButtonCode(dateFieldName, dateVal, adjust, label)
{
  var newMonth = (dateVal.getMonth () + adjust) % 12;
  var newYear = dateVal.getFullYear() + parseInt((dateVal.getMonth() + adjust) / 12);
  if (newMonth < 0) {
    newMonth += 12;
    newYear += -1;
  }
 
  return "<button class='dpButton' onClick='refreshDatePicker(\"" + dateFieldName + "\", " + newYear + ", " + newMonth + ");'>" + label + "</button>";
}

function getDateString(dateVal)
{
  var dayString = "00" + dateVal.getDate();
  var monthString = "00" + (dateVal.getMonth()+1);
  dayString = dayString.substring(dayString.length - 2);
  monthString = monthString.substring(monthString.length - 2);
 
  switch (dateFormat) {
    case "dmy" :
      return dayString + dateSeparator + monthString + dateSeparator + dateVal.getFullYear();
    case "ymd" :
      return dateVal.getFullYear() + dateSeparator + monthString + dateSeparator + dayString;
    case "mdy" :
    default :
      return monthString + dateSeparator + dayString + dateSeparator + dateVal.getFullYear();
  }
}
function getFieldDate(dateString)
{
  var dateVal;
  var dArray;
  var d, m, y;
 
  try {
    dArray = splitDateString(dateString);
    if (dArray) {
      switch (dateFormat) {
        case "dmy" :
          d = parseInt(dArray[0], 10);
          m = parseInt(dArray[1], 10) - 1;
          y = parseInt(dArray[2], 10);
          break;
        case "ymd" :
          d = parseInt(dArray[2], 10);
          m = parseInt(dArray[1], 10) - 1;
          y = parseInt(dArray[0], 10);
          break;
        case "mdy" :
        default :
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
  } catch(e) {
    dateVal = new Date();
  }
 
  return dateVal;
}
function splitDateString(dateString)
{
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
function updateDateField(dateFieldName, dateString)
{
  var targetDateField = document.getElementsByName (dateFieldName).item(0);
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
function adjustiFrame(pickerDiv, iFrameDiv)
{
  var is_opera = (navigator.userAgent.toLowerCase().indexOf("opera") != -1);
  if (is_opera)
    return;
  try {
    if (!document.getElementById(iFrameDivID)) {
      var newNode = document.createElement("iFrame");
      newNode.setAttribute("id", iFrameDivID);
      newNode.setAttribute("src", "javascript:false;");
      newNode.setAttribute("scrolling", "no");
      newNode.setAttribute ("frameborder", "0");
      document.body.appendChild(newNode);
    }
    
    if (!pickerDiv)
      pickerDiv = document.getElementById(datePickerDivID);
    if (!iFrameDiv)
      iFrameDiv = document.getElementById(iFrameDivID);
    
    try {
      iFrameDiv.style.position = "absolute";
      iFrameDiv.style.width = pickerDiv.offsetWidth;
      iFrameDiv.style.height = pickerDiv.offsetHeight ;
      iFrameDiv.style.top = pickerDiv.style.top;
      iFrameDiv.style.left = pickerDiv.style.left;
      iFrameDiv.style.zIndex = pickerDiv.style.zIndex - 1;
      iFrameDiv.style.visibility = pickerDiv.style.visibility ;
      iFrameDiv.style.display = pickerDiv.style.display;
    } catch(e) {
    }
 
  } catch (ee) {
  }
 
}

</script>                
<style type="text/css">

.style33 {font-size: 12px}
body {
	background-color:#cecece;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
.style82 {font-size: 12px; font-weight: bold; }
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.col-form-label {
    text-align: right !important;
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

.table {
    border: 1px solid #fff !important;

    text-align: center !important;
    border-radius: 3px !important;


}



@media print {
	body {-webkit-print-color-adjust: exact;} 
	.hideWhenPrint {
	  display: none;
	}
}

.dpDiv {
	}

.dpTable {
	font-family: Tahoma, Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-align: center;
	color: #505050;
	background-color: #FFFFF2;
	border: 1px solid #AAAAAA;
	}

.dpTR {
	}

.dpTitleTR {
	}

.dpDayTR {
	}

.dpTodayButtonTR {
	}

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

.dpTitleTD {
	}

.dpButtonTD {
	}

.dpTodayButtonTD {
	}

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

.container{

width:794px;
height:1122px;
}

.style83 {color: #000000}

.print-table{
  border: 1px solid #DDDDDD !important;
}

tr{
  border: 1px solid #DDDDDD !important;
}
td{
  border: 1px solid #DDDDDD !important;
}
</style>
</head>
<body>

<a  OnClick="PrintDiv();" class="hideWhenPrint">พิมพ์หน้านี้</a> 
<form action="AssetITSave_DB.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
<div id="container">
<table class="print-table"  border="0" align="center" cellpadding="1" bgcolor="#FFFFFF">
<tr>
        <td colspan="2" rowspan="2"><img border='0' src='images/OguraBack.png'   width='207' height='50'/></td>
        <td colspan="4" align="center"><div align="left"><strong>OGURA CLUCTH (THAILAND) CO.,LTD.</strong></div></td>
      </tr>
      <tr>
        <td colspan="4" align="center"><div align="left">7/283 Moo.6 Tambon Mabyangphon Amphoe Pluakdaeng Rayong 21140</div></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td colspan="2" align="center"><input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" /></td>
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input name="btnPrint" type="button" id="btnPrint" value="Print" onClick="JavaScript:this.style.display='none';printpr();">
        </div></td>
        <td colspan="2" align="center">&nbsp;</td>
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="6" align="center"><strong>COMPUTER HISTORY</strong></td>
      </tr>
      <tr>
        <td colspan="6" align="center"><strong>Computer Device</strong></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><div align="left">Computer Name:<? echo  "$Ast_Desc1"; ?></div>        </td>
        <td width="339" align="center">&nbsp;</td>
        <td width="370" align="center"><div align="left">Doc Run No.:<? echo  "$Ast_DocRefer1"; ?></div>        </td>
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><div align="left">Type:<? echo  "$Ast_Type"; ?></div></td>
        <td align="center">&nbsp;</td>
        <td align="center"><div align="left">Doc Run No.2:<? echo  "$Ast_DocRefer2"; ?></div></td>
        <td width="28" align="center">&nbsp;</td>
        <td width="3" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><div align="left"><span class="style82">IP Address</span><span class="style33">:</span><? echo  "$Ast_Ip"; ?></div></td>
        <td align="center">&nbsp;</td>
        <td align="center"><div align="left"><span class="style82">Receive Date</span><span class="style33">:</span><? echo  "$Ast_ReceiveDate"; ?></div></td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="6" align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="6" align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><p>&nbsp;</p>
          <table width="72%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="199" bgcolor="#999999"><div align="center" class="style83">Device</div></td>
            <td width="295" bgcolor="#999999"><div align="center" class="style83">Product/Model/Size</div></td>
            <td width="216" bgcolor="#999999"><div align="center" class="style83">Serial Number</div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"  ><div align="left" class="style83">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="90">&nbsp;</td>
                  <td width="93"><span class="style82">Brand</span><span class="style33">:</span></td>
                </tr>
              </table>
            </div></td>
            <td bgcolor="#FFFFFF" ><div align="center" class="style83"><? echo  "$Ast_Brand"; ?></div></td>
            <td bgcolor="#FFFFFF" ><div align="center" class="style83"><? echo  "$Ast_Serial"; ?></div></td>
          </tr>
          <tr>
            <td><div align="left" class="style83">
              <div align="left" class="style83">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="90">&nbsp;</td>
                    <td width="93"><span class="style82">Model</span><span class="style33">:</span></td>
                  </tr>
                </table>
              </div>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_Model"; ?></div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_Code"; ?></div></td>
          </tr>
          <tr>
            <td><div align="left" class="style83">
              <div align="left" class="style83">
                <div align="left" class="style83">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="90">&nbsp;</td>
                      <td width="93"><span class="style82">CPU Brand</span><span class="style33">:</span></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_CPUBrand"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left" class="style83">
              <div align="left" class="style83">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="90">&nbsp;</td>
                    <td width="93"><span class="style82">CPU Speed</span>:</td>
                  </tr>
                </table>
              </div>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_CPUspeed"; ?><span class="style82"> GHz</span></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left" class="style83">
              <div align="left" class="style83">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="106">&nbsp;</td>
                    <td width="99"><span class="style82">Capacity</span><span class="style33">:</span></td>
                  </tr>
                </table>
              </div>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_Capacity"; ?><span class="style82"> Gigabyte</span></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left" class="style83">
              <div align="left" class="style83">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="90">&nbsp;</td>
                    <td width="93"><span class="style82">Ram</span><span class="style33">:</span></td>
                  </tr>
                </table>
              </div>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_Ram"; ?><span class="style82"> Megabyte</span></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left" class="style83">
              <div align="left" class="style83">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="90">&nbsp;</td>
                    <td width="93"><span class="style82">Detail </span><span class="style33">:</span></td>
                  </tr>
                </table>
              </div>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_Desc2"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center" class="style83"><? echo  "$Ast_Desc3"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center" class="style83"><? echo  "$Ast_Desc4"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center" class="style83"><? echo  "$Ast_Desc5"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center" class="style83"><? echo  "$Ast_Desc6"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="77">&nbsp;</td>
                    <td width="106"><span class="style82">OS License</span><span class="style33">:</span></td>
                  </tr>
                          </table>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_OSLicense"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="77">&nbsp;</td>
                    <td width="106"><span class="style82">OS Installed</span><span class="style33">:</span></td>
                  </tr>
                          </table>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_OSInstalled"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="77">&nbsp;</td>
                    <td width="106"><span class="style82">Location</span><span class="style33">:</span></td>
                  </tr>
                          </table>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Loc_Name"; ?>&nbsp;<? echo  "$Loc_Group"; ?></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
          <tr>
            <td><div align="left" class="style83">
              <div align="left">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="77">&nbsp;</td>
                      <td width="106"><span class="style82">Warranty Date</span><span class="style33">:</span></td>
                    </tr>
                              </table>
              </div>
            </div></td>
            <td><div align="center" class="style83"><? echo  "$Ast_Warranty"; ?> <span class="style82">Month</span></div></td>
            <td><div align="center"><span class="style83"><span class="style83"></span></span></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
        <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
        <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td width="83" align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="53" align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><div align="left"><span class="style82">Note</span><span class="style33">:</span></div></td>
        <td colspan="4" align="left" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><? echo  "$Ast_Note"; ?></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bordercolor="#336699">&nbsp;</td>
        <td align="center" valign="middle" bordercolor="#336699">&nbsp;</td>
        <td colspan="4" align="left" valign="middle" bordercolor="#336699">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="6" align="center" valign="middle" bordercolor="#336699" bgcolor="#FFFFFF"><label></label>
            <div align="center"></div></td>
      </tr>
    </table>
  <p>&nbsp;</p>
  </form>
<p>&nbsp;</p>
    </div>
    



   

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../js/logging.js'></script>
</body>
</html>
