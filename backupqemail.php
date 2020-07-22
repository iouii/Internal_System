<style>
.hoz:hover {
    background-color: #cce4ff !important;
}
.ChkBox {
    margin-left: 8px !important;
}
.mail a:hover{
    color:#9a93f9 !important;
}
.bodytable {

    background-color: #fff;
    border: 1px solid #000;
    border-radius: 3px !important;
    margin-top: 5px;
    font-size: 17px;

}
.mar{
    font-weight:bold;
}

.thead {
    background-color: #344955;
   
    font-size: 12px !important;
    
    color: #fff;
    text-align: center !important;
    border-radius: 1px !important;
    border: 1px solid #e6e6e6 !important;
}
td {

    border: 1px solid #fff !important;
    font-size: 14px;
}
</style>


<body>
    <?php 
include "connect.php";
$EType= $_POST["EType"];
if ($EType=="e-mail"){
$i=1;
	$sqlCopy = " SELECT EMP_Email FROM Employee WHERE Emp_Email != '' ";
	$queryCopy = mssql_query($sqlCopy);
	while($resultCopy = mssql_fetch_array($queryCopy)){
		$emailCopy1 = $resultCopy[0];
		$emailCopy2 .=";".trim($emailCopy1);
		
	}
	$emailCopy3 =  substr($emailCopy2,1);
    mssql_close();
  //-----------------------------------------------------------  
 
$ENaId= $_POST["ENaId"];
$EDepId= $_POST["EDepId"];
$EPosId=  $_POST["EPosId"];
$EPosIdzs= $_POST["EPosIdz"];
$EEmpName= $_POST["EEmpName"];
$EEmpNickName= $_POST["EEmpNickName"];
 $sqlCopys = "SELECT DISTINCT Employee.Emp_ExtensionNumber,Employee.Emp_SurName,Employee.Emp_SpeedDial,Employee.Emp_Mobile, Employee.Emp_Name,Employee.Pos_Id,Employee.Dep_Id ,Employee.Emp_Nationality,Employee.Emp_Email,Employee.Emp_NickName ,Department.Dep_Id ,Department.Dep_Name,Position.Pos_Id,Position.Pos_Name   
 FROM ((Employee 
   INNER JOIN Department ON Employee.Dep_Id  = Department.Dep_Id )
   INNER JOIN Position ON Employee.Pos_Id  = Position.Pos_Id)
   WHERE  (Employee.Emp_Nationality LIKE '$ENaId%') AND ( Department.Dep_Name LIKE '%$EDepId%') AND ( Position.Pos_Name LIKE '$EPosId%'   ) AND ( Employee.Emp_Name LIKE '$EEmpName%')  AND ( Employee.Emp_NickName LIKE '$EEmpNickName%' )   AND LEN (Employee.Emp_Email) > 0 
    " ;
 $queryCopys = mssql_query($sqlCopys);
 while($resultCopy = mssql_fetch_array($queryCopys)){
     $emailCopy4 = $resultCopy[8];
     $emailCopy5 .=";".trim($emailCopy4);
     
 }
 $emailCopy6 =  substr($emailCopy5,4);
$dbquery_email ="SELECT DISTINCT Employee.Emp_ExtensionNumber,Employee.Emp_SurName,Employee.Emp_SpeedDial,Employee.Emp_Mobile, Employee.Emp_Name,Employee.Pos_Id,Employee.Dep_Id ,Employee.Emp_Nationality,Employee.Emp_Email,Employee.Emp_NickName ,Department.Dep_Id ,Department.Dep_Name,Position.Pos_Id,Position.Pos_Name   
      FROM ((Employee 
        INNER JOIN Department ON Employee.Dep_Id  = Department.Dep_Id )
        INNER JOIN Position ON Employee.Pos_Id  = Position.Pos_Id)
        WHERE (Employee.Emp_Nationality LIKE '$ENaId%') AND ( Department.Dep_Name LIKE '%$EDepId%')   AND ( Employee.Emp_Name LIKE '$EEmpName%')  AND ( Employee.Emp_NickName LIKE '$EEmpNickName%' ) AND (  Position.Pos_Name LIKE '$EPosId%' OR Position.Pos_Name IN ('$EPosIdzs') )  AND LEN (Employee.Emp_Email) > 0 
        ORDER BY  Department.Dep_Name ASC " ;
     //ORDER BY  Department.Dep_Name ASC 
    $query = mssql_query($dbquery_email);

    //export excel---------------------------------------------------------------------------------
$filName = "Employee.csv"; 
$objWrite = fopen("Employee.csv", "w");           
$objQuery = mssql_query($dbquery_email) or die ("Error Query [".$dbquery_email."]"); 
$no_Csv=1;
$Button = "<input  type=image name=Email id=Email value=Email  src=images/icon/email.png border=0 WIDTH=50 HEIGHT=50 ALT=Send All align=left";
fwrite($objWrite,"\"No.\",\"E-mail\",\"Name\",\"Sure Name\",\"Nick Name\",\"Position\",\"Department\",\"Nationality\" \n");
while($objResult = mssql_fetch_array($objQuery)) 
{ 
fwrite($objWrite, "\"$no_Csv\",\"$objResult[Emp_Email]\",\"$objResult[Emp_Name]\","); 
fwrite($objWrite, "\"$objResult[Emp_SurName]\",\"$objResult[Emp_NickName]\","); 
fwrite($objWrite, "\"$objResult[Pos_Name]\",\"$objResult[Dep_Name]\",\"$objResult[Emp_Nationality]\" \n"); 
$no_Csv++;
} 
fclose($objWrite); 
if(mssql_num_rows($query) <1){

    echo"<table class='table' id='myTable'>";
	echo"<thead >";
    echo "<tr class='thead'>
    <td  >No.</td>
    <td ><input type='checkbox' id='selectAll'></td>
    <td >E-Mail</td>
    <td  onclick='sortTable(3)'>NickName</td>
    <td  onclick='sortTable(4)'>Name</td>
    <td  >SurName</td>
    <td  onclick='sortTable(6)'>Position</td>
    <td  onclick='sortTable(7)'>Department</td>
    <td  >Nationality </td>
    </tr>
    <tr>
   <TD  colspan=12><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No  Data</div></TD>
    </tr>
    ";
}else{
echo"
<table class='table the '>
<tr>
</tr>
<tr>
<td  align='center'>Export To CSV <a href=$filName> <img src='Img/excel64.png' style='width:45px !important ' title='Export E-Mail To Excel ' ></a>
    </td>
    <td  align='center'>
    Send Select E-Mail
      <button type='button' class='btn ' title='Send Select E-Mail Only '><img src='Img\outlook64.png'  style='width:45px !important '    ></button>    
     </td>
<td  align='center'> 
Copy All E-Mail
   <img src='Img/file64.png'  style='width:45px !important '  title='Copy All Email ' OnClick='copymail()' >
     <input type='text'  value='$emailCopy3'id ='Myemail'  style='border-style:none;margin-top:-82px;width:1px;' readonly  >

  </td>
    </tr>
   </table>
    ";
    
    echo"<table class='table' id='myTable'>";
	echo"<thead >";
    echo "<tr class='thead'>
    <td > <b>No.</b></td>
    <td ><input type='checkbox' id='selectAll'></td>
    <td ><b>E-Mail</b></td>
    <td  onclick='sortTable(3)'><b>NickName</b></td>
    <td  onclick='sortTable(4)'><b>Name</b></td>
    <td  ><b>SurName</b></td>
    
    <td  onclick='sortTable(6)'><b>Position</b></td>
    <td  onclick='sortTable(7)'><b>Department</b></td>
    <td  ><b>Nationality</b> </td>
    
    </tr>";
    
    while($qry=mssql_fetch_array($query)){ 
    $Emp_Id=$qry[Emp_Id];
    $Emp_Number=$qry[Emp_Number];
    $Emp_Name=$qry[Emp_Name];
    $Emp_SurName=$qry[Emp_SurName];
    $Emp_NickName=$qry[Emp_NickName];
    $Emp_Nationality=$qry[Emp_Nationality];
    $Dep_Id=$qry[Dep_Id];
    $Pos_Id=$qry[Pos_Id];
    $Emp_Email=$qry[Emp_Email];
    $Emp_ExtensionNumber=$qry[Emp_ExtensionNumber];
    $Emp_Mobile=$qry[Emp_Mobile];
    $Emp_SpeedDial=$qry[Emp_SpeedDial];
    $Dep_Name=$qry[Dep_Name]; 
    $Pos_Name=$qry[Pos_Name];    
    $TRhover='this.bgColor="#cce4ff"';
    $TR_Nohover='this.bgColor="#e6e6e6"';
    $TR_Hi="toggle(this)";
?>
    <?echo" <tr bgColor='#e6e6e6' onMouseOver='$TRhover' onMouseOut='$TR_Nohover' onClick='$TR_Hi' >  ";?>
    <? echo"<td  align='center'> $i </td>"; ?>
    <?$i++;  ?>
    <? echo"<td  ><input type='checkbox' name='chkk' value='$Emp_Email' class='ChkBox'></td>";?>
    <? echo"<td  class='mail'><a href=\"mailto:$Emp_Email\"> $Emp_Email  </a></td>"; ?>
    <? echo"<td > $Emp_NickName </td>"; ?>
    <? echo"<td > $Emp_Name </td>"; ?>
    <? echo"<td > $Emp_SurName </td>"; ?>
    <? echo"<td > $Pos_Name </td>"; ?>
    <? echo"<td > $Dep_Name </td>"; ?>
    <? echo"<td > $Emp_Nationality </td>"; ?>
    <?echo"</tr>";?>
    <?}?>
    <?echo"</table>";?>
    <?}?>
    <?}?>
    <?
if($EType=="te-lephone"){
    $i= 1;
    $ENaId= $_POST["ENaId"];
    $EDepId= $_POST["EDepId"];
    $EPosId= $_POST["EPosId"];
    $EEmpName= $_POST["EEmpName"];
    $EEmpNickName= $_POST["EEmpNickName"];
    $dbquery_telephone ="SELECT DISTINCT Employee.Emp_ExtensionNumber,Employee.Emp_SurName,Employee.Emp_SpeedDial,Employee.Emp_Mobile, Employee.Emp_Name,Employee.Pos_Id,Employee.Dep_Id ,Employee.Emp_Nationality,Employee.Emp_Email,Employee.Emp_NickName ,Department.Dep_Id ,Department.Dep_Name,Position.Pos_Id,Position.Pos_Name   
        FROM ((Employee 
        INNER JOIN Department ON Employee.Dep_Id  = Department.Dep_Id )
        INNER JOIN Position ON Employee.Pos_Id  = Position.Pos_Id)
        WHERE (Employee.Emp_Nationality LIKE '$ENaId%') AND ( Department.Dep_Name LIKE '%$EDepId%' ) AND ( Position.Pos_Name LIKE '$EPosId%' ) AND ( Employee.Emp_Name LIKE '$EEmpName%')  AND ( Employee.Emp_NickName LIKE '$EEmpNickName%' )  AND LEN (Employee.Emp_ExtensionNumber) > 0 
        ORDER BY  Department.Dep_Name ASC " ;

    $query = mssql_query($dbquery_telephone);

$filName = "Employee.csv"; 
$objWrite = fopen("Employee.csv", "w");           
$objQuery = mssql_query($dbquery_telephone) or die ("Error Query [".$dbquery_telephone."]"); 
$no_Csv=1;
$Button = "<input  type=image name=Email id=Email value=Email  src=images/icon/email.png border=0 WIDTH=50 HEIGHT=50 ALT=Send All align=left";
fwrite($objWrite,"\"No.\",\"Extension No.\",\"Nick Name\",\"Name\",\"Department\",\"Position\",\"Speed Dial\",\"Mobile\",\"Nationality\" \n");
while($objResult = mssql_fetch_array($objQuery)) 
{ 
    fwrite($objWrite, "\"$no_Csv\",\"$objResult[Emp_ExtensionNumber]\",\"$objResult[Emp_NickName]\","); 
    fwrite($objWrite, "\"$objResult[Emp_Name]\",\"$objResult[Dep_Name]\",\"$objResult[Pos_Name]\","); 
    fwrite($objWrite, "\"$objResult[Emp_SpeedDial]\",\"$objResult[Emp_Mobile]\",\"$objResult[Emp_Nationality]\"  \n"); 
    $no_Csv++;
} 
fclose($objWrite); 
if(mssql_num_rows($query) <1){
echo"<table class='table' id='myTable'>";
echo"<thead >";
echo "<tr class='thead'>
<td  class='mar'>No.</td>
<td  class='mar'>Extension</td>
<td class='mar'>SpeedDial</td>
<td class='mar'>Mobile</td>
<td class='mar'>NickName</td>
<td class='mar'>Name</td>
<td class='mar'>Position</td>
<td class='mar'>Department</td>
<td class='mar'>Nationality </td>
</tr>
<tr>
<TD  colspan=12><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No  Data</div></TD>
</tr>
";
}else{
echo"
<table class='table the'>
<tr>
</tr>
<tr>
<td  align='right'>Export To CSV <a href=$filName> <img src='Img/excel64.png' style='width:45px !important ' title='Export E-Mail To Excel ' ></a>
    </td>
    </tr>
   </table>";
        echo"<table class='table' id='myTable'>";
        echo	"<thead >";
        echo "<tr class='thead'>
        <td class='mar'>No.</td>
        <td class='mar'>Extension</td>
        <td class='mar'>SpeedDial</td>
        <td class='mar'>Mobile</td>
        <td class='mar'>NickName</td>
        <td class='mar'>Name</td>
        <td class='mar'>Position</td>
        <td class='mar'>Department</td>
        <td class='mar'>Nationality </td>
        </tr>";
        while($qry=mssql_fetch_array($query)){ 
            $Emp_Number=$qry[Emp_Number];
            $Emp_Name=$qry[Emp_Name];
            $Emp_SurName=$qry[Emp_SurName];
            $Emp_NickName=$qry[Emp_NickName];
            $Emp_Nationality=$qry[Emp_Nationality];
            $Dep_Id=$qry[Dep_Id];
            $Pos_Id=$qry[Pos_Id];
            $Emp_Email=$qry[Emp_Email];
            $Emp_ExtensionNumber=$qry[Emp_ExtensionNumber];
            $Emp_Mobile=$qry[Emp_Mobile];
            $Emp_SpeedDial=$qry[Emp_SpeedDial];
            $Dep_Name=$qry[Dep_Name]; 
            $Pos_Name=$qry[Pos_Name];   
            $TRhover='this.bgColor="#cce4ff"';
            $TR_Nohover='this.bgColor="#e6e6e6"';
            $TR_Hi="toggle(this)";
    ?>
    <?echo" <tr bgColor='#e6e6e6' onMouseOver='$TRhover' onMouseOut='$TR_Nohover' onClick='$TR_Hi'>";?>
    <? echo"<td  align='center'> $i </td>"; ?>
    <?$i++; ?>
    <? echo"<td  align='center'> $Emp_ExtensionNumber  </td>"; ?>
    <? echo"<td  align='center'> $Emp_SpeedDial  </td>"; ?>
    <? echo"<td > $Emp_Mobile  </td>"; ?>
    <? echo"<td > $Emp_NickName </td>"; ?>
    <? echo"<td > $Emp_Name </td>"; ?>
    <? echo"<td > $Pos_Name </td>"; ?>
    <? echo"<td > $Dep_Name </td>"; ?>
    <? echo"<td > $Emp_Nationality </td>"; ?>
    <?echo"</tr>";?>
    <?}?>
    <?echo"</table>";?>
    <?}?>
    <?}?>
    <? if($EType=="gr-oup"){
$EGroup=$_POST["EGroup"];
    $i= 1;
    $ENaId= $_POST["ENaId"];
    $EDepId= $_POST["EDepId"];
    $EPosId= $_POST["EPosId"];
    $EEmpName= $_POST["EEmpName"];
    $EEmpNickName= $_POST["EEmpNickName"];
    $sqlCopy = " SELECT * FROM (((( Employee E
    INNER JOIN GroupEmployee GE ON GE.Emp_Id = E.Emp_Id)        
    INNER JOIN Groups G ON G.Grp_Id = GE.Grp_Id)
    INNER JOIN Department D ON D.Dep_Id = E.Dep_Id)
    INNER JOIN Position P ON P.Pos_Id = E.Pos_Id)
    WHERE  E.Emp_Name LIKE '$EEmpName%' AND E.Emp_NickName LIKE '$EEmpNickName%' AND D.Dep_Name LIKE '$EDepId%' AND P.Pos_Name LIKE '$EPosId%' AND E.Emp_Nationality LIKE '$ENaId%' AND  GE.Grp_Id LIKE '$EGroup%' 
   " ; 
	$queryCopy = mssql_query($sqlCopy);
	while($resultCopy = mssql_fetch_array($queryCopy)){
		$emailCopy1 = $resultCopy[8];
		$emailCopy2 .=";".trim($emailCopy1);
	}
	$emailCopy3 =  substr($emailCopy2,1);
    mssql_close();
        $dbquery_group ="SELECT * FROM ((((GroupEmployee GE 
            INNER JOIN Employee E ON GE.Emp_Id = E.Emp_Id)        
            INNER JOIN Groups G ON G.Grp_Id = GE.Grp_Id)
            INNER JOIN Department D ON D.Dep_Id = E.Dep_Id)
            INNER JOIN Position P ON P.Pos_Id = E.Pos_Id)
            WHERE  E.Emp_Name LIKE '$EEmpName%' AND E.Emp_NickName LIKE '$EEmpNickName%' AND D.Dep_Name LIKE '$EDepId%' AND P.Pos_Name LIKE '$EPosId%' AND E.Emp_Nationality LIKE '$ENaId%' AND  GE.Grp_Id LIKE '$EGroup%' 
            " ;
        $query = mssql_query($dbquery_group);
        $filName = "Employee.csv"; 
        $objWrite = fopen("Employee.csv", "w"); 
        $objQuery = mssql_query($dbquery_group) or die ("Error Query [".$dbquery_group."]"); 
        $no_Csv=1;
fwrite($objWrite,"\"No.\",\"E-mail\",\"Name\",\"Sure Name\",\"Nick Name\",\"Department\",\"Position\",\"Nationality\" \n");
while($objResult = mssql_fetch_array($objQuery)) 
{ 
fwrite($objWrite, "\"$no_Csv\",\"$objResult[Emp_Email]\",\"$objResult[Emp_Name]\","); 
fwrite($objWrite, "\"$objResult[Emp_SurName]\",\"$objResult[Emp_NickName]\","); 
fwrite($objWrite, "\"$objResult[Dep_Name]\",\"$objResult[Pos_Name]\",\"$objResult[Emp_Nationality]\" \n"); 
$no_Csv++;
} 
fclose($objWrite); 
if(mssql_num_rows($query) <1){
echo"<table class='table' id='myTable'>";
echo"<thead >";
echo "<tr class='thead'>
<td  class='mar'>No.</td>
<td ><input type='checkbox' id='selectAll'></td>
<td class='mar'>E-Mail</td>
<td class='mar'>GroupName</td>   
<td class='mar'>NickName</td>    
<td class='mar'>Name</td>
<td class='mar'>SurName</td>
<td >Position</td>        
<td >Nationality </td>
</tr>
<tr>
<TD  colspan=12><div align='center' class='style82'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
<br>No  Data</div></TD>
</tr>
";
}else{
echo"
<table class='table the'>
<tr>
</tr>
<tr>
<td  align='center'>Export To CSV <a href=$filName> <img src='Img/excel64.png' style='width:45px !important ' title='Export E-Mail To Excel ' ></a>
</td>
<td align='center'>
Send Select E-Mail
<button type='button' class='btn ' title='Send Select E-Mail Only '><img src='Img\outlook64.png'  style='width:45px !important '   ></button>    
</td>    
<td  align='center'> 
Copy Employee E-Mail In Group 
   <img src='Img/file64.png'  style='width:45px !important '  title='Copy All Email ' OnClick='copymail()' >
     <input type='text'  value='$emailCopy3'id='Myemail'  style='border-style:none;margin-top:-82px;width:1px;' readonly  >

  </td>
    </tr>
   </table>";
        echo"<table class='table' id='myTable'>";
		echo"<thead >"; 
        echo"<tr class='thead'>
        <td class='mar'>No.</td>
        <td ><input type='checkbox' id='selectAll'> </td>
        <td class='mar'>E-Mail</td>
        <td class='mar'>GroupName</td>   
        <td class='mar'>NickName</td>    
        <td class='mar'>Name</td>
        <td class='mar'>SurName</td>
        <td class='mar'>Position</td>        
        <td class='mar'>Nationality </td>
        </tr>";
        
while($qry=mssql_fetch_array($query)){ 
        $Emp_Number=$qry[Emp_Number];
        $Emp_Name=$qry[Emp_Name];
        $Emp_SurName=$qry[Emp_SurName];
        $Emp_NickName=$qry[Emp_NickName];
        $Emp_Nationality=$qry[Emp_Nationality];
        $Dep_Id=$qry[Dep_Id];
        $Pos_Id=$qry[Pos_Id];
        $Emp_Email=$qry[Emp_Email];
        $Emp_ExtensionNumber=$qry[Emp_ExtensionNumber];
        $Emp_Mobile=$qry[Emp_Mobile];
        $Emp_SpeedDial=$qry[Emp_SpeedDial];
        $Dep_Name=$qry[Dep_Name]; 
        $Pos_Name=$qry[Pos_Name];   
        $Grp_Name=$qry[Grp_Name];   
        $TRhover='this.bgColor="#cce4ff"';
        $TR_Nohover='this.bgColor="#e6e6e6"';
    $TR_Hi="toggle(this)";
    ?>
    <?echo "<tr bgColor='#e6e6e6' onMouseOver='$TRhover' onMouseOut='$TR_Nohover' onClick='$TR_Hi'>" ;?>
    <? echo"<td  align='center'> $i </td>"; ?>
    <?$i++; ?>
    <?  echo"<td  align='left' ><input  type='checkbox'  name='chkk' value='$Emp_Email' class='ChkBox'></td>";?>
    <? echo"<td  class='mail'> <a href=\"mailto:$Emp_Email\"> $Emp_Email  </a>  </td>"; ?>
    <? echo"<td > $Grp_Name  </td>"; ?>
    <? echo"<td > $Emp_NickName </td>"; ?>
    <? echo"<td > $Emp_Name </td>"; ?>
    <? echo"<td > $Emp_SurName  </td>"; ?>
    <? echo"<td > $Pos_Name </td>"; ?>
    <? echo"<td > $Emp_Nationality </td>"; ?>
    </tr>
    <?}?>
    <?echo"</table>";?>
    <?}?>
    <?}?>
</body>
<script>
$("#selectAll").click(function() {
    var checkAll = $(this).prop("checked");
    $("input.ChkBox").each(function() {
        $(this).prop({
            "checked": checkAll
        });
    });
});
</script>
<script>
function copymail() {
    if (confirm('You want tihs copy email all ?')) {
        var textMailCopy = document.getElementById('Myemail');
        textMailCopy.select();
        document.execCommand('Copy');
        window.location.href = 'mailto: ';
    }
}
function copymails() {
    if (confirm('You Want This  Copy Show E-Mail Only ?')) {
        var textMailCopy = document.getElementById('Myemails');
        textMailCopy.select();
        document.execCommand('Copy');
        window.location.href = 'mailto: ';
    }
}
</script>
<script>
function ShowEmail() {
    var NaId = $("#EmpNation").val();
    var DepId = $("#DepId").val();
    var PosId = $("#PosId").val();
    var EmpName = $("#EmpName").val();
    var EmpNickName = $("#EmpNickName").val();
    var Type = $("#Type").val();
    var Group = $("#Group").val();
    var PosIdz = $("#PosIdz").val();
    $.post("qemail.php", {
        ENaId: NaId,
        EDepId: DepId,
        EPosId: PosId,
        EEmpName: EmpName,
        EEmpNickName: EmpNickName,
        EType: Type,
        EGroup: Group,
        EPosIdz:PosIdz
    }, function(data) {
        //alert(data);
        $("#ShowEmail").html(data);
    });
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("button").click(function() {
        var maill = [];
        
        $.each($("input[name='chkk']:checked"), function() {
            maill.push($(this).val());
          
        });
if(maill==""){

    alert('Please select e-mail/กรุณาเลือก e-mail');history.back();

}else if(maill.length > 70 ){

    alert(' Error Email Limited !!! Please click to  yellow icon  for copy email  and  the press  Ctrl + v  in  Outlook program (อีเมล์มีจำนวนมากเกินไป กรุณาไปที่ไอคอนสีเหลืองเพื่อก๊อปปี้อีเมล์ไปวางที่โปรแกรม Outlook)');history.back();
}else{
        window.location.href = 'mailto:' + maill;
}
    });
});
</script>

<script>
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
</script>
<script>
function toggle(it) {
    if ((it.style.backgroundColor == "none") || (it.style.backgroundColor == "")) {
        it.style.backgroundColor = "#D6EBFF";
    } else {
        it.style.backgroundColor = "";
    }
}
</script>

</html>
