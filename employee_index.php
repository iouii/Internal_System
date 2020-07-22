<?php 
$file_db = new PDO('sqlite:HPDF.db');
$file_db->setAttribute(PDO::ATTR_ERRMODE, 
                        PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images\1ico.png" />

    <script src="jquery/jquery.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery-ui.js" type="text/javascript"></script>
    <title>OCT</title>
</head>

<style>
body {

    background-color: #eee;
    line-height: 150%;
}

#te3{
    position:left;
}
.con-head{

margin-top:15px;
}
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="con-head page-header">
                    <h1>
                        HR Information
                    </h1>
                </div>
                <div class="tabbable" id="tabs-301306">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active show	" href="#tab1" data-toggle="tab">Data (เอกสาร)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab2" data-toggle="tab">Form (แบบฟอร์ม)</a>
                        </li>
                        <li class="nav-item" id="te3">
                            <a class="nav-link"  href="#tab3" data-toggle="tab">Admin</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <br>
                            <label for="sel1">Select Data (เลือกข้อมูลที่ต้องการแสดง):</label>
                            <?include('data.php')?>
                        </div>

                        <div class="tab-pane" id="tab2">
                            <br>
                            <label for="sel1">Select Form (เลือกแบบฟอร์มที่ต้องการแสดง):</label>
                            <?include('form.php')?>

                        </div>
                        <div class="tab-pane" id="tab3">
                            <br>
                            
                            <?include('login_model.php')?>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>