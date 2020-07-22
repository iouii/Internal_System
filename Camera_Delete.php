 <?php
 
 
include "chksession.php";

include "connect.php";	
$Usr_IdLogin=$_GET["Usr_IdLogin"];
$INF_ID=$_GET["INF_ID"];
$Sqlselect = "select INF_PictureName from Informations where INF_ID ='$INF_ID'";
$rsselect = mssql_query($Sqlselect);
while($rs = mssql_fetch_array($rsselect))

{
$INF_PictureName=$rs[INF_PictureName];

@unlink ("images/WelcomeSlide/$INF_PictureName");
}

		$strSQL = " select * from Informations where INF_ID = '$INF_ID'";
				
				
		$querysh = mssql_query($strSQL);

			while($rslog=mssql_fetch_array($querysh))
			{

		$INF_Message1=$rslog[INF_Message1];
		$INF_Message2=$rslog[INF_Message2];
		$INF_Message3=$rslog[INF_Message3];
		$INF_Fontcolor=$rslog[INF_Fontcolor];
		$INF_Fontsize=$rslog[INF_Fontsize];
		$INF_Fontstyle1=$rslog[INF_Fontstyle1];
		$INF_Fontstyle2=$rslog[INF_Fontstyle2];
		$INF_Fontstyle3=$rslog[INF_Fontstyle3];
		$INF_BgColor=$rslog[INF_BgColor];
		$INF_BgTransparent=$rslog[INF_BgTransparent];
		$INF_PictureName=$rslog[INF_PictureName];
		$INF_PicturePath=$rslog[INF_PicturePath];
		$INF_Note=$rslog[INF_Note];
		$BOT_ID=$rslog[BOT_ID];
	
			
		$log_Type  ='SlideShow';		
		$tub='/';
		$log_Detail  ="$INF_BgTransparent";
		$log_Detail .="$tub";
		$log_Detail .="$INF_Message1";
		$log_Detail .="$tub";
		$log_Detail .="$INF_Fontsize";
		$log_Detail .="$tub";
		$log_Detail .="$INF_Fontstyle1";
		$log_Detail .="$tub";
		$log_Detail .="$INF_Fontstyle2";
		$log_Detail .="$tub";
		$log_Detail .="$INF_Fontstyle3";
		$log_Detail .="$tub";
		$log_Detail .="$INF_BgColor";
		$log_Detail .="$tub";
		$log_Detail .="$INF_PictureName";
		$log_Detail .="$tub";
		$log_Detail .="$INF_PicturePath";
		$log_Detail .="$tub";
		$log_Detail .="$INF_Fontcolor";		
		$log_Action ="Delete";	
		$timeformat="Y-m-d  H:i:s";
		$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
		$datetime=date($timeformat,$THdt);
		
		$log_Date=$datetime;
		
		
		$log_By=$ses_Usr_Account;

				
		$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
		$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;

		$objQuery = mssql_query($strSQL);
				
				
			}

		$sqlDelete = "delete from Informations where INF_ID='$INF_ID'";
		mssql_query($sqlDelete)or die("error=$sqlDelete");
		echo "<script>top.location='Camera_list.php?Usr_IdLogin=$Usr_IdLogin';</script>"; 
	

?>