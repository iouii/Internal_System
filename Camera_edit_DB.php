 <?php
 
include "chksession.php"; 
include "connect.php";	

	$INF_ID=$_POST['INF_ID'];
	$INF_Message1_Null=$_POST['INF_Message1'];
	$INF_Fontcolor=$_POST['INF_Fontcolor'];
	$INF_Fontsize=$_POST['INF_Fontsize'];
	$INF_Fontstyle1=$_POST['INF_Fontstyle1'];
	$INF_Fontstyle2=$_POST['INF_Fontstyle2'];
	$INF_Fontstyle3=$_POST['INF_Fontstyle3'];
	$INF_BgTransparent=$_POST['INF_Numrun'];
	$INF_BgColor=$_POST['INF_Box'];
	$INF_PicturePath_ori=$_POST['INF_PicturePath_ori'];
	$INF_PictureName_ori=$_POST['INF_PictureName_ori'];
	$INF_PicturePath=$_FILES['INF_PicturePath']['tmp_name'];
	$INF_PicturePath_name=$_FILES['INF_PicturePath']['name'];
	$INF_PicturePath_size=$_FILES['INF_PicturePath']['size'];
	$INF_PicturePath_type=$_FILES['INF_PicturePath']['type'];
$No_number="1";
if($INF_Fontstyle2 =='on'){
	
	$INF_Fontstyle2='bold';
	
	}
else{
	$INF_Fontstyle2="";
	}

if($INF_Fontstyle1 =='on'){
	
	$INF_Fontstyle1='italic';
	
	}
else{
	$INF_Fontstyle1="";
	}

$idData=$INF_ID;


$path = "images/WelcomeSlide";
if ($INF_PicturePath != "")
 {
  
   if(strchr($INF_PicturePath_name,".")==".jpg"|| strchr($INF_PicturePath_name,".")==".jpeg"||
      strchr($INF_PicturePath_name,".")==".gif"|| strchr($INF_PicturePath_name,".")==".JPG"||
      strchr($INF_PicturePath_name,".")==".JPEG"|| strchr($INF_PicturePath_name,".")==".GIF"|| 
	  strchr($INF_PicturePath_name,".")==".png"|| strchr($INF_PicturePath_name,".")==".PNG"
	  )
	  {
	    $RenameFile=$idData.strchr($INF_PicturePath_name,".");
		
		
		 if ( copy($INF_PicturePath,"$path/$RenameFile"))
            {
		       unlink($INF_PicturePath);
			   
			   $path_C="$path/$RenameFile";
			 } else 
			 { print "Error... can not upload <br>";
			  }
		  }
		 } else {
			  $path_C="$INF_PicturePath_ori";
			  $RenameFile="$INF_PictureName_ori";
		
		}	  
		
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
	$log_Detail .="$RenameFile";
	$log_Detail .="$tub";
	$log_Detail .="$path_C";
	$log_Detail .="$tub";
	$log_Detail .="$INF_Fontcolor";

	$log_Action ="Edit";
	$timeformat="Y-m-d  H:i:s";
	$THdt= mktime(gmdate("H")+7,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y") );
	$datetime=date($timeformat,$THdt);
	
	$log_Date=$datetime;

	$log_By=$ses_Usr_Account;
	
			
	$strSQL  = "insert into Logs(log_Type, log_Detail, log_Action, log_Date, log_By) " ;
	$strSQL .= "values('$log_Type','$log_Detail','$log_Action','$log_Date','$log_By') ; " ;

	$objQuery = mssql_query($strSQL);
	$SqlEdit  = "update Informations ";
	$SqlEdit .= " set INF_Message1='$INF_Message1',INF_Fontcolor='$INF_Fontcolor',INF_Fontsize='$INF_Fontsize',";
	$SqlEdit .= " INF_Fontstyle1='$INF_Fontstyle1',INF_Fontstyle2='$INF_Fontstyle2',INF_Fontstyle3='$INF_Fontstyle3',"; 
	$SqlEdit .= " INF_BgColor='$INF_BgColor',INF_BgTransparent='$INF_BgTransparent',INF_PictureName='$RenameFile',";
	$SqlEdit .= "INF_PicturePath='$path_C'";
	$SqlEdit .=" where INF_ID = '$INF_ID' ";

		mssql_query($SqlEdit);

	$Usr_IdLoginCode=$_POST["Usr_IdLogin"];
	$Usr_IdLogin=base64_encode(base64_encode("$Usr_IdLoginCode"));	

echo "<B>Upload Images...</B> ";

echo "<script>top.location='Camera_list.php?Usr_IdLogin=$Usr_IdLogin';</script>"; 
?>