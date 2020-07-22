<?php 
	session_start();
	if($_POST["chks"] == "add")
	{
		$_SESSION['values'] = $_POST["chkdata"];
	}else if($_POST["chks"] == "unset"){
		unset($_SESSION['values'] );
	
	}
	  
	/*function chk_valueinarray($value){
		if(in_array($value,(array)$_SESSION["datachk"],true)){
				return true;
		}else{
			return false;
		}
	}*/

	//Sql Query Email All
	include "connect.php";
	$sqlCopy = " SELECT EMP_Email FROM Employee WHERE Emp_Email != '' ";
	$queryCopy = mssql_query($sqlCopy);
	while($resultCopy = mssql_fetch_array($queryCopy)){
		$emailCopy1 = $resultCopy[0];
		$emailCopy2 .=";".trim($emailCopy1);
		
	}
	$emailCopy3 =  substr($emailCopy2,1);
	mssql_close();
	//echo "<script> alert('$sum'); </script>";
	//echo "<script> alert('$emailCopy3'); </script>";
	//Sql Query Email All
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<meta name="keywords" content="business theme, biz, blue, free css template, web design, 2-column" />
<meta name="description" content="Business Theme is a free CSS template from templatemo.com" />
<head>
<title>Ogura Clutch Thailand</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />



<script language="JavaScript">
 
 
 function toggle(it) {
  if ((it.style.backgroundColor == "none") || (it.style.backgroundColor == ""))
    {it.style.backgroundColor = "#D6EBFF";}
  else
    {it.style.backgroundColor = "";}
}

 function checkAll(bx){
	  var cbs = document.getElementsByTagName('input');
	  for(var i=0; i < cbs.length; i++) {
	    if(cbs[i].type == 'checkbox') {
	      cbs[i].checked = bx.checked;
	    }
	  }
	}
 var frm = $('#myform');
 frm.submit(function (ev) {
     $.ajax({
         type: frm.attr('method'),
         url: frm.attr('action'),
         data: frm.serialize(),
         success: function (data) {
             alert('ok');
         }
     });

     ev.preventDefault();
 });
 
  //Edit Emaiil Copy All

</script>



<style type="text/css">

.style1 {color: #666}
.style14 {
	color: #0033CC;
	font-size: 13px;
}
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style18 {color: #003399}
.style20 {color: #CC0000}
.style29 {font-size: 14px}
.style31 {
	color: #CC3333;
	font-weight: bold;
	font-size: 13px;
}
.style33 {font-size: 12px}
.style39 {
	color: #CC3333;
	font-size: 13px;
}
.style48 {color: #FFFFFF}
.style50 {
	font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style51 {color: #0066CC}
.style55 {
	font-size: 21px;
	color: #0066CC;
}
.style58 {color: #0066CC; font-weight: bold; }
.style59 {font-size: 28px}
.style64 {
	color: #0033CC;
	font-size: 12px;
}
.style68 {color: #666666}
.style69 {font-size: 12px; color: #666666; }
a:link {
	text-decoration: none;
	color: #2d7ad1;
}
a:visited {
	text-decoration: none;
	color: #2d7ad1;
}
.style73 {color: #0066FF}
.style74 {font-size: 11.2px}
.style78 {font-family: Tahoma}
.style79 {color: #999999}
.style80 {color: #F0F0F0; }
.style85 {font-size: 21px}
.style86 {font-size: 12.8px}
.style88 {font-size: 12.8px; color: #FFFFFF; font-weight: bold; }
.style89 {font-weight: bold}
.style82 {font-size: 12px; font-weight: bold; }
.style91 {color: #FFFFFF; font-weight: bold; }
a:hover {
	text-decoration: none;
	color: #CC0000;
}
a:active {
	text-decoration: none;
}
>
</style>

</head>
<body>

 <form id="form2" name="form2" method="post" action="SearchAll_Email.php">
 

<?php      
		
//----------SESSION	Send Email------------------------------//	
	
//$Email_Chk =explode(";",$_GET["Email"]);
/*
@session_start();
$Emaillink=$_SESSION['Emaillink'];

echo "$Emaillink";

$Email_Chk =explode(";",$Emaillink);


unset($_SESSION['Emaillink']);

*/
//----------SESSION	Send Email------------------------------//	



		 $key_Group_From = $_POST["Code2"];
		 $key_Group= $_GET["code"];
			
			
		if($key_Group == "") 
		{ 
				$key_Group= "$key_Group_From";

		}
		
		//echo "<script> alert('$key_Group');</script>";
		//echo "<script> alert('$key_Dep_Id');</script>";
		
		if ($key_Group=="Email")
		{

		//Copy Email All
		echo "<input type =text id =Myemail value='$emailCopy3' style='border-style:none;margin-top:-82px;width:1px' readonly> ";
		echo "<script>
 		function copymail(){
 			if(confirm('You want tihs copy email all ?')){
 				var textMailCopy = document.getElementById('Myemail');
		 		textMailCopy.select();
		 		document.execCommand('Copy');	
		 		window.location.href = 'mailto: ';
 			}
 		}
		</script>";

		//Copy Email All

		
	    //echo "<script> alert('....568...');</script>";
		echo" <table width='1000' border='0' align='center'>";
        echo" <tr bgcolor=#FFFF00> ";
        echo"<td width='30' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>No.</div>
              </div></td>";
        
        echo"<td width='20' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'><input title='Select All Email' type=checkbox onclick=checkAll(this)></div>
              </div></td>";
        
    	echo"<td width='225' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style82 style48 style86'>
                  Email</span></div>
               </td>";
        echo "<td width='75' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
              <div align='center'>Nick Name</div>
              </div></td>";
        echo "<td width='120' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style82 style48 style86'>Name</span></div></td>";
        echo "<td width='120' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style82 style48 style86'>Sure Name</span></div></td>";
        echo"<td width='150' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>Department</div>
              </div></td>";
        echo "<td width='130' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style88'>Position</span></div></td>";
        echo"<td width='75' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>Nationality</div>
              </div></td>";
        //echo"<td width='46' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style88'>Edit</span></div></td>";
        //echo"<td width='46' background='/Web_ITS/images/Menu list/blue_bg.jpg'><div align='center'><span class='style88'>Delete</span></div></td>";
        echo"</tr>";
		
		}else if($key_Group=="Phone"){
			
		
		echo" <table width='1000' border='0' align='center'>";
        echo" <tr bgcolor=#FFFF00> ";
		echo"<td width='30' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>No.</div>
              </div></td>";

		echo"<td width='100' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center'><span class='style88'>Extension No.</span></div></td>";
		echo"<td width='120' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center' class='style88'>
                  <div align='center'>Nick Name</div>
              </div></td>";
        echo"<td width='190' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='Center'><span class='style88'>Name</span></div></td>";
		echo"<td width='170' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center' class='style88'>
                  <div align='center'>Department</div>
              </div></td>";
		echo "<td width='130' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center'><span class='style88'>Position</span></div></td>";

        echo"<td width='80' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center'><span class='style88'><strong>Speed Dial</strong></span></div></td>";
		echo"<td width='120' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center'><span class='style88'><strong>Mobile</strong></span></div></td>";

        echo"<td width='75' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center' class='style88'>
                  <div align='center'>Nationality</div>
              </div></td>";
        
        //echo"<td width='46' background='images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center'><span class='style88'>Edit</span></div></td>";
       // echo"<td width='46' background='/Web_ITS/images/Menu list/blue_bg.jpg' bgcolor='#FFFFFF'><div align='center'><span class='style88'>Delete</span></div></td>";
        echo"</tr>";
			
		} else if ($key_Group=="Groups"){
			
		echo" <table width='950' border='0' align='center'>";
        echo" <tr bgcolor=#FFFF00> ";
        echo"<td width='30' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>No.</div>
              </div></td>";
    	echo"<td width='225' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style82 style48 style86'>
                  Email</span></div>
               </td>";
        echo "<td width='120' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style82 style48 style86'>Name</span></div></td>";
        echo "<td width='120' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style82 style48 style86'>Sure Name</span></div></td>";
        echo "<td width='75' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>Nick Name</div>
              </div></td>";
        echo"<td width='150' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>Department</div>
              </div></td>";
        echo "<td width='130' background='images/Menu list/blue_bg.jpg'><div align='center'><span class='style88'>Position</span></div></td>";
        echo"<td width='75' background='images/Menu list/blue_bg.jpg'><div align='center' class='style88'>
                  <div align='center'>Nationality</div>
              </div></td>";
			  }
	 
       //-------------------------------------------------------------------------------------------------------


		  $no=1;    // Comment เดอ้
			include "connect.php";
		
			
if ($key_Group=="Email") 
	{

		 	
	 if($_SESSION["values"] == true)
		{
		
			
		 	$sqlchk = "SELECT E.Emp_Id, E.Emp_Number, " ;
			$sqlchk .= "E.Emp_Name, E.Emp_SurName, E.Emp_NickName, " ;
			$sqlchk .= "E.Emp_Nationality, E.Dep_Id, E.Pos_Id, " ;
			$sqlchk .= "E.Emp_Email, E.Emp_ExtensionNumber, E.Emp_Mobile, " ;
			$sqlchk .= "E.Emp_SpeedDial, D.Dep_Name, P.Pos_Name " ;
			$sqlchk .= "FROM (Employee E INNER JOIN Department D " ;
			$sqlchk .= "ON E.Dep_Id = D.Dep_Id) " ;
			$sqlchk .= "INNER JOIN Position P " ;
			$sqlchk .= "ON E.Pos_Id = P.Pos_Id " ;

			$sqlchk .=" WHERE E.Emp_Name LIKE '$key_name%' AND E.Emp_NickName like '$key_nick%' " ;
			if(isset($_POST["key_Pos_Id"]) && $_POST["key_Pos_Id"] != '' )
		 		{
		 			
						
						$_SESSION["datachk"][] = "'".$_POST["key_Pos_Id"]."'"; 
						$condition =  implode(",",$_SESSION["datachk"]);
						if($_POST["key_Pos_Id"] == '')
						{
							unset($_SESSION["datachk"]);

						}

						//print_r($_SESSION["datachk"]);
						//echo $condition;
					$sqlchk .=" AND D.Dep_Name like '$key_Dep_Id%' AND P.Pos_Name IN ($condition) "; 
				}else{
				unset($_SESSION["datachk"]);
				$sqlchk .=" AND D.Dep_Name like '$key_Dep_Id%' AND P.Pos_Name like '$key_Pos_Id%' " ;
				}
			
			$sqlchk .=" AND E.Emp_Nationality like '$key_Emp_Nationality%' AND LEN(E.Emp_Email) > 0 " ;
      }else{

		 	$sqlchk = "SELECT E.Emp_Id, E.Emp_Number, " ;
			$sqlchk .= "E.Emp_Name, E.Emp_SurName, E.Emp_NickName, " ;
			$sqlchk .= "E.Emp_Nationality, E.Dep_Id, E.Pos_Id, " ;
			$sqlchk .= "E.Emp_Email, E.Emp_ExtensionNumber, E.Emp_Mobile, " ;
			$sqlchk .= "E.Emp_SpeedDial, D.Dep_Name, P.Pos_Name " ;
			$sqlchk .= "FROM (Employee E INNER JOIN Department D " ;
			$sqlchk .= "ON E.Dep_Id = D.Dep_Id) " ;
			$sqlchk .= "INNER JOIN Position P " ;
			$sqlchk .= "ON E.Pos_Id = P.Pos_Id " ;
			
			$sqlchk .=" WHERE E.Emp_Name LIKE '$key_name%' AND E.Emp_NickName like '$key_nick%' " ;
			$sqlchk .=" AND D.Dep_Name like '$key_Dep_Id%' AND P.Pos_Name like '$key_Pos_Id%' " ;
			$sqlchk .=" AND E.Emp_Nationality like '$key_Emp_Nationality%' AND LEN(E.Emp_Email) > 0 " ;
			unset($_SESSION["datachk"]);
		}
			
}		
			
			else if ($key_Group=="Phone") 
		 {
		 	
		 	
		 	$sqlchk = "select E.Emp_Id, E.Emp_Number, " ;
			$sqlchk .= "E.Emp_Name, E.Emp_SurName, E.Emp_NickName, " ;
			$sqlchk .= "E.Emp_Nationality, E.Dep_Id, E.Pos_Id, " ;
			$sqlchk .= "E.Emp_Email, E.Emp_ExtensionNumber, E.Emp_Mobile, " ;
			$sqlchk .= "E.Emp_SpeedDial, D.Dep_Name, P.Pos_Name " ;
			$sqlchk .= "from (Employee E INNER JOIN Department D " ;
			$sqlchk .= "ON E.Dep_Id = D.Dep_Id) " ;
			$sqlchk .= "INNER JOIN Position P " ;
			$sqlchk .= "ON E.Pos_Id = P.Pos_Id " ;
			$sqlchk .=" WHERE E.Emp_Name like '$key_name%' AND E.Emp_NickName like '$key_nick%'";
			$sqlchk .=" AND D.Dep_Name like '$key_Dep_Id%'AND P.Pos_Name like '$key_Pos_Id%'";
			$sqlchk .=" AND E.Emp_Nationality like '$key_Emp_Nationality%'";
			$sqlchk .=" AND LEN(E.Emp_ExtensionNumber) > 0 ";
			
		 }
			
			

    else if($key_Group=="Groups"){
		 
		 		
			$sqlchk = " select * from ((((GroupEmployee GE inner join Employee E on GE.Emp_Id = E.Emp_Id)";
			$sqlchk .= "inner join Groups G on G.Grp_Id = GE.Grp_Id)";
			$sqlchk .="inner join Department D on D.Dep_Id = E.Dep_Id)";
			$sqlchk .="inner join Position P on P.Pos_Id = E.Pos_Id)";
			
			
						
if($_POST['key_name'] or $_POST['key_nick'] or $_POST['key_Dep_Id'] or $_POST['key_Pos_Id'] or $_POST['key_Emp_Nationality']
	or $_POST['key_Grp_mem'])
		{
		$sqlchk .=" where E.Emp_Name like '$key_name%' and E.Emp_NickName like '$key_nick%' and D.Dep_Name like '$key_Dep_Id%'and P.Pos_Name like '$key_Pos_Id%' and E.Emp_Nationality like '$key_Emp_Nationality%' and  GE.Grp_Id like '$key_Grp_mem%' ";
		}
			$_SESSION["chk_dis"] = $key_Group;
	}


//----------------------------------------------------------------------------------------------------------------

			



//---------------------------------ABC-----------------------------------------------------------
	
			  $sqlchk.=" ORDER BY D.Dep_Name ASC, P.Pos_Name ASC, E.Emp_Name ASC ; " ;
			  
			  $querysh = mssql_query($sqlchk);
//-----------------------------------------------------------------------------------------------------



//--------------Search No Data Show--------------------------------------------------
		if(mssql_num_rows($querysh) < 1){
			
		echo"<tr bgcolor=$bgcolor>";	
		echo "<TD colspan=6><div align='center' class='style59'><br><IMG SRC=images/icon/Nodata.png border=0 WIDTH=100 HEIGHT=100 align=absmiddle>
 <br>No Employee Data</div></TD>";
		echo"</tr>";			
		}else{
			while($rs=mssql_fetch_array($querysh))
			{

				$Emp_Id=$rs[Emp_Id];
				$Emp_Number=$rs[Emp_Number];
				$Emp_Name=$rs[Emp_Name];
				$Emp_SurName=$rs[Emp_SurName];
				$Emp_NickName=$rs[Emp_NickName];
				$Emp_Nationality=$rs[Emp_Nationality];
				$Dep_Id=$rs[Dep_Id];
				$Pos_Id=$rs[Pos_Id];
				$Emp_Email=$rs[Emp_Email];
				$Emp_ExtensionNumber=$rs[Emp_ExtensionNumber];
				$Emp_Mobile=$rs[Emp_Mobile];
				$Emp_SpeedDial=$rs[Emp_SpeedDial];
				$Dep_Name=$rs[Dep_Name]; 
				$Pos_Name=$rs[Pos_Name];
				
						if ($no == 1 )
						{  
							$Emaillink = trim($Emp_Email);
						}else{
							$Emaillink.=";".trim($Emp_Email);
						} 
						

					 $bgcolor ='"#E0E0E0"';
					
				
					$TRhover='this.bgColor="#D6EBFF"';
					$TR_Nohover='this.bgColor="#E0E0E0"';
					
				
					$TR_Hi="toggle(this)";


				
			if ($key_Group =="Email") 
				 {	
		  
				echo"<tr bgcolor=$bgcolor onMouseOver=$TRhover onMouseOut =$TR_Nohover onClick=$TR_Hi >";
				
				//1 No.
				echo"<TD height=30><div align='center' class='style82'>$no</div></TD>";				
				
				echo"<TD><div align='center' class='style82'><input title='Select Email' type='checkbox' name='chkfri[]' value=$Emp_Email  $Chk_box></div></TD>";
				//2 Email
				echo"<TD><div align='Left' class='style88'>&nbsp;&nbsp;<a href=\"mailto:$Emp_Email\">$Emp_Email</a></div></TD>";
				//3 Name
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Emp_NickName</div></td>";
				//4 Sure Name
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Emp_Name</div></td>";
				//5 Nick Name
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Emp_SurName</div></td>";
				//6 Department
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Dep_Name</div></td>";
				//7 Position
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Pos_Name</div></td>";
				//8 Nationality
				echo"<TD><div align='center' class='style29'>$Emp_Nationality</div></td>";
				
				
				//-------------------------------------------------------------------------------------------
				echo"</tr>";	
						//if($search_multiple == true){

						//}
			}else if($key_Group == "Phone"){
				
				echo"<tr bgcolor=$bgcolor onMouseOver=$TRhover onMouseOut =$TR_Nohover onClick=$TR_Hi >";

				//1 No.
				echo"<TD height=30><div align='center' class='style82'>$no</div></TD>";
				//2 ExtensionNumber
				echo"<TD><div align='center' class='style29'>$Emp_ExtensionNumber</div></td>";
				//3 NickName
				echo"<TD><div align='center' class='style29'>$Emp_NickName</div></td>";
				//4 Name
				echo"<TD><div align='Left' class='style29'>$Emp_Name</div></td>";
				//5 Departmert
				echo"<TD><div align='Left' class='style29'>$Dep_Name</div></td>";
				//6 Position
				echo"<TD><div align='Left' class='style29'>$Pos_Name</div></td>";
				//7 SpeedDial
				echo"<TD><div align='center' class='style29'>$Emp_SpeedDial</div></td>";
				//8 Mobile
				echo"<TD><div align='Left' class='style29'>$Emp_Mobile</div></td>";
				//9 Nationality
				echo"<TD><div align='center' class='style29'>$Emp_Nationality</div></td>";
				
				echo"</tr>";
				
				
			}elseif($key_Group == "Groups")
						{

				echo "<tr bgcolor=$bgcolor onMouseOver=$TRhover onMouseOut =$TR_Nohover onClick=$TR_Hi >";

				//1 No.
				echo"<TD height=30><div align='center' class='style82'>$no</div></TD>";				
				//2 Email
				echo"<TD><div align='Left' class='style88'>&nbsp;&nbsp;<a href=\"mailto:$Emp_Email\">$Emp_Email</a></div></TD>";
				//3 Name
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Emp_Name</div></td>";
				//4 Sure Name
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Emp_SurName</div></td>";
				//5 Nick Name
				echo"<TD><div align='center' class='style29'>$Emp_NickName</div></td>";
				//6 Department
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Dep_Name</div></td>";
				//7 Position
				echo"<TD><div align='Left' class='style29'>&nbsp;&nbsp;$Pos_Name</div></td>";
				//8 Nationality
				echo"<TD><div align='center' class='style29'>$Emp_Nationality</div></td>";
				
				echo"</tr>";
				
				
				}


			$no++;


	}
}        

	if ($key_Group =="Email"){
			
		
		
		$filName = "Employee.csv"; 
      $objWrite = fopen("Employee.csv", "w"); 

			
$objQuery = mssql_query($sqlchk) or die ("Error Query [".$sqlchk."]"); 

 
  $no_Csv=1;
  
 $Button = "<input  type=image name=Email id=Email value=Email  src=images/icon/email.png border=0 WIDTH=50 HEIGHT=50 ALT=Send All align=left";
  
 

  
   
fwrite($objWrite,"\"No.\",\"E-mail\",\"Name\",\"Sure Name\",\"Nick Name\",\"Department\",\"Position\",\"Nationality\" \n");

  
while($objResult = mssql_fetch_array($objQuery)) 
{ 
fwrite($objWrite, "\"$no_Csv\",\"$objResult[Emp_Email]\",\"$objResult[Emp_Name]\","); 

fwrite($objWrite, "\"$objResult[Emp_SurName]\",\"$objResult[Emp_NickName]\","); 

  
fwrite($objWrite, "\"$objResult[Dep_Name]\",\"$objResult[Pos_Name]\",\"$objResult[Emp_Nationality]\" \n"); 

$no_Csv++;
} 
fclose($objWrite); 

echo "<div align='left' class='style31'><a href=$filName><IMG SRC=images/icon/CSV.png border=0 WIDTH=50 HEIGHT=50 title='Export to Excel' ></a> 


<IMG SRC=images/icon/email.png border=0 WIDTH=50 HEIGHT=50 title='Click to send all selected email' style=cursor:pointer Onclick = document.form2.submit();>

<IMG SRC=images/icon/copyicon.png  border=0 WIDTH=50 HEIGHT=50 title ='Copy Email All' style=cursor:pointer  Onclick = copymail()></div>
  " ;  //Edit Emaiil Copy All
	
	}	
if ($key_Group=="Groups"){
	
				
		$filName = "Employee.csv"; 
$objWrite = fopen("Employee.csv", "w"); 

$objQuery = mssql_query($sqlchk) or die ("Error Query [".$sqlchk."]"); 

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


echo "<div align='left' class='style31'><a href=$filName><IMG SRC=images/icon/CSV.png border=0 WIDTH=50 HEIGHT=50 title='Export to Excel' align=absmiddle></a>

<a href=\"mailto:$Emaillink\"><IMG SRC=images/icon/email.png border=0 WIDTH=50 HEIGHT=50 title='Send Email' align=absmiddle></a></div>" ;  

}	
	if($key_Group=="Phone")
{
	
		$filName = "Employee.csv"; 
$objWrite = fopen("Employee.csv", "w");

$objQuery = mssql_query($sqlchk) or die ("Error Query [".$sqlchk."]"); 

 
  $no_Csv=1;
  
fwrite($objWrite,"\"No.\",\"Extension No.\",\"Nick Name\",\"Name\",\"Department\",\"Position\",\"Speed Dial\",\"Mobile\",\"Nationality\" \n");

  
while($objResult = mssql_fetch_array($objQuery)) 
{ 
fwrite($objWrite, "\"$no_Csv\",\"$objResult[Emp_ExtensionNumber]\",\"$objResult[Emp_NickName]\","); 

fwrite($objWrite, "\"$objResult[Emp_Name]\",\"$objResult[Dep_Name]\",\"$objResult[Pos_Name]\","); 

  
fwrite($objWrite, "\"$objResult[Emp_SpeedDial]\",\"$objResult[Emp_Mobile]\",\"$objResult[Emp_Nationality]\"  \n"); 

$no_Csv++;
} 
fclose($objWrite); 

echo "<div align='left' class='style31'><a href=$filName><IMG SRC=images/icon/CSV.png border=0 WIDTH=50 HEIGHT=50 title='Export to Excel' align=absmiddle></a></div>" ; 

		
}
// Comment เดอ้ */ 
			
?> 
	
	<input name="key_Group_C" type="hidden" id="key_Group_C" value="<?php echo "$key_Group"; ?>" />
       
    </form>    
    


</body>
</html>
