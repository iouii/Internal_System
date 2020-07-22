
<style>

.btn{
    margin-top:8px;
    border-style: solid !important;
    margin-left:5px;
}

</style>
<body>
<?php

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

<div class="container-fluid">
    <div class="row">
 
        <div class="col-lg-12 col-md-12 col-12 ">

		<table class='table'>
<tr class="thead">
<td>
Menu

</td>
</tr>
<tr>
<td>
<? 
				  
				  	include "connect.php";				
				$sqlchklogin  = "select * from Rights R INNER JOIN UserFunction UF ON R.Rig_Id = UF.Rig_Id ";
				$sqlchklogin .= "where UF.Usr_Id = '$Usr_IdLogin'";
				$sqlchklogin .=" ORDER BY R.Rig_Id ASC " ;				  
				$Url='?Usr_IdLogin=';
				$UrlSearchall='?code=Email&Usr_IdLogin=';
				   
				  $querychklogin = mssql_query($sqlchklogin)or die("error=$sqlchklogin");
			while($rslogin=mssql_fetch_array($querychklogin))
			 
		 { 
						$Rig_Name7=$rslogin[Rig_Name];
						$Rig_PageLink7=$rslogin[Rig_PageLink];
																		
						$Rig_Name7_back=$Rig_Name7.'_b';
						
					?>
                <a class="btn  btn-primary" href='<? echo"$Rig_PageLink7"; ?>'><? echo"$Rig_Name7"; ?></a>

                <? } ?>
				<input class="btn btn-danger" type="button" name="" onclick="exit()" value="Exit">				
				</td>
				</tr>
				</table>
                </div>
                </div>
                </div>
       
                <script type="text/javascript">


function setparam() {
    var setThis = document.stu;
    window.location.href = 'SearchAll.php?code=' + setThis.key_Group.value + '&Usr_IdLogin=' + setThis.Usr_IdLogincode
        .value; 


}
function exit() {
                if (confirm("You want to exit!!") == true) {
                    window.close();
                }
            }
</script>