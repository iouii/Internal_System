 <?
 
 	include "chksession.php";
	include "connect.php";	
	
  $Usr_IdLoginCode=$_GET["Usr_IdLogin"];	
  $Usr_IdLogin=base64_decode(base64_decode("$Usr_IdLoginCode"));
 ?>
<head>
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

    <script type='text/javascript' src='BoxColor/prototype.compressed.js'></script>
<script type='text/javascript' src='BoxColor/procolor.compressed.js'></script>
</head>

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
background:#cbeffd;
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

.thead {
    background-color: #0288df;
    height: 8px !important;
    font-size: 16px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

table{
  font-size:14px;
}

tr {
    border: 1px solid #ddd !important;
}

td {

    border: 1px solid #ddd !important;
  
}

</style>
<body>
<div class="container-fluid">
        <div class="row">

        <div class="col-lg-4 col-md-12 col-12 ">
</div>

<div class="col-lg-4 col-md-12 col-12 ">
<form action="Camera_save_DB.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table class="table"  align="center">

  <tr class="thead">
  <td colspan="2">Add Image</td>  
    </tr>
  <tr>
    <td >ลำดับสไลด์</td>
    <td>
    <?		
		include "connect.php";
			$sqlnum="select INF_ID from Informations";
			$querynum = mssql_query($sqlnum);
			$num = mssql_num_rows($querynum);
		
			$INF_Numrun=$num+1;
			
			?>
    <input name="INF_Numrun" type="Number" id="INF_Numrun" size="2" maxlength="2" value="<? echo "$INF_Numrun";?>"/></td>
  </tr>
  <tr>
    <td>ข้อความ</td>
    <td><?		
		include "connect.php";
			$sql="select max(INF_ID) from Informations";
			$result= mssql_query($sql);
			$r= mssql_fetch_array($result);
			$id=$r[0];
			$INF_ID=$id+1;
			?>
     <input type="hidden" name="INF_ID" id="INF_ID" value="<? echo $INF_ID ?>" />
     <label for="INF_Message1"></label>
     <textarea name="INF_Message1" id="INF_Message1" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>ขนาดตัวอักษร</td>
    <td><input name="INF_Fontsize" type="text" id="INF_Fontsize" size="2" maxlength="2" />
      PX</td>
  </tr>
  <tr>
    <td>รูปแบบตัวอักษร</td>
    <td><input type="checkbox" name="INF_Fontstyle1" id="INF_Fontstyle1" />
      <em>Italics
        <input type="checkbox" name="INF_Fontstyle2" id="INF_Fontstyle2" />
      </em><strong>Bold  
      <label for="INF_Fontstyle3"></label>
      <select name="INF_Fontstyle3" id="INF_Fontstyle3">
        <option value="Center">Center</option>
        <option value="Left">Left</option>
        <option value="Right">Right</option>
      </select>
      </strong></td>
  </tr>
  <tr>
    <td>ตำแหน่งข้อความ</td>
    <td><input name="INF_Box" type="text" id="INF_Box" size="2" maxlength="2" />
      %</td>
  </tr>
  <tr>
    <td>รูปภาพ</td>
    <td><input type="file" name="INF_PicturePath"  /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"> 
  <input name="INF_Fontcolor" type="text" id="INF_Fontcolor" style="width: 6em;" value="#FF0000" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button"  class="btn btn-primary" id="button" value="Submit" />
        <input name="Usr_IdLogin" type="hidden" id="Usr_IdLogin" value="<?="$Usr_IdLogin";?>" />
      </td>
    </tr>
</table>
</form>
<script type="text/javascript">
  ProColor.prototype.attachButton('INF_Fontcolor', { imgPath:'BoxColor/img/procolor_win_', showInField: true });
</script>
</body>

</html>