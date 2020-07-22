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
	
  $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
  $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
					//echo"$Usr_IdLogin";
 
 ?>

<style>
.col-form-label {
    text-align: right !important;
}

.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 14px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

table{
    font-size:10px;
}

tr {
    border: 1px solid #ddd !important;
}

td {

    border: 1px solid #ddd !important;
}


/* the div that holds the date picker calendar */
.dpDiv {}

/* the table (within the div) that holds the date picker calendar  background-color: #ece9d8; */
.dpTable {
    font-family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 12px;
    text-align: center;
    color: #505050;
    background-color: #FFFFF2;
    border: 1px solid #AAAAAA;
}

/* a table row that holds date numbers (either blank or 1-31) */
.dpTR {}

/* the top table row that holds the month, year, and forward/backward buttons */
.dpTitleTR {}

/* the second table row, that holds the names of days of the week (Mo, Tu, We, etc.) */
.dpDayTR {}

/* the bottom table row, that has the "This Month" and "Close" buttons */
.dpTodayButtonTR {}

/* a table cell that holds a date number (either blank or 1-31) */
.dpTD {
    border: 1px solid #ece9d8;
}

/* a table cell that holds a highlighted day (usually either today's date or the current date field value) */
.dpDayHighlightTD {
    background-color: #CCCCCC;
    border: 1px solid #AAAAAA;
}

/* the date number table cell that the mouse pointer is currently over (you can use contrasting colors to make it apparent which cell is being hovered over) */
.dpTDHover {
    background-color: #aca998;
    border: 1px solid #888888;
    cursor: pointer;
    color: red;
}
/* the table cell that holds the name of the month and the year */
.dpTitleTD {}

/* a table cell that holds one of the forward/backward buttons */
.dpButtonTD {}

/* the table cell that holds the "This Month" or "Close" button at the bottom */
.dpTodayButtonTD {}

/* a table cell that holds the names of days of the week (Mo, Tu, We, etc.) */
.dpDayTD {
    background-color: #CCCCCC;
    border: 1px solid #AAAAAA;
    color: white;
}

/* additional style information for the text that indicates the month and year */
.dpTitleText {
    font-size: 12px;
    color: gray;
    font-weight: bold;
}

/* additional style information for the cell that holds a highlighted day (usually either today's date or the current date field value) */
.dpDayHighlight {
    color: 4060ff;
    font-weight: bold;
}

/* the forward/backward buttons at the top */
.dpButton {
    font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
    font-size: 10px;
    color: gray;
    background: #d8e8ff;
    font-weight: bold;
    padding: 0px;
}

/* the "This Month" and "Close" buttons at the bottom */
.dpTodayButton {
    font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
    font-size: 10px;
    color: gray;
    background: #d8e8ff;
    font-weight: bold;
}
</style>
<script type="text/javascript">
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

    // if we weren't told what node to display the datepicker beneath, just display it
    // beneath the date field we're updating
    if (!displayBelowThisObject)
        displayBelowThisObject = targetDateField;

    // if a date separator character was given, update the dateSeparator variable
    if (dtSep)
        dateSeparator = dtSep;
    else
        dateSeparator = defaultDateSeparator;

    // if a date format was given, update the dateFormat variable
    if (dtFormat)
        dateFormat = dtFormat;
    else
        dateFormat = defaultDateFormat;

    var x = displayBelowThisObject.offsetLeft;
    var y = displayBelowThisObject.offsetTop + displayBelowThisObject.offsetHeight;

    // deal with elements inside tables and such
    var parent = displayBelowThisObject;
    while (parent.offsetParent) {
        parent = parent.offsetParent;
        x += parent.offsetLeft;
        y += parent.offsetTop;
    }

    drawDatePicker(targetDateField, x, y);
}


/**
Draw the datepicker object (which is just a table with calendar elements) at the
specified x and y coordinates, using the targetDateField object as the input tag
that will ultimately be populated with a date.

This function will normally be called by the displayDatePicker function.
*/
function drawDatePicker(targetDateField, x, y) {
    var dt = getFieldDate(targetDateField.value);

    // the datepicker table will be drawn inside of a <div> with an ID defined by the
    // global datePickerDivID variable. If such a div doesn't yet exist on the HTML
    // document we're working with, add one.
    if (!document.getElementById(datePickerDivID)) {
        // don't use innerHTML to update the body, because it can cause global variables
        // that are currently pointing to objects on the page to have bad references
        //document.body.innerHTML += "<div id='" + datePickerDivID + "' class='dpDiv'></div>";
        var newNode = document.createElement("div");
        newNode.setAttribute("id", datePickerDivID);
        newNode.setAttribute("class", "dpDiv");
        newNode.setAttribute("style", "visibility: hidden;");
        document.body.appendChild(newNode);
    }

    // move the datepicker div to the proper x,y coordinate and toggle the visiblity
    var pickerDiv = document.getElementById(datePickerDivID);
    pickerDiv.style.position = "absolute";
    pickerDiv.style.left = x + "px";
    pickerDiv.style.top = y + "px";
    pickerDiv.style.visibility = (pickerDiv.style.visibility == "visible" ? "hidden" : "visible");
    pickerDiv.style.display = (pickerDiv.style.display == "block" ? "none" : "block");
    pickerDiv.style.zIndex = 10000;

    // draw the datepicker table
    refreshDatePicker(targetDateField.name, dt.getFullYear(), dt.getMonth(), dt.getDate());
}


/**
This is the function that actually draws the datepicker calendar.
*/
function refreshDatePicker(dateFieldName, year, month, day) {
    // if no arguments are passed, use today's date; otherwise, month and year
    // are required (if a day is passed, it will be highlighted later)
    var thisDay = new Date();

    if ((month >= 0) && (year > 0)) {
        thisDay = new Date(year, month, 1);
    } else {
        day = thisDay.getDate();
        thisDay.setDate(1);
    }

    // the calendar will be drawn as a table
    // you can customize the table elements with a global CSS style sheet,
    // or by hardcoding style and formatting elements below
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

    // start generating the code for the calendar table
    var html = TABLE;

    // this is the title bar, which displays the month and the buttons to
    // go back to a previous month or forward to the next month
    html += TR_title;
    html += TD_buttons + getButtonCode(dateFieldName, thisDay, -1, "<") + xTD;
    html += TD_title + DIV_title + monthArrayLong[thisDay.getMonth()] + " " + thisDay.getFullYear() + xDIV + xTD;
    html += TD_buttons + getButtonCode(dateFieldName, thisDay, 1, ">") + xTD;
    html += xTR;

    // this is the row that indicates which day of the week we're on
    html += TR_days;
    for (i = 0; i < dayArrayShort.length; i++)
        html += TD_days + dayArrayShort[i] + xTD;
    html += xTR;

    // now we'll start populating the table with days of the month
    html += TR;

    // first, the leading blanks
    for (i = 0; i < thisDay.getDay(); i++)
        html += TD + " " + xTD;

    // now, the days of the month
    do {
        dayNum = thisDay.getDate();
        TD_onclick = " onclick=\"updateDateField('" + dateFieldName + "', '" + getDateString(thisDay) + "');\">";

        if (dayNum == day)
            html += TD_selected + TD_onclick + DIV_selected + dayNum + xDIV + xTD;
        else
            html += TD + TD_onclick + dayNum + xTD;

        // if this is a Saturday, start a new row
        if (thisDay.getDay() == 6)
            html += xTR + TR;

        // increment the day
        thisDay.setDate(thisDay.getDate() + 1);
    } while (thisDay.getDate() > 1)

    // fill in any trailing blanks
    if (thisDay.getDay() > 0) {
        for (i = 6; i > thisDay.getDay(); i--)
            html += TD + " " + xTD;
    }
    html += xTR;

    // add a button to allow the user to easily return to today, or close the calendar
    var today = new Date();
    var todayString = "Today is " + dayArrayMed[today.getDay()] + ", " + monthArrayMed[today.getMonth()] + " " + today
        .getDate();
    html += TR_todaybutton + TD_todaybutton;
    html += "<button class='dpTodayButton' onClick='refreshDatePicker(\"" + dateFieldName +
        "\");'>this month</button> ";
    html += "<button class='dpTodayButton' onClick='updateDateField(\"" + dateFieldName + "\");'>close</button>";
    html += xTD + xTR;

    // and finally, close the table
    html += xTABLE;

    document.getElementById(datePickerDivID).innerHTML = html;
    // add an "iFrame shim" to allow the datepicker to display above selection lists
    adjustiFrame();
}


/**
Convenience function for writing the code for the buttons that bring us back or forward
a month.
*/
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


/**
Convert a JavaScript Date object to a string, based on the dateFormat and dateSeparator
variables at the beginning of this script library.
*/
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


/**
Convert a string to a JavaScript Date object.
*/
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

    // after the datepicker has closed, optionally run a user-defined function called
    // datePickerClosed, passing the field that was just updated as a parameter
    // (note that this will only run if the user actually selected a date from the datepicker)
    if ((dateString) && (typeof(datePickerClosed) == "function"))
        datePickerClosed(targetDateField);
}



function adjustiFrame(pickerDiv, iFrameDiv) {
    // we know that Opera doesn't like something about this, so if we
    // think we're using Opera, don't even try
    var is_opera = (navigator.userAgent.toLowerCase().indexOf("opera") != -1);
    if (is_opera)
        return;

    // put a try/catch block around the whole thing, just in case
    try {
        if (!document.getElementById(iFrameDivID)) {
            // don't use innerHTML to update the body, because it can cause global variables
            // that are currently pointing to objects on the page to have bad references
            //document.body.innerHTML += "<iframe id='" + iFrameDivID + "' src='javascript:false;' scrolling='no' frameborder='0'>";
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
</head>
<body>

<?
include "admin-menu.php";

?>
    <hr>
    <div class="container-fluid">
        
        <div class="row">
         
            <div class="col-lg-4 col-md-12 col-12">

                <form action="#" name="frmMain" method="post" target="iframe_target" id="my_form">
                    <table class="table">
                        <tr class="thead">
                            <td colspan="4" align="center" >ค้นหา Software </td>
                                      
                        </tr>
                        <tr>
                            <td align="">
                               Name 
                            </td>
                            <td> <input class='form-control' name="key_name" type="text" id="key_name"
                                    maxlength="20" />
                                    </td>
                            <td align="">
                                Version 
                            </td>
                            <td><input class='form-control' name="key_Version" type="text" id="key_Version" 
                                    maxlength="20" />
                                    </td>
                        </tr>
                        <tr>
                            <td align="">
                                Receive&nbsp;From 
                            </td>
                            <td align="">
                                <input class='form-control' name="key_Receive_from" id="key_Receive_from"
                                    value="2009-01-01" maxlength="10" />
                                <a href="javascript:displayDatePicker('key_Receive_from')"><img src="images\formcal.gif"
                                        alt="" width="20" height="20" border="0" /></a></td>
                            <td align="">
                               Serial&nbsp;Code
                            </td>
                            <td>
                                <input class='form-control' name="key_Code" type="text" id="key_Code" 
                                    maxlength="20" />
                                    </td>
                        </tr>
                        <tr>
                            <td align="">
                              Receive&nbsp;To 
                            </td>
                            <td align="">
                            <input class='form-control' name="key_Receive_to" id="key_Receive_to"
                                    value="<?=date('Y-m-d') ?>" maxlength="10" />
                                <a href="javascript:displayDatePicker('key_Receive_to')"><img src="images\formcal.gif"
                                        alt="" width="20" height="20" border="0" /></a></td>                            
                            <td align="">
                                Serial&nbsp;Number
                            </td>
                            <td><input class='form-control' name="key_Number" type="text" id="key_Number" 
                                    maxlength="30" /></td>
                        </tr>
                        <tr>                        
                            <td colspan="4" align="center"> <input type="submit" name="button" id="button" value="Search" class="btn btn-info " />                          
                                <input type="reset" name="button2" id="button2" value="Clear"class="btn btn-warning"/>                                    
                           </td>
                        </tr>
                    </table>
                   
                </form>
                <table class="table">
                        <tr class="thead">
                            <td  align="center" >เพิ่มข้อมูล Software</td>                                      
                        </tr>
<tr>
<td align="center">
<a href='SoftwareSave.php?Usr_IdLogin=<? echo"$Usr_IdLoginCode"; ?>' class="btn btn-primary ">Add Software</a>
</td>
</tr>
                        </table>
            </div>   
    <div class="col-lg-8 col-md-12 col-12 ">
        <table class='table' id='myTable'>   
        <tr class='thead'>
            <td>No</td>
            <td>Serial&nbsp;Code</td>
            <td>Serial&nbsp;Number</td>
            <td>Software</td>
            <td>Version</td>
            <td>Receive&nbsp;Date</td>
            <td>Expire&nbsp;Date</td>                                              
            <td>Edit </td>
            <td>Delete</td>
        </tr>                                                      
                        <?	
	
	 	$no=1;

			include "connect.php";
						
			@session_start();
			$Usr_IdLoginCode=$_SESSION[Usr_IdLoginSesCode];
			
            $Sof_Id=$rs[Sof_Id];
            $Sof_SerialCode=$rs[Sof_SerialCode];
            $Sof_SerialNo=$rs[Sof_SerialNo];
            $Sof_Name=$rs[Sof_Name];
            $Sof_Version=$rs[Sof_Version];
            $Sof_ReceiveDate=$rs[Sof_ReceiveDate];
            $Sof_ExpireDate=$rs[Sof_ExpireDate];
            $Sof_Desc1=$rs[Sof_Desc1];
            $Sof_Desc2=$rs[Sof_Desc2];
            $Sof_Desc3=$rs[Sof_Desc3];
            $Sof_Note=$rs[Sof_Note];
                        						
			$sqlchk = "select * " ;
			$sqlchk .= "from Software " ;
			
		    $sqlchk .="where Sof_Name like '%$key_name%' and Sof_Version like '$key_Version%' and Sof_SerialCode like '%$key_Code%'and Sof_SerialNo like '$key_Number%' ";
		
			if($_POST['key_Receive_from'] or $_POST['key_Receive_to'])
			{
			$sqlchk .="and Sof_ReceiveDate BETWEEN '$key_Receive_from' and '$key_Receive_to'";
			}
			//-------------------------------------------------------------------------------------			
            $sqlchk.=" ORDER BY Sof_Name ASC, Sof_Version ASC, Sof_ExpireDate ASC ; " ;
            
		$querysh = mssql_query($sqlchk);
            
		
		//--------------Search No Data Show--------------------------------------------------
		if(mssql_num_rows($querysh) <1){
			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<TD colspan=6><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No Software Data</div></TD>";
		echo"</tr>";			
		}else          
//---------------------------------------------------------------------------------

			while($rs=mssql_fetch_array($querysh))
			{			
		$Sof_Id=$rs[Sof_Id];
		$Sof_SerialCode=$rs[Sof_SerialCode];
		$Sof_SerialNo=$rs[Sof_SerialNo];
		$Sof_Name=$rs[Sof_Name];
		$Sof_Version=$rs[Sof_Version];
		$Sof_ReceiveDate=$rs[Sof_ReceiveDate];
		$Sof_ExpireDate=$rs[Sof_ExpireDate];
		$Sof_Desc1=$rs[Sof_Desc1];
		$Sof_Desc2=$rs[Sof_Desc2];
		$Sof_Desc3=$rs[Sof_Desc3];
		$Sof_Note=$rs[Sof_Note];
					
//-------------------Encode---------------------------------------------------

        $Sof_IdCode=base64_encode(base64_encode("$Sof_Id"));
        $Sof_IdCodeDel=base64_encode(base64_encode("$Sof_Id"));

//------------------------------------------------------------------------------
 //----------------------Format Date-------------------------------------------------------------  
        $Sof_ReceiveDate_Ori = $Sof_ReceiveDate;                     
        $Sof_ReceiveDateNewformat = date_create($Sof_ReceiveDate_Ori);
        $Sof_ReceiveDateNewformat = date_format($Sof_ReceiveDateNewformat,'Y-m-d');
//-----------------------------------------------------------------------------------------------
//----------------------Format Date-------------------------------------------------------------  
        $Sof_ExpireDate_Ori = $Sof_ExpireDate;                     
        $Sof_ExpireDateNewformat = date_create($Sof_ExpireDate_Ori);
        $Sof_ExpireDateNewformat = date_format($Sof_ExpireDateNewformat,'Y-m-d');
//-----------------------------------------------------------------------------------------------			

		echo"<tr>";
		echo"<td>$no</td>";
		echo"<td>$Sof_SerialCode</td>";
		echo"<td>$Sof_SerialNo</td>";
		echo"<td>$Sof_Name</td>";
		echo"<td>$Sof_Version</td>";
		echo"<td>$Sof_ReceiveDateNewformat</td>";
		echo"<td>$Sof_ExpireDateNewformat</td>";			
		echo"<td><A HREF=\"SoftwareEdit.php?Usr_IdLogin=$Usr_IdLoginCode&Sof_Id=$Sof_IdCode\" target=_top >
		<IMG SRC=images/icon/edit.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Edit></a></td>";
		echo"<td><A HREF=\"SoftwareDelete.php?Usr_IdLogin=$Usr_IdLoginCodeDel&Sof_Id=$Sof_IdCodeDel\" target=_top  onclick=\" return confirm('Are you sure delete ($Sof_Name  $Sof_Version)  ') \">
		<IMG SRC=images/icon/delete.png WIDTH=30 HEIGHT=30 BORDER=0 ALT=Delete></a></td>";
		echo"</tr>";
				$no++;

	} 
						   
	//echo"$Usr_IdLoginCode";
		?>
                 
        </table>
</body>

</html>