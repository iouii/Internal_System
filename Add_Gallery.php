<!DOCTYPE html>
<html lang="en">
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

    <title>Add Gallery</title>

</head>
<style>
.table {
    border: 1px solid #fff !important;

    text-align: left !important;
    border-radius: 3px !important;
}
.hoz:hover {
    background-color: #cce4ff !important;
}
.ChkBox {
    margin-left: 8px !important;
}
.bodytable {
    background-color: #fff;
    border: 1px solid #000;
    border-radius: 3px !important;
    margin-top: 5px;
    font-size: 17px;
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
    <?php
	require_once "admin-menu.php";				
    ?>
    <?php
    require "connectsql.php";
    $selectedValue = "0";
    ?>
    <hr>
<div class="container-fluid">
<div class="row">
<div class="col-lg-1 col-md-12 col-12 ">
</div>
<div class="col-lg-4 col-md-12 col-12 ">
<form action="Add_Gallery.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table class="table">
<tr class="thead">
<td colspan="2">
เลือกข้อมูลเพื่อแก้ไข
</td>
</tr>
<tr>
<td align="center">หัวข้อ</td>
<td>
<select name="filtro" id="filtro" class='custom-select'>
<option value="0">ค้นหาข้อมูล</option>
<?php 
$selAct = "SELECT Ac_id,Ac_name from Ac_Gallery";
$queryselAct = mssql_query($selAct);
while($resultselAc = mssql_fetch_array($queryselAct)) 
{
?>
<option value="<?php echo $resultselAc[1]; ?>"><?php echo $resultselAc[1];?>
</option>
<?php 
}
?>
</select>
</td>
</tr>

</form>

</table>
</div>
            <div class="col-lg-6 col-md-12 col-12 ">
                <script type="text/javascript" language="javascript">
                document.getElementById('filtro').onchange = function() {
                    document.getElementById('form1').submit();
                }
                function setSelected(value) {
                    var filtro = document.getElementById('filtro');
                    var options = filtro.options;
                    for (var i = 0; i < options.length; i++) {
                        if (options[i].value == value) {
                            filtro.selectedIndex = i;
                        }
                    }
                }
                </script>
                <?php
if(isset($_POST['filtro'])){
    $selectedValue = $_POST['filtro'];

    echo "<script type='text/javascript'>setSelected($selectedValue)</script>";

}
?>

                <?php ;
		if(isset($selectedValue)){
			$edit = "SELECT Ac_name,Ac_datetime," ;
			$edit .= "Ac_image,Ac_description from Ac_Gallery " ;
			$edit .=  "where Ac_name like '$selectedValue%' " ;
			
			$queryedit = mssql_query($edit);
			while($resultedit = mssql_fetch_array($queryedit)){
					$ac_name = $resultedit[0];
					$ac_date = $resultedit[1];
					$ac_img = $resultedit[2];
					$ac_dec = $resultedit[3];
			}
		}
		mssql_close();
		?>
         
                <form action="save_Gallery.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                    <tr class="thead">
                    <td colspan="2">เพิ่มข้อมูลกิจกรรม</td>
                    </tr>
                        <tr>
                            <td align="right">ชื่อกิจกรรม </td>
                            <td> <input class='form-control' type="text" name="ac_name" value="<?php echo $ac_name; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Activity DateTime</td>
                            <td>
                                <input class='form-control' type="text" name="ac_datetime"
                                    placeholder="On October 2, 2017 @ Canteen Area" value="<?php  echo $ac_date; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"> รูปภาพ</td>
                            <td>
                                <input class='custom-file' type="file" name="pho_add" value="<?php echo $ac_img; ?>">
                            </td>
                        </tr>
                       
                        <tr>
                            <td align="right">
                                <?php if($selectedValue != "0"){ ?>
                                ชื่อรูปภาพที่ต้องการแก้ไข:
                                <?php } ?></td>
                            <td>
                                <input class='form-control' type="text" name="pho_addedit"
                                    value="<?php echo $ac_img; ?>" <?php if($selectedValue == "0"){ ?> hidden="yes"
                                    <?php } ?>>
                            </td>
                        </tr>
                     
                        <tr>
                            <td align="right">Folder name image</td>
                            <td><input class='form-control' type="text" name="folder_name"
                                    placeholder="ชื่อโฟร์เดอร์รุปภาพที่ต้องการลิงค์" value="<?php echo $ac_dec; ?>">
                            </td>
          
            </tr>
        
            
            <tr>
   
                <td colspan="2" align="center">
                    <input class="btn btn-info" type="submit" name="Submit" value="Save">
                   
                   
                    <input class="btn btn-danger" type="submit" name="Del" value="Del">
                    <input class="btn btn-warning" type="button" name="" value="Clear" onclick="refresh()">
                </td>
            </tr>
           
            <input type="text" name="edit" hidden="yes" value="<?php echo $selectedValue; ?>">
           
            </table>
            <?php  
	$_POST['filtro'] = "0";

	?>
     </form>
            <script type="text/javascript">
            function exit() {
                if (confirm("You sure exit Program!!") == true) {
                    window.close();
                }
            }

            function refresh() {
                window.location = "Add_Gallery.php";
            }
            </script>

</body>

</html>