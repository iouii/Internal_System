<!DOCTYPE html>
<html> 
<head> 
    <title>Ogura Clutch (Thailand)</title> 
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
<style type="text/css">
body {
    overflow:hidden;
}
</style>    	
</head>
<body>
             <? 
include "connect.php";
$sqlchk = "select * from Informations Where INF_ID=$INF_ID ORDER BY INF_BgTransparent ASC" ;
$result=mssql_query($sqlchk);
	while($rs=mssql_fetch_array($result))

		{	
		$INF_ID=$rs[INF_ID];
		$INF_Message1_Null=$rs[INF_Message1];
		$INF_Message2=$rs[INF_Message2];
		$INF_Message3=$rs[INF_Message3];
		$INF_Fontcolor=$rs[INF_Fontcolor];
		$INF_Fontsize=$rs[INF_Fontsize];
		$INF_Fontstyle1=$rs[INF_Fontstyle1];
		$INF_Fontstyle2=$rs[INF_Fontstyle2];
		$INF_Fontstyle3=$rs[INF_Fontstyle3];
		$INF_BgColor=$rs[INF_BgColor];
		$INF_BgTransparent=$rs[INF_BgTransparent];
		$INF_PictureName=$rs[INF_PictureName];
		$INF_PicturePath=$rs[INF_PicturePath];
		$INF_Note=$rs[INF_Note];
		$BOT_ID=$rs[BOT_ID];
		$INF_FontsizeAll=$INF_Fontsize.'px';
?>
 <?
$INF_Message1=trim($INF_Message1_Null);
 if($INF_BgColor=='0')
 {
	$INF_BgColor=""; 
	 }
 
 $TextStyle="<div class='caption elemHover fadeFromBottom' style='padding-bottom:5px; font-size: $INF_FontsizeAll; font-style:$INF_Fontstyle1; font-weight:$INF_Fontstyle2; color:$INF_Fontcolor; text-align:$INF_Fontstyle3; text-transform:uppercase;  
  text-shadow: black 0.1em 0.1em 0.2em; bottom:$INF_BgColor%';>"; 
 
 ?>
<?
	$sqlchkNum =  "select INF_ID from Informations where INF_ID = '$INF_ID'";
	$querychkNum = mssql_query($sqlchkNum);
	$num = mssql_num_rows($querychkNum);
	
	if($num != 1){
	echo"<img src='$INF_PicturePath' WIDTH='1159' HEIGHT='700'/>";
	
	}
	
	else{
		
echo"<img src='$INF_PicturePath' WIDTH='1159' HEIGHT='700'/>"; 

if($INF_Message1!=""){
	
	echo "$TextStyle";
	echo nl2br("$INF_Message1");
	echo "</div>";
	}
		
		}
?>  
                 <? } ?>
			</ul>
		</div>
			
	</div>

</div>

</body>
</html>

      