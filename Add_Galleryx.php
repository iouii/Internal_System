<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="unicorn/css/bootstrap.min.css">
    <link rel="stylesheet" href="unicorn/css/unicons.css">
    <link rel="stylesheet" href="unicorn/css/owl.carousel.min.css">
    <link rel="stylesheet" href="unicorn/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="unicorn/css/tooplate-style.css">
    <link rel="stylesheet" href="bbc.css">
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>

    <script src="unicorn/js/jquery-3.3.1.min.js"></script>
    <script src="unicorn/js/popper.min.js"></script>
    <script src="unicorn/js/bootstrap.min.js"></script>
    <script src="unicorn/js/Headroom.js"></script>
    <script src="unicorn/js/jQuery.headroom.js"></script>
    <script src="unicorn/js/owl.carousel.min.js"></script>
    <script src="unicorn/js/smoothscroll.js"></script>
    <script src="unicorn/js/custom.js"></script>

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
    font-size: 18px !important;
    font-weight: normal !important;
    color: #fff;
    text-align: center !important;
    border-radius: 3px !important;
    border: 1px solid #e6e6e6 !important;
}

tr {
    font-size: 12px !important;
}

td {

    border: 1px solid #fff !important;
    font-size: 14px;
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


    <div class="container-fluid">

        <div class="row">
        <div class="col-lg-1 col-md-12 col-12 ">
        </div>
            <div class="col-lg-4 col-md-12 col-12 ">
                <form action="Add_Galleryx.php" method="post" enctype="multipart/form-data" name="form1" id="form1">


                    <table>
                        <tr>
                            <td>เลือกเฉพาะกรณีที่ต้องการแก้ไขข้อมูล</td>

                        </tr>
                        <tr>

                            <td>
                                <select name="filtro" id="filtro">
                                    <option value="0">ค้นหาข้อมูล</option>
                                    <?php 
					
			$selAct = "SELECT Ac_id,Ac_name from Ac_Gallery";
			$queryselAct = mssql_query($selAct);
				while($resultselAc = mssql_fetch_array($queryselAct)) 
				{
				 ?>
                                    <option value="<?php echo $resultselAc[0]; ?>"><?php echo $resultselAc[1];?>
                                    </option>

                                    <?php 
				}
				?>



                                </select>

                            </td>
                        </tr>

            </div>
            </form>
            <br>
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
			$edit .=  "where Ac_id like '$selectedValue%' " ;
			
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
                    <tr>
                        <td>ชื่อกิจกรรม :</td>
                        <td> <input type="text" name="ac_name" placeholder="ชื่อกิจกรรม"
                                value="<?php echo $ac_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Activity DateTime: <input type="text" name="ac_datetime"
                                placeholder="On October 2, 2017 @ Canteen Area" value="<?php  echo $ac_date; ?>">
                            <br>
                            <div style="font-size: 13px;color:red;">วัน/เดือน/ปี @ สถานที่จัดกิจกรรม :</div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <b>Add Photo: </b><input type="file" name="pho_add" value="<?php echo $ac_img; ?>">
                            <br>
                            <div style="font-size: 13px;color:red;">รูปภาพ :</div>
                        </th>
                    </tr>
                   
                    <tr>
                        <th>
                            <?php if($selectedValue != "0"){ ?>
                            <div style="color:red;font-size:13px;">ชื่อรูปภาพที่ต้องการแก้ไข:</div>
                            <?php } ?>

                            <input type="text" name="pho_addedit" value="<?php echo $ac_img; ?>"
                                <?php if($selectedValue == "0"){ ?> hidden="yes" <?php } ?>>

                        </th>
                    </tr>
                  
                    <tr>
                        <div style="float:right;">
                            <th><b>Folder name image: </b><input type="text" name="folder_name"
                                    placeholder="ชื่อโฟร์เดอร์รุปภาพที่ต้องการลิงค์" value="<?php echo $ac_dec; ?>">
                                <div style="font-size: 13px;color:red;">ชื่อโฟรเดอร์รุปภาพ :</div>
                            </th>
                        </div>
                    </tr>
                   
                    <tr>
                        <th>
                            <div style="float:right;">
                                <input class="btn btn-danger" type="submit" name="Del" value="Del"
                                    style="font-size:22px; ">
                                <input class="btn btn-warning" type="button" name="" value="Clear"
                                    style="font-size:22px; " onclick="refresh()">
                                <input class="btn btn-info" type="submit" name="Submit" value="SAVE"
                                    style="font-size:22px; ">
                                <input class="btn btn-info" type="button" name="" onclick="exit()" value="EXIT"
                                    style="font-size:22px;">
                            </div>
                        </th>
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
            </script>

</body>

</html>