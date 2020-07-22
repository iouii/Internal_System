<!DOCTYPE html>

<head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=tis-620" /> -->
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

</head>

<script type="text/javascript" src="FancyBox/jquery.min.js"></script>
<script>
!window.jQuery && document.write('<script src="FancyBox/jquery-1.4.3.min.js"><\/script>');
</script>
<script type="text/javascript" src="FancyBox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="FancyBox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="FancyBox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<?
 
 include "chksession.php";
include "connect.php";	

$Usr_IdLogin=$_POST["Usr_IdLogin"];	
$Usr_IdLoginCode=base64_encode(base64_encode("$Usr_IdLogin"));


?>

<script type="text/javascript">
$(document).ready(function() {

    $('a[id^="edit"]').fancybox({
        'width': '53%',
        'height': '73%',
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        onClosed: function() {
            parent.location.reload(true);
        }
    });
    $('a[id^="delete"]').fancybox({
        'width': '20%',
        'height': '20%',
        onStart: function() {
            return window.confirm('Do you want to delete?');
        },
        onClosed: function() {
            parent.location.reload(true);
        }
    });

    $("#AddData").fancybox({
        'width': '53%',
        'height': '78%',
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        onClosed: function() {
            parent.location.reload(true);
        }
    });
    $("#AddData2").fancybox({
        'width': '53%',
        'height': '78%',
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        onClosed: function() {
            parent.location.reload(true);
        }
    });

    $("#View").fancybox({
        'width': '900',
        'height': '600',
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        onClosed: function() {
            parent.location.reload(true);
        }
    });


    $("#View2").fancybox({
        'width': '900',
        'height': '600',
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        onClosed: function() {
            parent.location.reload(true);
        }
    });

    $('a[id^="zoom"]').fancybox({
        'width': '1159',
        'height': '700',
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        onClosed: function() {
            parent.location.reload(true);
        }
    });


});
</script>

<style>
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
tr {
    border: 1px solid #ddd !important;
}

td {

    border: 1px solid #ddd !important;
  
}
</style>

<body>

    <?
include "admin-menu.php";

?>
    <hr>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 col-md-12 col-12 ">            
            <table class="table">
                    <tr class="thead">
                    <td>เพิ่มรูปภาพ</td>
                    </tr>
                        <tr>
                            <td align="center">
                            <a id="AddData"
                                    href="Camera_save.php?Usr_IdLogin=<? echo $Usr_IdLoginCode ?>"
                                    class="btn btn-primary">Add Images</a>
                                    </td>
                        </tr>

                    </table>

                    <table class="table">
                    <tr class="thead">
                    <td>ตรวจสอบรูปภาพ</td>
                    </tr>
                        <tr>
                            <td align="center">
                                <a id="View2" href="OguraCameraView_EX.php" class="btn btn-danger">View</a></td>
                        </tr>

                    </table>

            </div>

            <div class="col-lg-8 col-md-12 col-12 ">

                <? 

include "connect.php";
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";   
$intRows = 0;
$sqlchk = "select * from Informations ORDER BY INF_BgTransparent ASC" ;
$result=mssql_query($sqlchk);
	while($rs=mssql_fetch_array($result))

		{	
		$INF_ID=$rs[INF_ID];
		$INF_Message1=$rs[INF_Message1];
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
		
		$i++;

		$intRows++;
echo "<td>";  
		
		
		
?>
                <?
 $TextStyle="<div class='caption elemHover fadeFromBottom' style='padding-bottom:5px; font-size: 12px; font-style:$INF_Fontstyle1; font-weight:$INF_Fontstyle2; color:$INF_Fontcolor; text-align:$INF_Fontstyle3; text-transform:uppercase;  
  text-shadow: black 0.1em 0.1em 0.2em; bottom:$INF_BgColor%';>"; 
 
 ?>
                <table class="table">
              <tr class="thead">
              <td >
              ตัวอย่าง
              </td>
              </tr>
                    <tr>
                        <td>
                            <?php 
							echo "$TextStyle";
						echo nl2br($INF_Message1) 
										?>
                        </td>
                    </tr>
                    <tr>
                        <td><a id="zoom<?=$i;?>"
                                href="Camera_Zoom.php?INF_ID=<? echo $INF_ID ?>&Usr_IdLogin=<? echo $Usr_IdLoginCode ?>"><img
                                    src="<?php echo $INF_PicturePath ?>" alt=""  border="0"
                                    align="middle" /></a></td>

                    </tr>
                    <tr>
                        <td align="center">
                            <a id="edit<?=$i;?>"
                                href="Camera_edit.php?INF_ID=<? echo $INF_ID ?>&Usr_IdLogin=<? echo $Usr_IdLoginCode ?>"
                                class="btn btn-primary ">Edit</a>
                            <a id="delete<?=$i;?>"
                                href="Camera_Delete.php?INF_ID=<? echo $INF_ID ?>&Usr_IdLogin=<? echo $Usr_IdLoginCode ?>"
                                class="btn btn-danger ">Delete</a>
                        </td>
                    </tr>
                    <? //} ?>
                </table>
                <?
		echo"</td>";
if(($intRows)%2==0)
{
echo"</tr>";
}
else
{
echo "<td>";
}  
}
echo"</tr></table>";

?>
                </td>
                </tr>
                </table>


            </div>

</body>

</html>