<!DOCTYPE html>
<!-- Camera is a Pixedelic free jQuery slideshow | Manuel Masia (designer and developer) --> 
<html> 
<head> 
    <title>Ogura Clutch (Thailand)</title> 
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    
    
    
<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />

	<script type="text/javascript">
	
		$(window).load(function() {
			$('.flexslider').flexslider({
			
			directionNav: false,       
   			controlNav: true,
			
			    slideshowSpeed: 15000,           
    			animationDuration: 2000        

		});
		});
	</script>
    
    
<style type="text/css">
body {
    overflow:hidden;
}
</style>    
    
	
	
</head>
<body>

<div class="flexslider">
	   <ul class="slides">
             <? 

include "connect.php";

$sqlchk = "select * from Informations ORDER BY INF_BgTransparent ASC" ;
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
		
		
		//WIDTH="1920" HEIGHT="1000"
		
?>

 <?
$INF_Message1=trim($INF_Message1_Null);
 
//---------------Edit Boxtext Eror-------------------------------------------------------------------------
 if($INF_BgColor=='0')
 {
	$INF_BgColor=""; 
	 }
//------------------------------------------------------------------------------------------------------------- 
 
 $TextStyle="<p class='flex-caption' style='padding-bottom:5px; font-size: $INF_FontsizeAll; font-style:$INF_Fontstyle1; font-weight:$INF_Fontstyle2; color:$INF_Fontcolor; text-align:$INF_Fontstyle3; text-transform:uppercase;  
  text-shadow: black 0.1em 0.1em 0.2em; bottom:$INF_BgColor%';>"; 
 
 ?>
<?
	$sqlchkNum =  "SELECT INF_ID from Informations";
	$querychkNum = mssql_query($sqlchkNum);
	$num = mssql_num_rows($querychkNum);
	
	if($num == 1){
	echo"<img src='$INF_PicturePath' WIDTH='1159' HEIGHT='700'/>";

	
	}
	
	else{
		
echo"<li><img src='$INF_PicturePath' WIDTH='1159' HEIGHT='700'/>"; 

if($INF_Message1!=""){
	
	echo "$TextStyle";
	echo nl2br("$INF_Message1");
	echo "</p>";
		
	}
echo"</li> ";
		
		}

?>  
                 <? } ?>
                                                        
                  
			</ul>
		</div>
			
	</div>

</div>

<!--
Play Music BG
-->

<audio controls autoplay loop>
<!--
  <source src="sound/Testogg.ogg" type="audio/ogg">
  -->
  <source src="sound/Allmusic.mp3" type="audio/mpeg">

  Your browser does not support the audio tag.
</audio>

</body>
</html>

      