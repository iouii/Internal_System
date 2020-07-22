
<? 
				  
				  	include "connect.php";

					$Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
					$Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
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
 
 
	<a href='<? echo"$Rig_PageLink7$UrlSearchall$Usr_IdLoginCode"; ?>'><img border='0' src='images/Button Menu/<? echo"$Rig_Name7";?>.png' onmouseover="this.src='images/Button Menu/<? echo"$Rig_Name7_back";?>.png'" onmouseout="this.src='images/Button Menu/<? echo"$Rig_Name7";?>.png'"    width='75' height='60'/></a>
	
			
	<? } ?>
	<a href='logout.php'><img src='images/Button Menu/logout.png' onmouseover="this.src='images/Button Menu/logout_b.png'"   onmouseout="this.src='images/Button Menu/logout.png'" width='75' height='60' border='0'align='' /></a>
	
                       
                         
                         
                         
                         