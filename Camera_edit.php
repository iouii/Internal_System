<?
 	include "chksession.php";
	include "connect.php";	
	
  $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
  $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
		
  $INF_ID_Url=$_GET["INF_ID"];
	$sqlCon = "select * from Informations where INF_ID='$INF_ID_Url'";
	$result=mssql_query($sqlCon);
	$rsT= mssql_fetch_array($result);
	$INF_PicturePath_ori=$rsT['INF_PicturePath'];
	$INF_PictureName_ori=$rsT['INF_PictureName'];
	$INF_Fontstyle1=$rsT['INF_Fontstyle1'];
	$INF_Fontstyle2=$rsT['INF_Fontstyle2'];
	$INF_BgColor=trim($rsT['INF_BgColor']);
	$INF_Message1=trim($rsT['INF_Message1']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
body {
	background-color: #FFF;
}

.simply{
font:14px Trebuchet MS, Tahoma;
margin: 45px;
width: 500px;
border-collapse: collapse;
text-align: left;
}
.simply th{
font:normal 16px Trebuchet MS, Tahoma;
color: #222;
background:#FFCC99;
padding: 10px 8px;
border-bottom: 2px solid #ccc;
}
.simply td{
border-bottom: 1px solid #ccc;
color: #666;
background: #fff;
padding: 5px;
}
.simply tbody tr:hover td{
color: #222;
background: #eee;
}


</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type='text/javascript' src='BoxColor/prototype.compressed.js'></script>
<script type='text/javascript' src='BoxColor/procolor.compressed.js'></script>

</head>

<body>

<form action="Camera_edit_DB.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table class="simply" width="500" border="0" align="center">
  <tr>
    <th scope="col" colspan="2" align="center"><strong>Edit Image</strong></th>
    </tr>
  <tr>
    <td>ลำดับสไลด์</td>
    <td><?		
		include "connect.php";
	
			$sqlnum="select INF_ID from Informations";
			$querynum = mssql_query($sqlnum);
			$num = mssql_num_rows($querynum);
			
			if($num=="0")
			{
				$num="1";
			}
			
			$INF_Numrun=$num;
			
			?>
      <input name="INF_Numrun" type="number" id="INF_Numrun" size="2" maxlength="2" value="<?=$rsT['INF_BgTransparent']?>"/>
     (<? echo "$INF_Numrun";?>)</td>
  </tr>
  <tr>
    <td>ข้อความ</td>
    <td><label for="INF_Message1"></label>
      <textarea name="INF_Message1" id="INF_Message1" cols="45" rows="5"><? echo"$INF_Message1"; ?></textarea>
      <input type="hidden" name="INF_ID" id="INF_ID" value="<?=$rsT['INF_ID']?>" />
      <input type="hidden" name="INF_PicturePath_ori" id="INF_PicturePath_ori" value="<?=$rsT['INF_PicturePath']?>" />
       <input type="hidden" name="INF_PictureName_ori" id="INF_PictureName_ori" value="<?=$rsT['INF_PictureName']?>" />
    </td>
  </tr>
  <tr>
    <td>ขนาดตัวอักษร</td>
    <td><input name="INF_Fontsize" type="text" id="INF_Fontsize" size="2" maxlength="2" value="<?=$rsT['INF_Fontsize']?>"/>
      PX</td>
  </tr>
  <tr>
    <td>รูปแบบตัวอักษร</td>
    <td>
    <?
	if($INF_Fontstyle1=="italic"){
	
	$Check_I='checked="checked"';
	}
	else{
	$Check_I='';	
	}
	?>
      <?
	if($INF_Fontstyle2=="bold"){
	
	$Check_b='checked="checked"';
	}
	else{
	$Check_b='';	
	}
	?>
    <input name="INF_Fontstyle1" type="checkbox" id="INF_Fontstyle1" <?=$Check_I ?> />
      <em>Italics
        <input name="INF_Fontstyle2" type="checkbox" id="INF_Fontstyle2" <?=$Check_b ?>/>
      </em><strong>Bold 
      <select name="INF_Fontstyle3" id="INF_Fontstyle3">
        <option value="Center">Center</option>
        <option value="Left">Left</option>
        <option value="Right">Right</option>
      </select>
      </strong></td>
  </tr>
  <tr>
    <td>ตำแหน่งข้อความ</td>
    <td><input name="INF_Box" type="text" id="INF_Box" size="2" maxlength="2" value="<? echo "$INF_BgColor"; ?>"/>
      %</td>
  </tr>
  <tr>
    <td>รูปภาพ</td>
    <td><input type="file" name="INF_PicturePath" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div style="text-align: left; margin-bottom: 3em;">
  <input name="INF_Fontcolor" type="text" id="INF_Fontcolor" style="width: 6em;" value="<?=$rsT['INF_Fontcolor']?>" />
</div>

<script type="text/javascript"><!--
  ProColor.prototype.attachButton('INF_Fontcolor', { imgPath:'BoxColor/img/procolor_win_', showInField: true });
--></script>
    </td>
  </tr>
  <tr>
    <th scope="col" colspan="2" align="center"><input type="submit" name="button" id="button" value="Submit" />
      <label for="fileField">
        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
      </label></th>
    </tr>
 
</table>
</form>
</body>
</html>